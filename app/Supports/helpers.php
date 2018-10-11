<?php

use BlazeCMS\Models\Contact;
use BlazeCMS\Models\Setting;
use BlazeCMS\Models\Text;
use BlazeCMS\Supports\Slug;
use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;


// flash message helper
if (!function_exists('flash_success')) {

    function flash_success($message)
    {
        Session::flash('flash-success', $message);
    }
}

if (!function_exists('flash_info')) {

    function flash_info($message)
    {
        Session::flash('flash-info', $message);
    }
}


if (!function_exists('flash_error')) {

    function flash_error($message)
    {
        Session::flash('flash-error', $message);
    }

}


// translation


if (!function_exists('locale')) {

    function locale()
    {
        return Lang::getLocale();
    }
}


if (!function_exists('fallback_locale')) {

    function fallback_locale()
    {

        return Lang::getFallback();
    }
}


if (!function_exists('locale_name')) {


    function locale_name()
    {
        $locale = locale();
        return array_get(locales(), "{$locale}.name");
    }
}


if (!function_exists('locale_flag')) {


    function locale_flag()
    {
        $locale = locale();
        return array_get(locales(), "{$locale}.flag");
    }
}


if (!function_exists('locales')) {


    //return available locales ordered by name
    function locales()
    {

        return array_sort(LaravelLocalization::getSupportedLocales(), function ($value) {
            return $value['name'];
        });
    }
}


if (!function_exists('locales_except_fallback')) {


    function locales_except_fallback()
    {

        return array_except(LaravelLocalization::getSupportedLocales(), fallback_locale());
    }
}


if (!function_exists('is_fallback_locale')) {


    function is_fallback_locale()
    {

        return locale() === Lang::getFallback();
    }
}

if (!function_exists('localized_url')) {
    //$url -> url or path
    function localized_url($url = null, $parameters = [], $secure = null, $locale = null)
    {
        //if $url is null get current url
        $url = $url ?? Request::fullUrl();
        $secure = $secure ?? (Request::getScheme() == 'https' ? true : false);

        //create url
        $url = url($url, $parameters, $secure);
        $locale = isset($locale) ? $locale : locale();
        //get localized url
        return LaravelLocalization::localizeURL($url, $locale);
    }
}

if (!function_exists('localized_current_url')) {

    function localized_current_url($locale = null)
    {
        //get localized url
        return localized_url(null, null, null, $locale);
    }
}


if (!function_exists('init_locale')) {


    function init_locale($locale = null)
    {

        $locale = LaravelLocalization::setLocale($locale);


        return $locale;
    }
}


if (!function_exists('intl_datetime')) {

    function intl_datetime($date, $format = null, $locale = null)
    {
        try {
            $format = isset($format) ? $format : setting('general.dateformat') . ' ' . setting('general.timeformat');
            $locale = isset($locale) ? $locale : locale();

            $IntlDateFormatter = new IntlDateFormatter(
                $locale,
                IntlDateFormatter::FULL,
                IntlDateFormatter::FULL,
                setting('general.timezone'),
                IntlDateFormatter::TRADITIONAL,
                $format
            );
            return $IntlDateFormatter->format($date);
        } catch (Exception $e) {
            return null;
        }
    }
}


if (!function_exists('intl_date')) {


    function intl_date($date, $format = null, $locale = null)
    {
        $format = isset($format) ? $format : setting('general.dateformat');
        return intl_datetime($date, $format, $locale);
    }
}

if (!function_exists('intl_time')) {


    function intl_time($date, $format = null, $locale = null)
    {
        $format = isset($format) ? $format : setting('general.timeformat');
        return intl_datetime($date, $format, $locale);
    }
}


//parse local datetime and convert to system timezone
if (!function_exists('carbon_parse')) {

    //20160912 15:53:16 ->>>  Ymd G:i:s
    function carbon_parse($date, $format = null, $local = true)
    {
        try {
            if ($local)
                //parse from local datetime to system datetime
                return Carbon::createFromFormat($format, $date, setting('general.timezone'))->tz(config('app.timezone'));
            else
                //parse from system datetime
                return Carbon::createFromFormat($format, $date, config('app.timezone'));

        } catch (Exception $e) {
            return null;
        }

    }
}



//parse datetime using intl, example  intl_parse('19/08/2017, 'dd/MM/yyyy')
if (!function_exists('intl_parse')) {

    function intl_parse($date, $format, $locale = null)
    {
        try {
            $locale = isset($locale) ? $locale : locale();

            $IntlDateFormatter = new IntlDateFormatter(
                $locale,
                IntlDateFormatter::FULL,
                IntlDateFormatter::FULL,
                setting('general.timezone'),
                IntlDateFormatter::TRADITIONAL,
                $format
            );
            return $IntlDateFormatter->parse($date);
        } catch (Exception $e) {
            return null;
        }
    }
}


// example -> intl_convert_format('25/01/1982', 'dd/MM/yyyy', 'dd MMMM yyyy', 'th')

if (!function_exists('intl_convert_format')) {

    function intl_convert_format($date, $format_from, $format_to, $locale_from = null, $locale_to = null)
    {
        $format_to = isset($format_to) ? $format_to : setting('general.dateformat') . ' ' . setting('general.timeformat');
        $datetime = intl_parse($date, $format_from, $locale_from);
        return intl_datetime($datetime, $format_to, $locale_to);
    }
}


// form utility

if (!function_exists('error_has')) {

    function error_has(...$fields)
    {
        $errors = Session::get('errors', new Illuminate\Support\MessageBag);

        foreach ($fields as $field) {
            if ($errors->has($field))
                return true;
            else {
                foreach ($errors->toArray() as $key => $message) {
                    if (starts_with($key, $field . '.')) {
                        return true;
                    }
                }
            }
        }
        return false;
    }
}


if (!function_exists('error_message')) {

    function error_message($field)
    {
        $errors = Session::get('errors', new Illuminate\Support\MessageBag);

        if ($errors->has($field)) {
            return $errors->first($field, '<span class="help-block">:message</span>');
        } else {

            foreach ($errors->toArray() as $key => $message) {
                if (starts_with($key, $field . '.')) {
                    return "<span class='help-block'>$message[0]</span>";
                }
            }
        }
        return '';
    }
}


//return true if current routes are matched with actions parameter
if (!function_exists('current_route_matches')) {

    function current_route_matches(...$actions)
    {
        foreach ($actions as $action) {

            if (ends_with(Route::currentRouteAction(), $action))
                return true;
        }

        return false;
    }
}


//return true if current routes are matched with actions parameter
if (!function_exists('slugify')) {

    function slugify($title, $separator = '-')
    {
        $value = Slug::valueOf($title, $separator);

        return $value ? $value : slugify2($title, $separator);

    }

}

//support Latin / Arabic / chinese
if (!function_exists('slugify2')) {

    function slugify2($str, $separator = '-', $limit = null)
    {
        if ($limit) {
            $str = mb_substr($str, 0, $limit, "utf-8");
        }

        $text = html_entity_decode($str, ENT_QUOTES, 'UTF-8');
        // replace non letter or digits by -
        $text = preg_replace('~[^\\pL\d]+~u', $separator, $text);
        // trim
        $text = trim($text, $separator);
        return $text;
    }
}


if (!function_exists('str_empty')) {

    function str_empty($s)
    {
        return strlen($s) == 0;
    }

}

if (!function_exists('bytesToHuman')) {

    function bytesToHuman($bytes)
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB', 'PB'];

        for ($i = 0; $bytes > 1024; $i++) {
            $bytes /= 1024;
        }

        return round($bytes, 2) . ' ' . $units[$i];
    }
}


if (!function_exists('audit_value')) {

    function audit_value($value)
    {
        if (isset($value)) {
            if (is_string($value) && $value !== '')
                return $value;
            else if (is_array($value)) {

                if (array_key_exists('timezone', $value)) {
                    $userTz = config('user.timezone');
                    $sysTz = config('app.timezone');
                    $sysFormat = 'Y-m-d H:i:s.u';  //u -> microseconds
                    return Carbon::createFromFormat($sysFormat, $value['date'], $sysTz)->tz($userTz)->toDateTimeString();

                }
            }
        }
        //return null string if value is not evaluable.
        return "''";
    }

}

if (!function_exists('setting')) {

    function setting($key)
    {
        return Setting::get($key);
    }

}


if (!function_exists('contact')) {

    function contact($name)
    {
        return Contact::get($name);
    }

}


if (!function_exists('t')) {

    function t($name)
    {
        return Text::get($name);
    }

}


//path helper
if (!function_exists('path')) {

    function path($withoutLocale = false)
    {
        $path = Request::path();
        $locale = locale();

        return $withoutLocale ? str_replace("$locale/", '', $path) : $path;
    }
}



if (!function_exists('theme_url')) {

    function theme_url($path)
    {
        return asset(Theme::url($path));
    }
}



if (!function_exists('title')) {

    function title(...$word)
    {
        return implode(' | ', $word);
    }
}


if (!function_exists('paginate')) {


    function paginate($items, $perPage = 15, $page = null)
    {

        $collection = collect($items);

        //get current page form url e.g. &page=6
        $page = $page ?? LengthAwarePaginator::resolveCurrentPage();

        return new LengthAwarePaginator(
            $collection->forPage($page, $perPage), count($collection), $perPage, $page,
            [
                'path' => Paginator::resolveCurrentPath(),
            ]
        );

    }

}

if (!function_exists('price_change')) {
    
    function price_change($current, $previous)
    {
        try{
            return floatval($current) - floatval($previous);
        }catch(Exception $e){
            return 0;
        }
        

    }

}

if (!function_exists('price_percent_change')) {
    
    function price_percent_change($change, $previous)
    {
        try{
            $change = floatval($change);
            $previous = floatval($previous);
      
            return number_format(($change * 100) / $previous , 2);
        }catch(Exception $e){
            return 0;
        }
        

    }

}





//webpack



if (!function_exists('chunkhash_path')) {

    function chunkhash_path($asset)
    {
        try {
            $statsPath = public_path('/themes/default/assets/stats.json');


            return json_decode(file_get_contents($statsPath), true)[$asset];
        } catch (\Exception $exception) {

            return null;
        }

    }

}


//encoding helper

if (!function_exists('encodings_conversion_table')) {

    function encodings_conversion_table($string)
    {
        $encodings = mb_list_encodings();

        $conversions = [];
        foreach ($encodings as $i) {
            foreach ($encodings as $j) {
                $conversion = mb_convert_encoding($string, $i, $j);

                array_push($conversions, [
                    'From' => $j,
                    'To' => $i,
                    'Output' => $conversion,
                ]);

            }
        }

        return $conversions;
    }
}

//convert encoding to ir format
if (!function_exists('utf8_to_html_entities')) {

    function utf8_to_html_entities($string)
    {
        return mb_convert_encoding($string, "HTML-ENTITIES", "UTF-8"); //stock client will encode RFC 1738 again

    }
}



if (!function_exists('sanitize_utf8_string')) {

    function sanitize_utf8_string($string)
    {
        return iconv('UTF-8', 'UTF-8//IGNORE', $string);

    }
}


if (!function_exists('locale_years_mapping')) {
    
    function locale_years_mapping($years)
    {
        $keys = $years;

        $years = $years->map(function ($item) {
            return intl_convert_format($item, 'yyyy', 'yyyy', 'en', locale());
        })->values();

        return collect($keys->combine($years)->unique());
    }
}

if (!function_exists('intl_last_years')) {
    
    //accept intl date and return last xxx years if date is far beyond xxx years
    function intl_last_years($date, $years, $format_from,  $format_to = null, $locale_from = null, $locale_to = null)
    {
        $lastXYears =  Carbon::today(setting('general.timezone'))->subYears($years);

        $format_to = $format_to ?? $format_from;
        
        return  intl_parse($date, $format_from, $locale_from) < $lastXYears->timestamp 
                         ?  intl_date($lastXYears, $format_to) : $date;
    }
}

