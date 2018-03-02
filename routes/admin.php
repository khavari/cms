<?php
/*
|--------------------------------------------------------------------------
| Admin Panel Routes
|--------------------------------------------------------------------------
*/

// login
Route::get('admin', 'Admin\LoginController@show_admin_login_form');
Route::post('admin', 'Admin\LoginController@login')->name('admin');

Route::group(['namespace' => 'Admin', 'middleware' => ['web', 'auth'], 'prefix' => 'admin'], function () {

    // languages
    $this->get('languages/{lang}/', 'LanguageController@index')->name('admin.languages');

    // dashboard
    $this->get('dashboard', 'DashboardController@index')->name('admin.dashboard');

    // settings
    $this->resource('settings', 'SettingController', ["as" => "admin"]);

    // users
    $this->resource('users', 'UserController', ["as" => "admin"]);
    $this->resource('roles', 'RoleController', ["as" => "admin"]);
    $this->resource('logins', 'UserLoginController', ["as" => "admin"]);


    // features
    $this->resource('features', 'FeatureController', ["as" => "admin"]);
    $this->resource('features/{feature}/links', 'LinkController', ["as" => "admin"]);

    // contents
    $this->resource('vocabularies', 'VocabularyController', ["as" => "admin"]);
    $this->resource('categories', 'CategoryController', ["as" => "admin"]);
    $this->resource('contents', 'ContentController', ["as" => "admin"]);
    $this->resource('images', 'ImageController', ["as" => "admin"]);


    // comments
    $this->resource('comments', 'CommentController');
    $this->put('comments/{comment}/status', 'CommentController@status')->name('users.status');

    // =============================================================
    // groups
    $this->resource('{type}/groups', 'GroupController');
    $this->put('{type}/groups/{group}/status', 'GroupController@status')->name('groups.status');

    // posts
    $this->resource('{type}/posts', 'PostController');
    $this->put('{type}/posts/{post}/status', 'PostController@status')->name('posts.status');

    // post_images
    $this->resource('posts/{post}/images', 'PostImageController');
    $this->put('posts/{post}/images/{image}/status', 'PostImageController@status')->name('images.status');

    // post_files
    $this->resource('posts/{post}/files', 'PostFileController');
    $this->put('posts/{post}/files/{file}/status', 'PostFileController@status')->name('post_files.status');

    // post_videos
    $this->resource('posts/{post}/videos', 'PostVideoController');
    $this->put('posts/{post}/videos/{video}/status', 'PostVideoController@status')->name('videos.status');
    // =============================================================

    // provinces  sub provinces in ajax
    $this->resource('provinces', 'ProvinceController', ["as" => "admin"]);
    $this->put('provinces/{province}/status', 'ProvinceController@status')->name('admin.provinces.status');
    $this->get('sub_provinces', 'ProvinceController@sub_province')->name('admin.provinces.sub');


    // contacts
    $this->resource('contacts', 'ContactController', ["as" => "admin"]);
    $this->put('contacts/{contact}/archive', 'ContactController@archive')->name('admin.contacts.archive');

    // payments
    $this->resource('payments', 'PaymentController', ["as" => "admin"]);

    // files
    $this->resource('files', 'FileController', ["as" => "admin"]);
    $this->put('files/{file}/status', 'FileController@status')->name('admin.files.status');
    $this->get('all-files', 'FileController@all')->name('admin.files.all');


    // Document
    $this->get('document/seo', 'DocumentController@seo')->name('admin.documents.seo');
    $this->get('document/help', 'DocumentController@help')->name('admin.documents.help');

    $this->resource('widgets', 'WidgetController', ["as" => "admin"]);

});


