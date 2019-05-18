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

// MediaManager
ctf0\MediaManager\MediaRoutes::routes();

Route::group(['prefix' => 'admin', 'middleware' => 'auth', 'middleware' => [], 'namespace' => 'Admin'], function () {
    Route::get('/dashboard', 'UsersController@dashboard')->name('admin.dashboard');
    Route::resource('users', 'UsersController');
    Route::resource('permission', 'PermissionController');
    Route::resource('roles', 'RolesController');
});