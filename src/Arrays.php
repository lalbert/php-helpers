<?php

namespace Lalbert\Helpers;

class Arrays
{
    /**
     * Check if array $array is an indexed array.
     *
     * @since 0.0.1
     *
     * @param array $array
     *
     * @return bool Return true if $array is an indexed array, false otherwise
     */
    public static function isIndexed($array)
    {
        if (!\is_array($array)) {
            return false;
        }

        // keys are strings : associative array
        if ((bool) count(array_filter(array_keys($array), 'is_string'))) {
            return false;
        }

        // Create normal index and compare
        $indexes = \array_keys(\array_fill(0, count($array), null));
        if ((bool) count(\array_diff($indexes, \array_keys($array)))) {
            return false;
        }

        return true;
    }

    /**
     * Check if array $array is an associative array.
     *
     * @since 0.0.1
     *
     * @param array $array
     *
     * @return bool Return true if $array is an associative array, false
     *              otherwise
     */
    public static function isAssociative($array)
    {
        if (!\is_array($array)) {
            return false;
        }

        return !self::isIndexed($array);
    }
}
