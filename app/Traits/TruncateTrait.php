<?php
/**
 * Initial Version Created by Danial Panah
 * Email: me@danialrp.com -- Web: danialrp.com
 * on 9/7/2022 AD - 10:45 PM
 */

namespace App\Traits;

use App\Models\ImportLog;
use App\Models\Product;

trait TruncateTrait
{
    public function truncateDatabase()
    {
        Product::truncate();
        ImportLog::truncate();
    }
}
