<?php
/**
 * Initial Version Created by Danial Panah
 * Email: me@danialrp.com -- Web: danialrp.com
 * on 9/7/2022 AD - 7:22 PM
 */

namespace App\Services\Imports;

use App\Contracts\ToModelContract;
use App\Models\Product;

/**
 * Class ImportCsvService
 *
 * @package \App\Services\Importers
 */
final class ProductImportCsvService extends ProductImportService implements ToModelContract
{
    public function transformData(string $filePath): iterable
    {
        $dataCollection = collect();

        $rawDataArray = array_map('str_getcsv', file($filePath));
        if (!$rawDataArray) return $dataCollection;

        $dataSet = $this->removeCsvTableHeaders($rawDataArray);

        foreach ($dataSet as $item)
            $dataCollection->push(new Product([
                'brand' => ucfirst($item['1']),
                'model' => ucfirst($item['2']),
                'sku' => strtoupper($item['3']),
                'price' => $this->removePriceFormat($item['4']),
                'created_at' => now(),
                'updated_at' => now()
            ]));

        return $dataCollection->chunk($this->chunkSize);
    }
}
