<?php
/**
 * Initial Version Created by Danial Panah
 * Email: me@danialrp.com -- Web: danialrp.com
 * on 9/7/2022 AD - 2:53 PM
 */

namespace App\Utils;

use ReflectionClass;

/**
 * Class BaseUtil
 *
 * @package \App\Utils
 */
class BaseUtil
{
    protected static string $className = __CLASS__;

    public static function getAll(): array
    {
        $self = new ReflectionClass(static::$className);
        return $self->getConstants();
    }

    public static function isValidOption($option): bool
    {
        return in_array($option, self::getAll());
    }
}
