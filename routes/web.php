<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use \App\Report;

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

Route::get('/', 'ReportController@index');

Route::get('/welcome', 'TestController@index');

Route::post('/welcome', 'TestController@insert');

Route::get('/test', function() {
    return view('test');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'user'], function () {
    Route::get('/', 'UserController@index')->name('user.index');
    Route::get('/info/{id}', 'UserController@show')->name('user.show');


    Route::get('/create', 'UserController@create')->name('user.create');
    Route::post('/create', 'UserController@store')->name('user.store');


    Route::get('/update/{id}', 'UserController@edit')->name('user.edit');
    Route::post('/update/{id}', 'UserController@update')->name('user.update');

    Route::get('/delete/{id}', 'UserController@delete')->name('user.delete');

});


Route::group(['prefix' => 'project'], function () {
    Route::get('/', 'ProjectController@index')->name('project.index');
    Route::get('/info/{id}', 'ProjectController@show')->name('project.show');


    Route::get('/create', 'ProjectController@create')->name('project.create');
    Route::post('/create', 'ProjectController@store')->name('project.store');


    Route::get('/update/{id}', 'ProjectController@edit')->name('project.edit');
    Route::post('/update/{id}', 'ProjectController@update')->name('project.update');

    Route::get('/delete/{id}', 'ProjectController@delete')->name('project.delete');

    Route::get('/assign/{id}', 'ProjectController@assign')->name('project.assign');
    Route::post('/assign/{id}', 'ProjectController@assignPost')->name('project.assign_post');

    Route::post('/report/{id}', 'ProjectController@assignPost')->name('project.assign_post');


});

Route::group(['prefix' => 'report'], function () {
    Route::get('/', 'ReportController@index')->name('report.index');

    Route::get('/info/{id}', 'ProjectController@show')->name('report.info');


    Route::get('/create', 'ProjectController@create')->name('report.create');
    Route::post('/create', 'ProjectController@store')->name('report.store');


    Route::get('/update/{id}', 'ProjectController@edit')->name('report.edit');
    Route::post('/update/{id}', 'ProjectController@update')->name('report.update');

    Route::get('/delete/{id}', 'ProjectController@delete')->name('report.delete');

    Route::get('/checkin', 'ProjectController@checkin')->name('report.checkin');
    Route::post('/checkout', 'ProjectController@checkout')->name('report.checkout');



});





Route::get('/report', 'ReportController@index');

