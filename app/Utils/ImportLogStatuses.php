<?php
/**
 * Initial Version Created by Danial Panah
 * Email: me@danialrp.com -- Web: danialrp.com
 * on 9/7/2022 AD - 2:55 PM
 */

namespace App\Utils;

/**
 * Class ImportLogStatuses
 *
 * @package \App\Utils
 */
class ImportLogStatuses extends BaseUtil
{
    public static string $className = __CLASS__;

    CONST NOT_INITIATED = 'Not Initiated';
    CONST PROCESSING = 'Processing';
    CONST FAILED = 'Failed';
    CONST COMPLETED = 'Completed';
}
