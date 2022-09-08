<?php

namespace App\Listeners;

use App\Events\ImportDataCompletedEvent;
use App\Services\ImportLogService;
use App\Utils\ImportLogStatuses;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateImportDataListener
{
    protected ImportLogService $importLogService;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(ImportLogService $importLogService)
    {
        $this->importLogService = $importLogService;
    }

    /**
     * Handle the event.
     *
     * @param  ImportDataCompletedEvent  $event
     * @return void
     */
    public function handle(ImportDataCompletedEvent $event)
    {
        $importLog = $event->importLog;

        $this->importLogService->updateImportLog($importLog, [
            'end' => now(),
            'status' => ImportLogStatuses::COMPLETED
        ]);
    }
}
