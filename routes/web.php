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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//all admin routes will be available here
// /check-current-pw route should register inside VerifyCsrfToken.php file inside except array
Route::prefix('/admin')->namespace('Admin')->group(function(){

    Route::match(['get', 'post'], '/','AdminController@login');

    Route::group(['middleware' => ['admin']], function () {
        Route::get('dashboard','AdminController@dashboard');
        Route::get('settings','AdminController@settings');
        Route::post('/check-current-pw','AdminController@checkCurrentPassword');
        Route::post('/update-current-pwd','AdminController@updateCurrentPassword');
        Route::get('logout','AdminController@logout');
        Route::match(['get','post'], 'update-admin-details' ,'AdminController@updateAdminDetails');
    });


});
