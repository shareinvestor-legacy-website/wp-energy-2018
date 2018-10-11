<?php
/**
 * Created by PhpStorm.
 * User: atthakorn
 * Date: 8/13/2016
 * Time: 08:38
 */

namespace BlazeCMS\Http\Admin;




use BlazeCMS\Services\SettingService;
use Carbon\Carbon;
use Illuminate\Http\Request;


class SettingController extends AdminController
{

    private $settingService;

    public function __construct(SettingService $settingService)
    {
        $this->settingService = $settingService;

    }


    public function general()
    {

        $timezones = $this->settingService->getTimezones();
        $now = Carbon::now( setting('general.timezone'));

        return view('setting.general', compact('timezones', 'now'));
    }

    public function updateGeneral(Request $request)
    {

        $this->settingService->updateGeneral($request);
        flash_success('The setting has been successfully updated');

        return back();
    }


    public function advance(Request $request)
    {

        $key = $request->key;
        $settings = $this->settingService->query($request);

        return view('setting.advance', compact('settings', 'key'));
    }


    public function updateAdvance(Request $request)
    {

        $this->settingService->updateAdvance($request);
        flash_success('The setting has been successfully updated');

        return back();
    }
}