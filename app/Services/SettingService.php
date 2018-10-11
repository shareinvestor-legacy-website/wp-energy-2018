<?php
/**
 * Created by PhpStorm.
 * User: atthakorn
 * Date: 7/15/2016
 * Time: 10:01 AM
 */

namespace BlazeCMS\Services;


use BlazeCMS\Models\Setting;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;


class SettingService
{


    public function query(Request $request)
    {


        $settings = Setting::query();


        if ($request->filled('key')) {
            $settings->where('key', 'like', "%$request->key%");
        }
        $settings->orderBy('key', 'asc');


        return $settings->paginate(setting('admin.paginate.setting.advance'));
    }

    public function getTimezones()
    {
        static $regions = array(
            DateTimeZone::AFRICA,
            DateTimeZone::AMERICA,
            DateTimeZone::ANTARCTICA,
            DateTimeZone::ASIA,
            DateTimeZone::ATLANTIC,
            DateTimeZone::AUSTRALIA,
            DateTimeZone::EUROPE,
            DateTimeZone::INDIAN,
            DateTimeZone::PACIFIC,
        );

        $timezones = array();
        foreach ($regions as $region) {
            $timezones = array_merge($timezones, DateTimeZone::listIdentifiers($region));
        }

        $timezone_offsets = array();
        foreach ($timezones as $timezone) {
            $tz = new DateTimeZone($timezone);
            $timezone_offsets[$timezone] = $tz->getOffset(new DateTime);
        }

        // sort timezone by offset
        asort($timezone_offsets);

        $timezone_list = array();
        foreach ($timezone_offsets as $timezone => $offset) {
            $offset_prefix = $offset < 0 ? '-' : '+';
            $offset_formatted = gmdate('H:i', abs($offset));

            $pretty_offset = "UTC${offset_prefix}${offset_formatted}";

            $timezone_list[$timezone] = "(${pretty_offset}) $timezone";
        }

        return $timezone_list;
    }


    public function updateGeneral(Request $request)
    {


        Setting::set('general.favicon', $request->input('favicon'));

        if ($request->filled('timezone'))
            Setting::set('general.timezone', $request->input('timezone'));

        if ($request->filled('dateformat'))
            Setting::set('general.dateformat', $request->input('dateformat'));

        if ($request->filled('timeformat'))
            Setting::set('general.timeformat', $request->input('timeformat'));


        Setting::set('general.analytic.google', $request->input('analytic'));
        Setting::set('general.analytic.piwik', $request->input('piwik'));
        Setting::set('general.website.verification', $request->input('verification'));
    }


    public function updateAdvance(Request $request)
    {

        foreach ($request->except(['_token', '_method']) as $key => $value) {
            Setting::set(str_replace('_', '.', $key), $value !== '' ? $value : '');
        }


    }

}