<?php
/**
 * Initial Version Created by Danial Panah
 * Email: me@danialrp.com -- Web: danialrp.com
 * on 9/7/2022 AD - 10:35 PM
 */

namespace App\Traits;

trait CleansingFilterTrait
{
    public function removePriceFormat(string $string): string
    {
        $removables = [' ', ',', '.', '$', '£', '€'];

        return str_replace($removables, '', $string);
    }

    public function removeCsvTableHeaders(array $array): array
    {
        unset($array[0]);
        return $array;
    }
}
