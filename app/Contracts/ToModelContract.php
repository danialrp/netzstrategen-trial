<?php
/**
 * Initial Version Created by Danial Panah
 * Email: me@danialrp.com -- Web: danialrp.com
 * on 9/7/2022 AD - 7:40 PM
 */

namespace App\Contracts;

interface ToModelContract
{
    public function transformData(string $filePath): iterable;
}
