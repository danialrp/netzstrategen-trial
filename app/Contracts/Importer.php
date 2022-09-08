<?php
/**
 * Initial Version Created by Danial Panah
 * Email: me@danialrp.com -- Web: danialrp.com
 * on 9/7/2022 AD - 7:45 PM
 */

namespace App\Contracts;

interface Importer
{
    public function importData(string $filePath, string $source): void;
}
