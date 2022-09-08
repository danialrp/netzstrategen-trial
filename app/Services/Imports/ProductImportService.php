<?php
/**
 * Initial Version Created by Danial Panah
 * Email: me@danialrp.com -- Web: danialrp.com
 * on 9/7/2022 AD - 7:26 PM
 */

namespace App\Services\Imports;

use App\Contracts\Importer;
use App\Events\ImportDataCompletedEvent;
use App\Models\Product;
use App\Services\ImportLogService;
use App\Traits\CleansingFilterTrait;
use App\Traits\TruncateTrait;

/**
 * Class ImportService
 *
 * @package \App\Services\Product
 */
class ProductImportService implements Importer
{
    use CleansingFilterTrait;

    protected ImportLogService $importLogService;
    private array $importers;
    protected int $chunkSize = 100;

    public function __construct()
    {
        $this->importers = $this->bindImportServices();
        $this->importLogService = new ImportLogService;
    }

    private function bindImportServices(): array
    {
        return [
            'json' => ProductImportJsonService::class,
            'csv' => ProductImportCsvService::class,
            'xml' => ProductImportXmlService::class
        ];
    }

    public function getImportServiceBySourceExtension(string $sourceExtension): ?string
    {
        return $this->importers[$sourceExtension] ?? null;
    }

    public function importData(string $filePath, string $source): void
    {
        $transformedData = $this->transformData($filePath);

        if (empty($transformedData)) return;

        $importLog = $this->importLogService->createImportLogWithScaffold(['source' => $source]);

        foreach ($transformedData as $chunkedDataCollection) {
            Product::insert($chunkedDataCollection->toArray());
            sleep(1);
        }

        ImportDataCompletedEvent::dispatch($importLog);
    }
}
