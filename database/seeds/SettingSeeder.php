<?php


use BlazeCMS\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Setting::set('general.favicon', '');
        Setting::set('general.timezone', 'Asia/Bangkok');
        Setting::set('general.dateformat', 'dd MMMM yyyy');
        Setting::set('general.timeformat', 'hh:mm tt');
        Setting::set('general.analytic.google', '');
        Setting::set('general.analytic.piwik', '');
        Setting::set('general.website.verification', '');

        //advance
        Setting::set('admin.paginate.post.perPage', '20');
        Setting::set('admin.paginate.gallery.perPage', '20');
        Setting::set('admin.paginate.tag.perPage', '20');
        Setting::set('admin.paginate.text.perPage', '20');
        Setting::set('admin.paginate.jobboard.position.perPage', '20');
        Setting::set('admin.paginate.jobboard.department.perPage', '20');
        Setting::set('admin.paginate.jobboard.location.perPage', '20');
        Setting::set('admin.paginate.auth.user.perPage', '20');
        Setting::set('admin.paginate.auth.role.perPage', '20');
        Setting::set('admin.paginate.audit.perPage', '20');
        Setting::set('admin.paginate.contact.perPage', '20');
        Setting::set('admin.paginate.setting.advance', '20');
        //Setting::set('admin.theme', 'theme-c');




    }
}
