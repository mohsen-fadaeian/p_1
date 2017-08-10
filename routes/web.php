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

use App\SubsLevel;
use App\Teacher;
use Illuminate\Support\Facades\Input;

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
    Route::resource('admin/teachers','TeachersController');
    Route::resource('admin/class','EnClassContoller');
    Route::resource('admin/sing_st_class','AddStToClassController');
    Route::resource('admin/teachers/password','TeacherPasswordController');
    Route::get('/admin/class/create/ajax-state','EnClassContoller@ajax_1');
    Route::get('/admin/class/create/ajax-state-2','EnClassContoller@ajax_2');

    Route::get('/admin/sing_st_class/create/ajax-state','AddStToClassController@ajax_1');
    Route::get('/admin/sing_st_class/create/ajax-state-2','AddStToClassController@ajax_2');

    Route::get('/admin/sing_st_class/edit/ajax-state','AddStToClassController@ajax_1');
    Route::get('/admin/sing_st_class/edit/ajax-state-2','AddStToClassController@ajax_2');

    Route::post('/admin/sing_st_class/preview','AddStToClassController@prestore');
    Route::post('/admin/sing_st_class/preupdate','AddStToClassController@preupdate');


});