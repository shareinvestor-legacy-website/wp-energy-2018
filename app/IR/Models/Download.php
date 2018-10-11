<?php
/**
 * Created by PhpStorm.
 * User: atthakorn
 * Date: 8/17/2017
 * Time: 6:12 AM
 */

namespace BlazeCMS\IR\Models;


use Laracasts\Presenter\PresentableTrait;
use Laracasts\Presenter\Presenter;

class Download extends Presenter
{

    use PresentableTrait;

    protected $presenter = 'BlazeCMS\Web\Presenters\IR\DownloadPresenter';

    public function __construct($entity)
    {
        parent::__construct($entity);
    }


    public function id()
    {

        return $this->entity->id;
    }


    public function datetime($format = null, $locale = null)
    {
        return intl_convert_format($this->entity->datetime, 'yyyyMMdd HH:mm', $format, 'en', $locale);
    }

    public function category()
    {
        return $this->entity->category;
    }

    public function title()
    {
        return $this->entity->title;
    }


    public function file()
    {

        return $this->entity->file;
    }

    public function url()
    {

        return $this->entity->url;
    }

    public function image()
    {
        return $this->entity->image;
    }

    public function thumbnail()
    {
        return $this->entity->thumbnail;
    }


    public function filesize()
    {
        return bytesToHuman($this->entity->filesize);
    }


    public function remarks()
    {
        return $this->entity->remarks;
    }

    public function duration()
    {
        return $this->entity->duration;
    }
}
