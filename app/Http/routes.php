<?php


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
*/


Route::group(['namespace' => 'Web', 'middleware' => ['web']], function () {
    Route::get('sitemap.xml', 'SitemapController@xml');
    Route::get('themes/default/assets/{file}', 'WebController@assets');
    Route::get('ip', function () {
        return Request::ip();
    });

});

//api stuff

Route::group(['namespace' => 'Web', 'prefix' => 'api', 'middleware' => ['web', 'cors']], function () {

    //init api's locale by url segment#2 but web using segment#1
    Route::group(['prefix' => init_locale(Request::segment(2))], function () {

        Route::get('menus', 'ApiController@menus');

    });

});


Route::group(['namespace' => 'Web', 'prefix' => init_locale(),
    'middleware' => ['web', 'redirectToLocale', 'localeSessionRedirect', 'localizationRedirect', 'rebuildingThemeAssets', 'onlyThailandVisitor']], function () {

    Route::get('', 'WebController@index');
    Route::get('home/{page2?}', 'WebController@home');

    Route::group(['prefix' => '{root}'], function () {

        //awards-recognitions
        Route::get('awards-recognitions', 'WebController@award');

        //milestone
        Route::get('company-milestone', 'WebController@milestone');

        //subsidiary
        Route::get('company-subsidiary', 'WebController@subsidiary');

        //download
        Route::get('download/{page2}', 'WebController@download');

        //document
        Route::get('document/{category}', 'WebController@document');

        //report
        Route::get('report/{category}', 'WebController@report');

        //calendar
        Route::get('ir-calendar/{subCategory?}', 'WebController@calendar');

        //management
        Route::get('management/{category}', 'WebController@management');
        Route::get('management/{category}/{id}/{title?}', 'WebController@showManagement');

        //news update
        Route::get('update/{category}', 'WebController@update');
        Route::get('update/{category}/{id}/{title?}', 'WebController@showUpdate');

        //video
        Route::get('video/{category}', 'WebController@video');

    });

    //ir
    Route::group(['prefix' => 'investor-relations'], function () {

        //download
        Route::get('ir-home/{page3?}', 'WebController@irHome');

        //download
        Route::get('{page2}/download/{slug}', 'WebController@irDownload');

        //report
        Route::get('{page2}/report/{slug}', 'WebController@irReport');

        //webcast & presentation
        Route::get('webcasts-and-presentations', 'WebController@presentation');

        //news
        Route::get('newsroom/update/{slug}', 'WebController@irUpdate');
        Route::get('newsroom/update/{slug}/{id}/{title?}', 'WebController@showIrUpdate');

        //historical-price
        Route::get('stock-information/historical-price', 'WebController@historicalPrice');
    });

    //post mail
    Route::group(['prefix' => 'mail'], function () {
        Route::post('contact', 'MailController@contact');
        Route::post('ir-contact', 'MailController@irContact');
        Route::post('whistleblowing', 'MailController@whistleblowing');
        Route::post('application', 'MailController@application');
    });

    //match every route except -> admin
    Route::get('{page1?}/{page2?}/{page3?}/{page4?}/{page5?}', 'WebController@page')->where('page1', '^(?!admin)([^/]*)');
});


//auth


Route::group(['prefix' => 'admin', 'middleware' => ['web', 'setTheme:admin']], function () {

    Route::get('login', 'Auth\LoginController@showLoginForm');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout');


    Route::group(['middleware' => 'activeUserOnly'], function () {
        // Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
        // Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
        // Route::post('password/reset', 'Auth\ResetPasswordController@reset');

        Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
        Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
        Route::post('password/reset', 'Auth\ResetPasswordController@reset');
        Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
    });


});


//admin

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['web', 'auth', 'activeUserOnly', 'setTheme:admin']], function () {

    //handling error if authenticated by not have any permission
    Route::get('', 'AdminController@dashboard');
    Route::get('dashboard', 'AdminController@dashboard');


    //menu
    Route::group(['middleware' => 'can:manage-web-menu'], function () {
        Route::get('menus/ordering', 'MenuController@ordering');
        Route::patch('menus/ordering', 'MenuController@updateOrdering');
        Route::get('menus/{id}/translations/create', 'MenuController@createTranslation');
        Route::post('menus/{id}/translations', 'MenuController@storeTranslation');
        Route::get('menus/{id}/translations/{locale}/edit', 'MenuController@editTranslation');
        Route::patch('menus/{id}/translations/{locale}', 'MenuController@updateTranslation');
        Route::delete('menus/{id}/translations/{locale}', 'MenuController@destroyTranslation');
        Route::resource('menus', 'MenuController', ['parameters' => ['menus' => 'id'], 'except' => ['show']]);;
    });


    //page
    Route::group(['middleware' => 'can:manage-web-page'], function () {
        Route::get('pages/ordering', 'PageController@ordering');
        Route::patch('pages/ordering', 'PageController@updateOrdering');
        Route::get('pages/{id}/translations/create', 'PageController@createTranslation');
        Route::post('pages/{id}/translations', 'PageController@storeTranslation');
        Route::get('pages/{id}/translations/{locale}/edit', 'PageController@editTranslation');
        Route::patch('pages/{id}/translations/{locale}', 'PageController@updateTranslation');
        Route::delete('pages/{id}/translations/{locale}', 'PageController@destroyTranslation');
        Route::resource('pages', 'PageController', ['parameters' => ['pages' => 'id'], 'except' => ['show']]);

    });

    //post
    Route::group(['middleware' => 'can:manage-web-post'], function () {
        Route::get('posts/ordering', 'PostController@ordering');
        Route::patch('posts/ordering', 'PostController@updateOrdering');
        Route::get('posts/{id}/translations/create', 'PostController@createTranslation');
        Route::post('posts/{id}/translations', 'PostController@storeTranslation');
        Route::get('posts/{id}/translations/{locale}/edit', 'PostController@editTranslation');
        Route::patch('posts/{id}/translations/{locale}', 'PostController@updateTranslation');
        Route::delete('posts/{id}/translations/{locale}', 'PostController@destroyTranslation');
        Route::resource('posts', 'PostController', ['parameters' => ['posts' => 'id'], 'except' => ['show']]);

    });

    //category
    Route::group(['middleware' => 'can:manage-web-category'], function () {
        Route::get('categories/ordering', 'CategoryController@ordering');
        Route::patch('categories/ordering', 'CategoryController@updateOrdering');
        Route::get('categories/{id}/translations/create', 'CategoryController@createTranslation');
        Route::post('categories/{id}/translations', 'CategoryController@storeTranslation');
        Route::get('categories/{id}/translations/{locale}/edit', 'CategoryController@editTranslation');
        Route::patch('categories/{id}/translations/{locale}', 'CategoryController@updateTranslation');
        Route::delete('categories/{id}/translations/{locale}', 'CategoryController@destroyTranslation');
        Route::resource('categories', 'CategoryController', ['parameters' => ['categories' => 'id'], 'except' => ['show']]);;
    });

    //gallery
    Route::group(['middleware' => 'can:manage-web-gallery'], function () {

        Route::get('galleries/{id}/translations/create', 'GalleryController@createTranslation');
        Route::post('galleries/{id}/translations', 'GalleryController@storeTranslation');
        Route::get('galleries/{id}/translations/{locale}/edit', 'GalleryController@editTranslation');
        Route::patch('galleries/{id}/translations/{locale}', 'GalleryController@updateTranslation');
        Route::delete('galleries/{id}/translations/{locale}', 'GalleryController@destroyTranslation');
        Route::resource('galleries', 'GalleryController', ['parameters' => ['galleries' => 'id'], 'except' => ['show']]);

    });


    //tag
    Route::group(['middleware' => 'can:manage-web-tag'], function () {

        Route::resource('tags', 'TagController', ['parameters' => ['tags' => 'id'], 'except' => ['show']]);
    });


    //text
    Route::group(['middleware' => 'can:manage-web-text'], function () {

        Route::get('texts/{id}/translations/create', 'TextController@createTranslation');
        Route::post('texts/{id}/translations', 'TextController@storeTranslation');
        Route::get('texts/{id}/translations/{locale}/edit', 'TextController@editTranslation');
        Route::patch('texts/{id}/translations/{locale}', 'TextController@updateTranslation');
        Route::delete('texts/{id}/translations/{locale}', 'TextController@destroyTranslation');
        Route::resource('texts', 'TextController', ['parameters' => ['texts' => 'id'], 'except' => ['show']]);

    });


    //department
    Route::group(['prefix' => 'jobboard'], function () {

        Route::group(['middleware' => 'can:manage-jobboard-position'], function () {

            Route::get('positions/{id}/translations/create', 'PositionController@createTranslation');
            Route::post('positions/{id}/translations', 'PositionController@storeTranslation');
            Route::get('positions/{id}/translations/{locale}/edit', 'PositionController@editTranslation');
            Route::patch('positions/{id}/translations/{locale}', 'PositionController@updateTranslation');
            Route::delete('positions/{id}/translations/{locale}', 'PositionController@destroyTranslation');
            Route::resource('positions', 'PositionController', ['parameters' => ['positions' => 'id'], 'except' => ['show']]);

        });

        Route::group(['middleware' => 'can:manage-jobboard-location'], function () {

            Route::get('locations/{id}/translations/create', 'LocationController@createTranslation');
            Route::post('locations/{id}/translations', 'LocationController@storeTranslation');
            Route::get('locations/{id}/translations/{locale}/edit', 'LocationController@editTranslation');
            Route::patch('locations/{id}/translations/{locale}', 'LocationController@updateTranslation');
            Route::delete('locations/{id}/translations/{locale}', 'LocationController@destroyTranslation');
            Route::resource('locations', 'LocationController', ['parameters' => ['locations' => 'id'], 'except' => ['show']]);
        });


        Route::group(['middleware' => 'can:manage-jobboard-department'], function () {

            Route::get('departments/{id}/translations/create', 'DepartmentController@createTranslation');
            Route::post('departments/{id}/translations', 'DepartmentController@storeTranslation');
            Route::get('departments/{id}/translations/{locale}/edit', 'DepartmentController@editTranslation');
            Route::patch('departments/{id}/translations/{locale}', 'DepartmentController@updateTranslation');
            Route::delete('departments/{id}/translations/{locale}', 'DepartmentController@destroyTranslation');
            Route::resource('departments', 'DepartmentController', ['parameters' => ['departments' => 'id'], 'except' => ['show']]);
        });


    });

    Route::group(['prefix' => 'auth'], function () {

        Route::group(['middleware' => 'can:manage-auth-user'], function () {
            Route::resource('users', 'UserController', ['parameters' => ['users' => 'id'], 'except' => ['show']]);
        });
        Route::group(['middleware' => 'can:manage-auth-role'], function () {

            Route::resource('roles', 'RoleController', ['parameters' => ['roles' => 'id'], 'except' => ['show']]);;
        });
    });


    //user profile
    Route::get('users/profile', 'UserController@profile');
    Route::patch('users/profile', 'UserController@updateProfile');


    //tool
    Route::group(['prefix' => 'tool'], function () {

        Route::post('cache', 'ToolController@clearCache');

        Route::group(['middleware' => 'can:manage-tool-audit'], function () {
            Route::get('audits', 'ToolController@audit');
        });

        Route::group(['middleware' => 'can:manage-tool-url'], function () {
            Route::get('update-urls', 'ToolController@updateURL');
            Route::patch('update-urls', 'ToolController@updateURL');
        });

        Route::group(['middleware' => 'can:manage-tool-sitemap'], function () {
            Route::get('sitemap', 'ToolController@sitemap');
            Route::patch('sitemap', 'ToolController@sitemap');
        });
    });

    //setting
    Route::group(['prefix' => 'setting'], function () {

        Route::group(['middleware' => 'can:manage-setting-general'], function () {
            Route::get('general', 'SettingController@general');
            Route::patch('general', 'SettingController@updateGeneral');
        });

        Route::group(['middleware' => 'can:manage-setting-advance'], function () {
            Route::get('advance', 'SettingController@advance');
            Route::patch('advance', 'SettingController@updateAdvance');
        });

        //contact
        Route::group(['middleware' => 'can:manage-setting-contact'], function () {

            Route::resource('contacts', 'ContactController', ['parameters' => ['contacts' => 'id'], 'except' => ['show']]);
        });

    });

    //template route

    Route::get('template/reorder', 'TemplateController@reorder');
    Route::resource('template', 'TemplateController');


});


