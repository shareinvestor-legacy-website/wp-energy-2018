<?php
/**
 * Created by PhpStorm.
 * User: atthakorn
 * Date: 11/26/2018
 * Time: 10:58 AM
 */

namespace BlazeCMS\IR;

use BlazeCMS\IR\Models\Download;
use League\Flysystem\Exception;

class DownloadFactory
{

    public static function mergeByTitle($webcasts, $presentations)
    {
        $all = $webcasts->merge($presentations);

        // get virtual array to find uniques matched by title
        $uniques = $all->map(function ($item) {

            return (object)[
                "id" => $item->id,
                "title" => $item->title,
                "category" => $item->remarks,
                "datetime" => $item->datetime('YMMdd HH:mm')
            ];

        })->unique('title');

        //return unique post
        return $uniques->map(function ($item) use ($webcasts, $presentations) {

            $webcast  = self::findMatchingItem($webcasts, 'title', $item->title);
            $presentation  = self::findMatchingItem($presentations, 'title', $item->title);

            return new Download((object)[
                'id' => $item->id,
                'title' => $item->title,
                'datetime' => $item->datetime,
                'file' => $presentation->file ?? null,
                'url' => $webcast->url ?? null,
                'image' => $webcast->image ?? $presentation->image,
                'remarks' => $webcast->remarks ?? $presentation->remarks
            ]);

        });
    }


    private static function findMatchingItem($posts, $field, $value)
    {
        return $posts->filter(function ($item) use ($field, $value) {
            return $item->{$field} == $value;

        })->first();
    }

}
