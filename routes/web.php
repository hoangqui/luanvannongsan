<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Frontend
Route::group(['prefix' => ''], function() {
    Route::get('/', 'Frontend\HomeController@index')->name('home.index');

    Route::get('contact', function () { return view('Frontend.Contents.contact.index'); })->name('contact.index');
    Route::post('contact', 'Frontend\HomeController@postContact')->name('contact.post');

    Route::get('customer/login', 'Frontend\CustomerController@login')->name('customer.login');
    Route::post('customer/login', 'Frontend\CustomerController@postLogin')->name('customer.login.post');

    Route::get('customer/profile', 'Frontend\CustomerController@profile')->name('customer.profile');
    Route::post('customer/profile', 'Frontend\CustomerController@updateAccount')->name('customer.profile.post');

    Route::get('customer/profile/change-password', 'Frontend\CustomerController@changPass')->name('customer.changPass');
    Route::post('customer/profile/change-password', 'Frontend\CustomerController@postChangePass')->name('customer.changPass.post');

    Route::get('customer/profile/history-order', 'Frontend\CustomerController@index')->name('customer.historyOrder');

    Route::get('customer/register', 'Frontend\CustomerController@register')->name('customer.register');
    Route::post('customer/register', 'Frontend\CustomerController@postRegister')->name('customer.register.post');

    Route::get('customer/logout', 'Frontend\CustomerController@logout')->name('customer.logout');

    Route::get('categories', 'Frontend\ProductController@allCategory')->name('home.categories.list');
    Route::get('categories/{slug}.{id}', 'Frontend\ProductController@category')->name('home.categories');

    Route::get('search', 'Frontend\ProductController@search')->name('home.search.list');

    Route::get('products/new', 'Frontend\ProductController@allCategory')->name('home.products.new');
    Route::get('products/hot', 'Frontend\ProductController@allCategoryHot')->name('home.products.hot');

    Route::get('products/{slug}.{id}', 'Frontend\ProductController@detailProduct')->name('home.product.detail');

    Route::get('news', 'Frontend\NewController@list')->name('home.new.index');
    Route::get('news/{slug}.{id}', 'Frontend\NewController@detailNew')->name('home.new.detail');

    Route::get('cart', 'Frontend\CartController@index')->name('home.cart');
    Route::get('checkout', 'Frontend\CartController@checkout')->name('home.checkout');
    Route::post('checkout', 'Frontend\CartController@checkoutPost')->name('home.checkout.post');

    Route::get('checkout-success', 'Frontend\CartController@checkoutSuccess')->name('home.checkout.success');
});

Route::group(['prefix' => 'rest/frontend'], function() {
    // Cho sản phẩm vào giỏ
    Route::post('add-cart/{id}', 'Frontend\CartController@addCart');
    Route::post('delete-cart/{id}', 'Frontend\CartController@deleteCart');
    Route::post('update-cart/{id}', 'Frontend\CartController@updateCart');

    // Lấy sản phẩm
    Route::get('cart', 'Frontend\CartController@getCart');
});









//Admin
Route::group(['prefix' => 'admin', 'namespace' => 'Auth', 'middleware' => 'web'], function() {
    Route::get('login',  'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login');
    Route::get('logout', 'LoginController@logout')->name('logout');
    Route::get('register', 'LoginController@register')->name('register');

    Route::post('register', 'LoginController@postRegister');
});

Route::group(['prefix' => 'admin/users'], function() {
    Route::get('user-permission/{id}', '\DangKien\RolePer\Controllers\UserRoleController@index')->name('user-permission.index');
    Route::post('user-permission/{id}', '\DangKien\RolePer\Controllers\UserRoleController@store')->name('user-permission.store');
    Route::get('role-permission/{id}', '\DangKien\RolePer\Controllers\RolePermissionController@index')->name('roles-permission.index');
    Route::post('role-permission/{id}', '\DangKien\RolePer\Controllers\RolePermissionController@store')->name('roles-permission.store');
});

Route::resource('admin/roles', '\DangKien\RolePer\Controllers\RoleController');
Route::group(['prefix' => '', 'middleware' => 'role:superadmin'], function() {
    Route::resource('admin/permissions', '\DangKien\RolePer\Controllers\PermissionController');
    Route::resource('admin/permissions-group', '\DangKien\RolePer\Controllers\PermissionGroupController');
});

Route::group(['prefix' => 'admin', 'namespace' => 'Backend', 'middleware' => 'auth'], function() {
    Route::get('/laravel-filemanager', '\UniSharp\LaravelFilemanager\controllers\LfmController@show');
    Route::post('/laravel-filemanager/upload', '\UniSharp\LaravelFilemanager\controllers\UploadController@upload');
    
    Route::get('users/profile', 'UserController@show')->name('users.profile');
    Route::post('users/profile', 'UserController@updateSeft')->name('users.updateProfile');

    Route::get('users/change-password', 'UserController@change')->name('users.change');
    Route::post('users/change-password', 'UserController@changePassword')->name('users.changePassword');

    Route::resource('users', 'UserController');

    Route::get('/', 'HomeController@index')->name('backend.home');

    Route::resource('languages', 'LanguagesController', ['except'=>['destroy']]);

    Route::resource('categories', 'CategoryController', ['except'=>['destroy']]);

    Route::resource('posts', 'PostController', ['except'=>['destroy']]);

    Route::resource('products', 'ProductController', ['except'=>['destroy']]);

    Route::resource('slides', 'SlideController', ['except'=>['destroy']]);

    Route::resource('tags', 'TagController', ['except'=>['destroy']]);

    Route::get('setting', 'SettingController@index')->name('setting.index');

    Route::get('contacts', 'ContactController@index')->name('contacts.index');

    Route::get('orders', 'OrderController@index')->name('orders.index');

    Route::get('history-order', 'OrderController@history')->name('order.history');

    Route::get('members', 'MemberController@index')->name('members.index');

    Route::get('providers', 'UserController@provider')->name('providers.index');

    Route::get('providers/{id}/edit', 'UserController@showProvider')->name('providers.show');

    Route::get('providers/{id}', 'UserController@providerActive');
});

Route::group(['prefix' => 'rest/admin'], function() {

    Route::get('contact', 'Backend\ContactController@list');

    Route::get('members', 'Backend\MemberController@list');

    Route::get('provider', 'Backend\UserController@listProvider');

    Route::get('orders', 'Backend\OrderController@list');
    Route::get('detail-orders/{id}', 'Backend\OrderController@detailOrder');
    Route::post('update-orders/{id}', 'Backend\OrderController@updateOrder');

    Route::get('setting', 'Backend\SettingController@getSetting');
    Route::post('insertSetting', 'Backend\SettingController@insertSetting');
    
    Route::get('users', 'Backend\UserController@getList');
    Route::delete('users/{id}', 'Backend\UserController@destroy');

    Route::get('languages', 'Backend\LanguagesController@list');
    Route::delete('languages/{id}', 'Backend\LanguagesController@destroy');

    Route::get('categories', 'Backend\CategoryController@list');
    Route::delete('categories/{id}', 'Backend\CategoryController@destroy');

    Route::get('slides', 'Backend\SlideController@list');
    Route::delete('slides/{id}', 'Backend\SlideController@destroy');
    Route::post('slides/delete-multi', 'Backend\SlideController@destroyMulti');

    Route::get('tags', 'Backend\TagController@list');
    Route::delete('tags/{id}', 'Backend\TagController@destroy');
    Route::post('tags/delete-multi', 'Backend\TagController@destroyMulti');

    Route::get('posts', 'Backend\PostController@list');
    Route::delete('posts/{id}', 'Backend\PostController@destroy');
    Route::post('posts/delete-multi', 'Backend\PostController@destroyMulti');
    Route::post('posts/hot-new/{id}', 'Backend\PostController@hotNew');   
    Route::post('posts/prioritize-new/{id}', 'Backend\PostController@prioritizeNew');

    Route::get('products', 'Backend\ProductController@list');
    Route::delete('products/{id}', 'Backend\ProductController@destroy');
    Route::post('products/delete-multi', 'Backend\ProductController@destroyMulti');
    Route::post('products/hot-new/{id}', 'Backend\ProductController@hotNew');

    Route::get('history-by-provider', 'Backend\OrderController@historyProductOrder');
});