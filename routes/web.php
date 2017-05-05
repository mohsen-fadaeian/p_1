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

Route::group(['middleware' => ['auth']], function () {

    Route::get('/admin', function (){ return view('admin.index'); });
    Route::resource('admin/students','StudentsController');
    Route::resource('admin/students_login','StudentsLoginController');
    Route::resource('admin/levels/mainlvl','MainLevelController');
    Route::resource('admin/levels/subslvl','SubsLevelController');

});