<?php

use Illuminate\Support\Facades\Route;

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



Route::get('/test', function() {
    return view('test');
});

// Route::get('/welcome1', function () {
//     return view('welcome1');
// });

Auth::routes();

// admin
Route::get('/home', 'HomeController@index')->name('home');
Route::group([
    'namespace' => 'Admin',
    'prefix' => 'admin',
],
    function() {
    Route::group([
        'prefix' => 'user',
    ], function() {
        Route::get('/', 'UserController@index')->name('admin.user.index');
        Route::get('/info/{id}', 'UserController@show')->name('admin.user.show');


        Route::get('/create', 'UserController@create')->name('admin.user.create');
        Route::post('/create', 'UserController@store')->name('admin.user.store');


        Route::get('/update/{id}', 'UserController@edit')->name('admin.user.edit');
        Route::post('/update/{id}', 'UserController@update')->name('admin.user.update');

        Route::get('/delete/{id}', 'UserController@delete')->name('admin.user.delete');
    });

    Route::group([
        'prefix' => 'project'
    ], function() {
        Route::get('/', 'ProjectController@index')->name('admin.project.index');
        Route::get('/info/{id}', 'ProjectController@show')->name('admin.project.show');


        Route::get('/create', 'ProjectController@create')->name('admin.project.create');
        Route::post('/create', 'ProjectController@store')->name('admin.project.store');


        Route::get('/update/{id}', 'ProjectController@edit')->name('admin.project.edit');
        Route::post('/update/{id}', 'ProjectController@update')->name('admin.project.update');

        Route::get('/delete/{id}', 'ProjectController@delete')->name('admin.project.delete');

        Route::get('/assigned/{id}', 'ProjectController@assigned')->name('admin.project.assigned');
        Route::get('/assign/{id}', 'ProjectController@assign')->name('admin.project.assign');
        Route::post('/assign/{id}', 'ProjectController@assignPost')->name('admin.project.assign_post');
        Route::get('/assigned/{id}/delete', 'ProjectController@deleteAssigned')->name('admin.project.deleteAssigned');

    });

    Route::group([
        'prefix' => 'report',
    ], function () {
        Route::get('/', 'ReportController@index')->name('admin.report.index');

        Route::get('/info/{id}', 'ReportController@show')->name('admin.report.info');


        Route::get('/create/{id}', 'ReportController@create')->name('admin.report.create');
        Route::post('/create/{id}', 'ReportController@store')->name('report.store');


        Route::get('/update/{id}', 'ReportController@edit')->name('report.edit');
        Route::post('/update/{id}', 'ReportController@update')->name('report.update');

        Route::get('/delete/{id}', 'ReportController@delete')->name('report.delete');
        Route::get('/delete/{id}', 'ReportController@delete')->name('report');

    });

    Route::group([
        'prefix' => 'absent',
    ], function() {
        Route::get('/', 'AbsentController@index')->name('admin.absent.index');

        Route::get('/approve/{id}', 'AbsentController@approve')->name('admin.absent.approve');
        Route::post('/reject/{id}', 'AbsentController@reject')->name('admin.absent.reject');
    });




});



//manager

Route::group([
    'namespace' => 'Manager',
    'prefix' => 'manager'
], function() {
    Route::group(['prefix' => 'user'], function() {
        Route::get('/', 'UserController@index')->name('manager.user.index');
        Route::get('/info/{id}', 'UserController@show')->name('manager.user.show');


        Route::get('/create', 'UserController@create')->name('manager.user.create');
        Route::post('/create', 'UserController@store')->name('manager.user.store');


        Route::get('/update/{id}', 'UserController@edit')->name('manager.user.edit');
        Route::post('/update/{id}', 'UserController@update')->name('manager.user.update');

        Route::get('/delete/{id}', 'UserController@delete')->name('manager.user.delete');
    });

    Route::group(['prefix' => 'project'], function() {
        Route::get('/', 'ProjectController@index')->name('manager.project.index');
        Route::get('/info/{id}', 'ProjectController@show')->name('manager.project.show');

        Route::get('/update/{id}', 'ProjectController@edit')->name('manager.project.edit');
        Route::post('/update/{id}', 'ProjectController@update')->name('manager.project.update');

    });

    Route::group(['prefix' => 'report'], function () {
        Route::get('/', 'ReportController@index')->name('manager.report.index');

        Route::get('/info/{id}', 'ReportController@show')->name('manager.report.info');

        Route::get('/approve/{id}', 'ReportController@approve')->name('manager.report.approve');
        Route::post('/reject/{id}', 'ReportController@reject')->name('manager.report.reject');

        Route::get('/delete/{id}', 'ReportController@delete')->name('manager.report.delete');

    });

    Route::group(['prefix' => 'absent'], function () {
        Route::get('/', 'AbsentController@index')->name('manager.absent.index');

        Route::get('/info/{id}', 'AbsentController@show')->name('manager.absent.info');


        Route::post('/create', 'AbsentController@store')->name('manager.absent.store');

        Route::get('/approve/{id}', 'AbsentController@approve')->name('manager.absent.approve');
        Route::post('/reject/{id}', 'AbsentController@reject')->name('manager.absent.reject');

        Route::get('/delete/{id}', 'AbsentController@delete')->name('manager.absent.delete');

    });
});


// worker
Route::group(['namespace' => 'Worker', 'prefix' => 'worker'], function() {
    Route::group(['prefix' => 'project'], function() {
        Route::get('/', 'ProjectController@index')->name('worker.project.index');
        Route::get('/info/{id}', 'ProjectController@show')->name('admin.user.show');
    });

    Route::group(['prefix' => 'report'], function () {
        Route::get('/', 'ReportController@index')->name('worker.report.index');

        Route::get('/info/{id}', 'ReportController@show')->name('worker.report.info');


        Route::get('/create/{id}', 'ReportController@create')->name('report.create');
        Route::post('/create', 'ReportController@store')->name('worker.report.store');


        Route::get('/update/{id}', 'ReportController@edit')->name('report.edit');
        Route::post('/update/{id}', 'ReportController@update')->name('report.update');

        Route::get('/delete/{id}', 'ReportController@delete')->name('report.delete');

        Route::get('/checkin/{id}', 'ReportController@checkin')->name('worker.report.checkin');
        Route::get('/checkout/{id}', 'ReportController@checkout')->name('worker.report.checkout');

        Route::post('/sendOrDraw/{id}', 'ReportController@sendOrDraw')->name('worker.report.sendOrDraw');

    });

    Route::group(['prefix' => 'absent'], function () {
        Route::get('/', 'AbsentController@index')->name('worker.absent.index');

        Route::get('/info/{id}', 'AbsentController@show')->name('worker.absent.info');

        Route::post('/create', 'AbsentController@store')->name('worker.absent.store');


        Route::get('/update/{id}', 'AbsentController@edit')->name('worker.absent.edit');
        Route::post('/update/{id}', 'AbsentController@update')->name('worker.absent.update');

        Route::get('/delete/{id}', 'AbsentController@delete')->name('worker.absent.delete');

    });
});




// Route::get('/user', 'UserController@index')->name('user.index');