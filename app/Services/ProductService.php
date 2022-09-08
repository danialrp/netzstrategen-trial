<?php
/**
 * Initial Version Created by Danial Panah
 * Email: me@danialrp.com -- Web: danialrp.com
 * on 9/7/2022 AD - 6:28 PM
 */

namespace App\Services;

use App\Jobs\ImportDataJob;
use App\Models\Product;
use App\Services\Imports\ProductImportService;
use App\Traits\TruncateTrait;
use Exception;
use function storage_path;

/**
 * Class ProductService
 *
 * @package \App\Services
 */
class ProductService
{
    use TruncateTrait;

    public ProductImportService $importService;

    public function __construct(ProductImportService $importService)
    {
        $this->importService = $importService;
    }

    public function getProcessHandlerServiceBySource(string $source): object
    {
        $importerClass = $this->importService->getImportServiceBySourceExtension(strtolower($source));

        if (!$importerClass) abort(404, 'No importer service found for this file extension.');

        return new $importerClass;
    }

    public function processImportData(string $source)
    {
        $this->truncateDatabase(); // TODO only for truncating products table

        $importerHandler = $this->getProcessHandlerServiceBySource($source);
        $extension = strtolower($source);
        $filePath = $this->getSourceFile($extension);

        ImportDataJob::dispatch($importerHandler, $filePath, $source);
    }

    private function getSourceFile(string $source): string
    {
        $storageDataPath = storage_path('data');

        return match ($source) {
            'json' => "{$storageDataPath}/cars.json",
            'csv' => "{$storageDataPath}/cars.csv",
            'xml' => "{$storageDataPath}/vehicles.xml",
            default => throw new Exception('Undefined Source Provided'),
        };
    }

    public function getAllProducts(): iterable
    {
        return Product::all();
    }
}
