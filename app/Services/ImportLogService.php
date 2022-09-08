<?php
/**
 * Initial Version Created by Danial Panah
 * Email: me@danialrp.com -- Web: danialrp.com
 * on 9/7/2022 AD - 11:00 PM
 */

namespace App\Services;

use App\Models\ImportLog;
use App\Utils\ImportLogStatuses;

/**
 * Class ImportLogService
 *
 * @package \App\Services
 */
class ImportLogService
{
    public function createImportLog(array $params): ImportLog
    {
        return ImportLog::create($params);
    }

    public function createImportLogWithScaffold(array $params): ImportLog
    {
        $scaffoldingParams = ['start' => now(), 'status' => ImportLogStatuses::PROCESSING];
        $params = array_merge($scaffoldingParams, $params);

        return ImportLog::create($params);
    }

    public function updateImportLog(ImportLog $importLog, array $params): bool
    {
        return $importLog->update($params);
    }
}
