<?php
/**
 * Created by PhpStorm.
 * User: atthakorn
 * Date: 7/26/2016
 * Time: 9:03 AM
 */

namespace BlazeCMS\Supports;


use Illuminate\Support\Str;


class Slug extends Str
{

    public static function valueOf($title, $separator = '-')
    {
        //translate mappable chars
        foreach (static::charsArray() as $key => $val) {
            $title = str_replace($val, $key, $title);
        }
        $title = preg_replace('/[^\x20-\x7E\p{Thai}]/u', '', $title);

        // Convert all dashes/underscores into separator
        $flip = $separator == '-' ? '_' : '-';

        $title = preg_replace('![' . preg_quote($flip) . ']+!u', $separator, $title);

        // Remove all characters that are not the separator, letters, numbers, or whitespace.
        $title = preg_replace('![^' . preg_quote($separator) . '\pL\pN\p{Thai}\s]+!u', '', mb_strtolower($title));

        // Replace all separator characters and whitespace by a single separator
        $title = preg_replace('![' . preg_quote($separator) . '\s]+!u', $separator, $title);

        return trim($title, $separator);
    }
}