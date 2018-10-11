<?php
/**
 * Created by PhpStorm.
 * User: atthakorn
 * Date: 7/21/2016
 * Time: 2:13 PM
 */

namespace BlazeCMS\Supports\Model;


use Carbon\Carbon;
use Setting;

trait DateTimeConvertable
{

    //get carbon datetime object in system timezone
    /**
     * @param Carbon|string $datetime
     * @param bool $timeIncluded
     * @return null|Carbon
     */
    public function convertDateToSystemTimezone($datetime, $timeIncluded = true)
    {
        if ($datetime === null)
            return null;

        $sysTz = config('app.timezone');
        $userTz = setting('general.timezone');
        $userFormat = 'd/m/Y H:i';


        if ($datetime instanceof Carbon) {

            if ($datetime->tzName !== $sysTz) {
                return $datetime->tz($sysTz);
            }
            return $datetime;

        } else {
            if ($timeIncluded) {
                return Carbon::createFromFormat($userFormat, $datetime, $userTz)->tz($sysTz);
            }
            return Carbon::createFromFormat($userFormat, "$datetime 00:00", $userTz)->tz($sysTz);
        }
    }


    //get carbon datetime object in user timezone
    /**
     * @param string $datetime
     * @return null|Carbon
     */
    public function convertDateToUserTimezone($datetime)
    {

        if (!isset($datetime) || $datetime === '0000-00-00 00:00:00')
            return null;

        $userTz = setting('general.timezone');
        $sysTz = config('app.timezone');
        $sysFormat = $this->getDateFormat();//'Y-m-d H:i:s';

        return Carbon::createFromFormat($sysFormat, $datetime, $sysTz)->tz($userTz);
    }




}