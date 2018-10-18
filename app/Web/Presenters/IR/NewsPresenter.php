<?php
/**
 * Created by PhpStorm.
 * User: atthakorn
 * Date: 8/19/2016
 * Time: 14:01
 */

namespace BlazeCMS\Web\Presenters\IR;


use Laracasts\Presenter\Presenter;



class NewsPresenter extends \BlazeCMS\IR\Presenter
{


    //custom methods here

    public function facebookUrl($action = null)
    {
        $url = isset($action) ? $action : $this->url();
        $title = $this->title();

        return "https://www.facebook.com/sharer/sharer.php?u=$url&title=$title";
    }

    public function twitterUrl($action = null)
    {
        $url = isset($action) ? $action : $this->url();
        $title = $this->title();

        return "http://twitter.com/intent/tweet?status=$title+$url";
    }

    public function lineUrl($action = null)
    {
        $url = isset($action) ? $action : $this->url();

        return "https://social-plugins.line.me/lineit/share?url=$url";
    }

    public function date($format = 'dd/MM/yyyy', $locale = null)
    {
        return $this->datetime($format, $locale);
    }

    public function image($default = null)
    {
        if ($this->entity->image != '') {

            return $this->entity->image;
        } else if (isset($default)){

            return theme_url($default);
        }

        return null;
    }

    public function is_html()
    {
        try {

            return preg_match_all('/<.*>?|<.*\/>?/', $this->entity->body) || $this->entity->body != null;

        } catch (Exception $e) {

            return false;
        }

    }

}
