<?php
/**
 * Created by PhpStorm.
 * User: atthakorn
 * Date: 7/15/2016
 * Time: 10:01 AM
 */

namespace BlazeCMS\Services;




use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use OwenIt\Auditing\Models\Audit;


class ToolService
{




    public function queryAudit(Request $request)
    {
        $logs = Audit::query();


        if ($request->filled('old_value'))
            $logs->where('old_values', 'like', "%$request->old_value%");

        if ($request->filled('new_value'))
            $logs->where('new_values', 'like', "%$request->new_value%");

        if ($request->filled('ip'))
            $logs->where('ip_address', 'like', "%$request->ip%");

        if ($request->filled('user')) {
            $logs->whereHas('user', function ($query) use ($request) {
                $query->where('username', 'like', "%$request->user%");
            });
        }

        if ($request->filled('table'))
            $logs->where('auditable_type', 'like', "%$request->table%");

        if ($request->filled('event'))
            $logs->where('event', $request->event);

        if ($request->filled('from'))
            $logs->where('created_at', '>=', implode('-', array_map('strrev', explode('/', strrev($request->from)))) . ' 00:00:00');

        if ($request->filled('to'))
            $logs->where('created_at', '<=', implode('-', array_map('strrev', explode('/', strrev($request->to)))) . ' 23:59:59');


        $logs->orderBy('created_at', 'desc');


        return $logs->paginate(setting('admin.paginate.audit.perPage'));


    }


    public function updateURLs(Request $request)
    {

        if ($request->filled('old_url') && $request->filled('new_url')) {
            $old_url = $request->old_url;
            $new_url = $request->new_url;

            DB::transaction(function () use ($old_url, $new_url) {

                //page
                DB::statement("UPDATE page_translations SET  excerpt = replace(excerpt, '$old_url', '$new_url')");
                DB::statement("UPDATE page_translations SET  body = replace(body, '$old_url', '$new_url')");
                DB::statement("UPDATE page_translations SET  external_url = replace(external_url, '$old_url', '$new_url')");
                DB::statement("UPDATE page_translations SET  file = replace(file, '$old_url', '$new_url')");
                DB::statement("UPDATE page_translations SET  custom_css = replace(custom_css, '$old_url', '$new_url')");
                DB::statement("UPDATE page_translations SET  custom_js = replace(custom_js, '$old_url', '$new_url')");

                //post
                DB::statement("UPDATE post_translations SET  excerpt = replace(excerpt, '$old_url', '$new_url')");
                DB::statement("UPDATE post_translations SET  body = replace(body, '$old_url', '$new_url')");
                DB::statement("UPDATE post_translations SET  external_url = replace(external_url, '$old_url', '$new_url')");
                DB::statement("UPDATE post_translations SET  file = replace(file, '$old_url', '$new_url')");
                DB::statement("UPDATE post_translations SET  custom_css = replace(custom_css, '$old_url', '$new_url')");
                DB::statement("UPDATE post_translations SET  custom_js = replace(custom_js, '$old_url', '$new_url')");


                //category
                DB::statement("UPDATE category_translations SET  excerpt = replace(excerpt, '$old_url', '$new_url')");
                DB::statement("UPDATE category_translations SET  body = replace(body, '$old_url', '$new_url')");


                //gallery
                DB::statement("UPDATE gallery_translations SET  description = replace(description, '$old_url', '$new_url')");


                //text
                DB::statement("UPDATE text_translations SET  value = replace(value, '$old_url', '$new_url')");


                //position
                DB::statement("UPDATE position_translations SET  qualification = replace(qualification, '$old_url', '$new_url')");
                DB::statement("UPDATE position_translations SET  description = replace(description, '$old_url', '$new_url')");
                DB::statement("UPDATE position_translations SET  external_url = replace(external_url, '$old_url', '$new_url')");


                //department
                DB::statement("UPDATE department_translations SET  remark = replace(remark, '$old_url', '$new_url')");


                //location
                DB::statement("UPDATE location_translations SET  address = replace(address, '$old_url', '$new_url')");
                DB::statement("UPDATE location_translations SET  remark = replace(remark, '$old_url', '$new_url')");


                //audit activity
                DB::statement("UPDATE audits SET  old = replace(old, '$old_url', '$new_url')");
                DB::statement("UPDATE audits SET  new = replace(new, '$old_url', '$new_url')");
                DB::statement("UPDATE audits SET  route = replace(route, '$old_url', '$new_url')");

            });
        }

    }



}