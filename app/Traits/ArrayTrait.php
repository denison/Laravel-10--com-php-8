<?php

namespace App\Traits;

/**
 * Undocumented trait
 */
trait ArrayTrait
{
    /**
     * Found many strings inside multiples arrays
     *
     * @param  array $blocks
     * @return boolean
     */
    public static function foundInMultiplesArrays(array $blocks): bool
    {
        foreach ($blocks as $block) {
            if (static::foundInArray($block[0], $block[1])) {
                return true;
            }
        }
        return false;
    }

    /**
     * Found string inside array
     *
     * @param  string $field
     * @param  array $array
     * @return bool
     */
    public static function foundInArray(string $field, array $array): bool
    {
        foreach ($array as $notPermit) {
            if (strpos($field, $notPermit) !== false) {
                return true;
            }
        }
        return false;
    }
}