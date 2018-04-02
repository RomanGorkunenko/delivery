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

Auth::routes();
Route::group([
    'middleware' => 'admin'   
], function(){
Route::get('/admin', 'HomeController@index')->name('home');
Route::get('/admin', 'Admin\DashboardController@index')->name('admin');
Route::get('/admin/posts', 'Admin\PostsController@index')->name('products');
Route::get('/admin/orders', 'UserController@orders')->name('orders');
Route::any('/admin/orders/del/{id}', 'UserController@orderdestroy')->name('orderdel');
Route::get('/admin/users', 'UserController@users')->name('users');
Route::any('/admin/users/del/{id}', 'UserController@usersdestroy')->name('usersdel');
Route::any('/admin/posts/create', 'Admin\PostsController@create')->name('create');
Route::any('/admin/posts/edit/{id}', 'Admin\PostsController@edit')->name('edit');
Route::any('/admin/posts/del/{id}', 'Admin\PostsController@destroy')->name('del');
});

Route::get('/', 'Admin\PostsController@five')->name('welcome');
Route::get('logout','Auth\LoginController@logout')->name('logout');
Route::group([
    'middleware' => 'auth'   
], function(){
Route::get('/profile', 'UserController@profile')->name('user');
Route::any('/add', 'CardController@add');
Route::any('/showcart', 'CardController@show')->name('showcart');
Route::any('/google', 'CardController@google');
Route::any('/update', 'CardController@update');
Route::get('/delete/{rowId}', 'CardController@remove');
Route::any('/save', 'CardController@save');
Route::any('/restore', 'CardController@restore');

});
