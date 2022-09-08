<?php
/**
 * Initial Version Created by Danial Panah
 * Email: me@danialrp.com -- Web: danialrp.com
 * on 9/7/2022 AD - 7:21 PM
 */

namespace App\Services\Imports;

use App\Contracts\ToModelContract;
use App\Models\Product;

/**
 * Class ImportJsonService
 *
 * @package \App\Services\Importers
 */
final class ProductImportJsonService extends ProductImportService implements ToModelContract
{
    public function transformData(string $filePath): iterable
    {
        $dataCollection = collect();

        $jsonFileContent = file_get_contents($filePath);
        if (!$jsonFileContent) return $dataCollection;

        $dataSet = json_decode($jsonFileContent, true);

        foreach ($dataSet as $item)
            $dataCollection->push(new Product([
                'brand' => ucfirst($item['brand']) ?? 'N/A',
                'model' => ucfirst($item['model']) ?? 'N/A',
                'sku' => strtoupper($item['sku']) ?? 'N/A',
                'price' => $this->removePriceFormat($item['price']) ?? 0,
                'created_at' => now(),
                'updated_at' => now()
            ]));

        return $dataCollection->chunk($this->chunkSize);
    }
}
