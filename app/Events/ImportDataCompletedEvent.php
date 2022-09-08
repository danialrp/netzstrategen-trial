<?php

namespace App\Events;

use App\Models\ImportLog;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ImportDataCompletedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public ImportLog $importLog;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(ImportLog $importLog)
    {
        $this->importLog = $importLog;
    }
}
