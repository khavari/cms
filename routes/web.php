<?php
/*
|--------------------------------------------------------------------------
| Authentication routes
| Illuminate/Routing/Router.php
|--------------------------------------------------------------------------
*/
Route::group(['namespace' => 'Auth'], function () {
// Authentication Routes...
    $this->get('login', 'LoginController@showLoginForm')->name('login');
    $this->post('login', 'LoginController@login');
    $this->post('logout', 'LoginController@logout')->name('logout');

// Registration Routes...
    $this->get('register', 'RegisterController@showRegistrationForm')->name('register');
    $this->post('register', 'RegisterController@register');

// Password Reset Routes...
    $this->get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
    $this->post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    $this->get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
    $this->post('password/reset', 'ResetPasswordController@reset');
});

Route::group(['middleware' => ['web', 'auth']], function () {
    $this->get('user/profile', 'Web\UserController@showProfileForm')->name('profile');
    $this->patch('user/profile', 'Web\UserController@updateProfile');
    $this->post('form/comment', 'Web\FormController@comment')->name('submit-comment');
});
$this->post('form/contact', 'Web\FormController@contact')->name('contact-us');


/*
|--------------------------------------------------------------------------
| home page
|--------------------------------------------------------------------------
*/
Route::get('/', 'Web\HomeController@index')->name('home');
Route::get('vocabulary/{slug}', 'Web\ContentController@vocabulary')->name('vocabulary');
Route::get('category/{slug}', 'Web\ContentController@category')->name('category');
Route::get('content/{slug}', 'Web\ContentController@content')->name('content');
Route::get('c/{content}', 'Web\ContentController@redirect_to_content');

Route::get('product/{slug}', 'Web\ProductController@product')->name('product');
Route::get('p/{product}', 'Web\ProductController@redirect_to_product');
Route::get('products/{slug}', 'Web\ProductController@products')->name('products');


Route::get('search', 'Web\ContentController@search')->name('search');


Route::get('/clear', function () {
    \Illuminate\Support\Facades\Artisan::call('cach:clear');
    \Illuminate\Support\Facades\Artisan::call('view:clear');
    \Illuminate\Support\Facades\Artisan::call('config:clear');
    return 'ok';
});
