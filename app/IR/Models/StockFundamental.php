<?php
/**
 * Created by PhpStorm.
 * User: atthakorn
 * Date: 8/16/2017
 * Time: 8:24 PM
 */

namespace BlazeCMS\IR\Models;

use Laracasts\Presenter\PresentableTrait;
use Laracasts\Presenter\Presenter;

class StockFundamental extends Presenter
{

    use PresentableTrait;

    protected $presenter = 'BlazeCMS\Web\Presenters\IR\StockFundamentalPresenter';

    public function __construct($entity)
    {
        parent::__construct($entity);
    }


    public function is_reit()
    {
        return (int) $this->entity->is_reit != 0;
    }

    public function eps()
    {
        return $this->entity->eps;
    }

    public function pe()
    {

        return $this->entity->pe;
    }

    public function nav()
    {
        return $this->entity->nav;
    }

    public function price_nav()
    {

        return $this->entity->price_nav;
    }

    public function net_dividend()
    {
        return $this->entity->net_dividend;
    }


    public function dividend_yield()
    {

        return $this->entity->dividend_yield;
    }

    public function par_value()
    {
        return $this->entity->par_value == "n.a." ? "n.a." : "{$this->entity->currency} {$this->entity->par_value}";
    }

    public function high_52weeks()
    {

        return $this->entity->high_52weeks;
    }

    public function low_52weeks()
    {
        return $this->entity->low_52weeks;
    }

    public function float()
    {

        return $this->entity->float; // paid up
    }

    public function currency()
    {
        return $this->entity->currency;
    }


    public function market_cap()
    {

        return $this->entity->market_cap;
    }

    public function ipo_listing_date()
    {
        return $this->entity->ipo_listing_date;
    }

    public function ipo_subscription_rate()
    {

        return $this->entity->ipo_subscription_rate;
    }

    public function ipo_price()
    {
        return $this->entity->ipo_price;
    }

    public function ipo_vs_last()
    {

        return $this->entity->ipo_vs_last;
    }

    public function close_first_day()
    {
        return $this->entity->close_first_day;
    }


    public function close_first_week()
    {
        return $this->entity->close_first_week;
    }

    public function ipo_first_day_gain_percent()
    {

        return $this->entity->ipo_first_day_gain_percent;
    }

    public function ipo_first_week_gain_percent()
    {
        return $this->entity->ipo_first_week_gain_percent;
    }
}