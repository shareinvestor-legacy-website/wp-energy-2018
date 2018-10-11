<?php
/**
 * Created by PhpStorm.
 * User: atthakorn
 * Date: 8/17/2017
 * Time: 6:12 AM
 */

namespace BlazeCMS\IR\Models;


use Exception;
use Laracasts\Presenter\PresentableTrait;
use Laracasts\Presenter\Presenter;

class News extends Presenter
{

    use PresentableTrait;

    protected $presenter = 'BlazeCMS\Web\Presenters\IR\NewsPresenter';

    public function __construct($entity)
    {
        parent::__construct($entity);
    }


    public function id()
    {

        return $this->entity->id;
    }

    public function category()
    {
        return $this->entity->category;
    }

    public function datetime($format = null, $locale = null)
    {
        return intl_convert_format($this->entity->datetime, 'yyyyMMdd HH:mm', $format, 'en', $locale);
    }

    public function title($slug = false)
    {
        if ($slug)
            return slugify($this->entity->title);

        return $this->entity->title;
    }

    public function synopsis()
    {

        return $this->entity->synopsis;
    }

    public function body()
    {
        return $this->entity->body;
    }


    public function url()
    {

        return $this->entity->url;
    }

    public function thumbnail()
    {
        return $this->entity->thumbnail;
    }


    //simple test whether body is html
    public function is_html()
    {
        try {
            
            return preg_match_all('/<.*>?|<.*\/>?/', $this->entity->body);

        } catch (Exception $e) {

            return false;
        }

    }

}