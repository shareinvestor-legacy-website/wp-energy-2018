<?php
/**
 * Created by PhpStorm.
 * User: atthakorn
 * Date: 9/12/2017
 * Time: 5:20 PM
 */

namespace BlazeCMS\IR;


abstract class Presenter extends \Laracasts\Presenter\Presenter
{

    /**
     * delegate to parent method
     */
    public function __call($method, $arguments)
    {
        if (method_exists($this, $method)) {
            return $this->{$method}(...$arguments);
        }

        return $this->entity->{$method}(...$arguments);
    }

}