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
 * Class ImportXmlService
 *
 * @package \App\Services\Importers
 */
final class ProductImportXmlService extends ProductImportService implements ToModelContract
{
    public function transformData(string $filePath): iterable
    {
        $dataCollection = collect();

        $xmlDocObject = simplexml_load_file($filePath);
        if (!$xmlDocObject) return $dataCollection;

        $dataSet = json_decode(json_encode($xmlDocObject), true);
        $parentKey = array_key_first($dataSet);

        foreach ($dataSet[$parentKey] as $item)
            $dataCollection->push(new Product([
                'brand' => ucfirst($item['brand']),
                'model' => ucfirst($item['model']),
                'sku' => strtoupper($item['sku']),
                'price' => $this->removePriceFormat($item['price']),
                'created_at' => now(),
                'updated_at' => now()
            ]));

        return $dataCollection->chunk($this->chunkSize);
    }
}
