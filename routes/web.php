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

Route::get('/', 'HomeController@index')->name('home');

Route::get('/welcome', 'TestController@index');

Route::post('/welcome', 'TestController@insert');

Route::get('/test', function() {
    return view('test');
});
Route::pattern('id', '[0-9]+');
Route::pattern('report_id', '[0-9]+');

Route::get('/welcome1', function () {
    return view('welcome1');
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


    Route::group(['prefix' => 'report'], function () {
        Route::get('/{id}', 'ReportController@index')->name('report.index');

        Route::get('/{id}/info/{report_id}', 'ReportController@show')->name('report.info');


        Route::get('/{id}/create/{report_id}', 'ReportController@create')->name('report.create');
        Route::post('/{id}/create/{report_id}', 'ReportController@store')->name('report.store');


        Route::get('/update/{report_id}', 'ReportController@edit')->name('report.edit');
        Route::post('/update/{report_id}', 'ReportController@update')->name('report.update');

        Route::get('/delete/{report_id}', 'ReportController@delete')->name('report.delete');

        Route::post('/{id}/checkin', 'ReportController@checkin')->name('report.checkin');
        Route::post('/{id}/checkout', 'ReportController@checkout')->name('report.checkout');

        Route::get('/{id}/send', 'ReportController@send')->name('report.send');
        Route::get('/{id}/draw', 'ReportController@draw')->name('report.draw');

    });
});




Route::get('/admin2', function () {
    return view('layouts/admin_interface');
})->name('admin2');
Route::get('/manager2', function () {
    return view('layouts/manager_interface');
})->name('manager2');
Route::get('/worker2', function () {
    return view('layouts/worker_interface');
})->name('worker2');
Route::get('/create', function () {
    return view('page/create');
})->name('project_create');




Route::get('/worker', function () {
    return view('userWorker/index');
})->name('worker');
Route::get('/admin', 'AdminController@index');


// ADmin
//List User
Route::get('/userAdmin', function () {
    return view('user/admin/userAdmin');
})->name('userAdmin');
// Create user
Route::get('/projectAdmin', function () {
    return view('user/admin/projectAdmin');
})->name('projectAdmin');
//Assign Project
Route::get('/assignAdmin', function () {
    return view('user/admin/assignAdmin');
})->name('assignAdmin');

//Worker
Route::get('/project', function () {
    return view('user/worker/project');
})->name('project');

Route::get('/report', function () {
    return view('user/worker/report');
})->name('report');
