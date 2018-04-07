<?php
/*
|--------------------------------------------------------------------------
| Admin Panel Routes
|--------------------------------------------------------------------------
*/

// login
Route::get('admin', 'Admin\LoginController@show_admin_login_form');
Route::post('admin', 'Admin\LoginController@login')->name('admin');

Route::group(['namespace' => 'Admin', 'middleware' => ['web', 'auth','acl'], 'prefix' => 'admin'], function () {

    // languages
    $this->get('languages/{lang}/', 'LanguageController@index')->name('admin.languages');

    // dashboard
    $this->get('dashboard', 'DashboardController@index')->name('admin.dashboard');

    // settings
    $this->resource('settings', 'SettingController', ["as" => "admin"]);

    // users
    $this->resource('users', 'UserController', ["as" => "admin"]);
    $this->resource('roles', 'RoleController', ["as" => "admin"]);
    $this->resource('permissions', 'PermissionController', ["as" => "admin"]);
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
    $this->resource('comments', 'CommentController', ["as" => "admin"]);

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

    $this->resource('widgets', 'WidgetController', ["as" => "admin"]);


    // products
    $this->resource('products', 'ProductController', ["as" => "admin"]);
    $this->resource('product_categories', 'ProductCategoryController', ["as" => "admin"]);


});


