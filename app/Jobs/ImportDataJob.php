<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ImportDataJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected object $importerHandler;
    protected string $filePath, $source;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(object $importerHandler, string $filePath, string $source)
    {
        $this->importerHandler = $importerHandler;
        $this->filePath = $filePath;
        $this->source = $source;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $source = strtoupper($this->source);
        $this->importerHandler->importData($this->filePath, $source);
    }
}
