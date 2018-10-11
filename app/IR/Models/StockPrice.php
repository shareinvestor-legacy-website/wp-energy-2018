<?php
/**
 * Created by PhpStorm.
 * User: atthakorn
 * Date: 8/16/2017
 * Time: 8:25 PM
 */

namespace BlazeCMS\IR\Models;

use Exception;
use Laracasts\Presenter\Presenter;
use Laracasts\Presenter\PresentableTrait;


class StockPrice extends Presenter
{

    use PresentableTrait;

    protected $presenter = 'BlazeCMS\Web\Presenters\IR\StockPricePresenter';


    public function __construct($entity)
    {
        parent::__construct($entity);
    }


    public function symbol()
    {

        return $this->entity->symbol;
    }

    public function currency()
    {
        return $this->entity->currency;
    }

    public function last_done()
    {
        return $this->entity->last_done;
    }

    public function change()
    {
        return $this->entity->change;
    }

    public function percent_change()
    {
        return $this->entity->percent_change;
    }

    public function volume()
    {
        return $this->entity->volume;
    }

    public function value()
    {
        return $this->entity->value;
    }

    public function buy()
    {
        return $this->entity->buy;
    }

    public function buy_volume()
    {
        return $this->entity->buy_volume;
    }

    public function sell()
    {
        return $this->entity->sell;
    }

    public function sell_volume()
    {
        return $this->entity->sell_volume;
    }


    public function prior()
    {
        return $this->entity->prior;
    }

    public function open()
    {
        return $this->entity->open;
    }

    public function low()
    {
        return $this->entity->low;
    }

    public function high()
    {
        return $this->entity->high;
    }

    public function low_52weeks()
    {
        return $this->entity->low_52weeks;
    }

    public function high_52weeks()
    {
        return $this->entity->high_52weeks;
    }

    public function datetime($format = null)
    {
        return intl_convert_format($this->entity->datetime, 'yyyyMMdd HH:mm', $format, 'en');
    }

    public function is_up()
    {
        try {
            return floatval($this->entity->change) > 0;
        } catch (Exception $e) {

            return false;
        }
    }

    public function is_down()
    {
        try {
            return floatval($this->entity->change) < 0;

        } catch (Exception $e) {

            return false;
        }
    }





}