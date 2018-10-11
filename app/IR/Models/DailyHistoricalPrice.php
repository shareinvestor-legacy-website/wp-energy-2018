<?php
/**
 * Created by PhpStorm.
 * User: atthakorn
 * Date: 8/16/2017
 * Time: 8:25 PM
 */


namespace BlazeCMS\IR\Models;



use Laracasts\Presenter\PresentableTrait;
use Laracasts\Presenter\Presenter;



class DailyHistoricalPrice extends Presenter
{
    use PresentableTrait;

    protected $presenter = 'BlazeCMS\Web\Presenters\IR\DailyHistoricalPricePresenter';

    public function __construct($entity)
    {
        parent::__construct($entity);
    }


    public function datetime($format = "dd MMMM yyyy")
    {
        return intl_convert_format($this->entity->datetime, 'yyyyMMdd HH:mm', $format, 'en');
    }

    public function open()
    {
        return $this->entity->open;
    }

    public function high()
    {

        return $this->entity->high;
    }

    public function low()
    {
        return $this->entity->low;
    }

    public function close()
    {

        return $this->entity->close;
    }

    public function volume()
    {
        return $this->entity->volume;
    }

    public function value()
    {
        return $this->entity->value;
    }


}