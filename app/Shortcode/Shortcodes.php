<?php
/**
 * Created by PhpStorm.
 * User: atthakorn
 * Date: 8/20/2016
 * Time: 05:29
 */

namespace BlazeCMS\Shortcode;


use File;
use Thunder\Shortcode\Shortcode\ShortcodeInterface;


class Shortcodes
{




    // [locale]
    public function locale(ShortcodeInterface $s)
    {
        return locale();
    }


    // [filesize path="filename.ext"]  - base path is public/storage
    public function filesize(ShortcodeInterface $s)
    {
        try {
            return bytesToHuman(File::size(public_path("storage/" . $s->getParameter('path'))));
        } catch (\Exception $e) {
            return null;
        }
    }


}