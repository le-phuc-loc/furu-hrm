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



Route::get('/test', function() {
    return view('test');
});
Route::pattern('id', '[0-9]+');
Route::pattern('report_id', '[0-9]+');

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

    Route::group(['prefix' => 'project'], function() {
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

    Route::group(['prefix' => 'report'], function () {
        Route::get('/', 'ReportController@index')->name('report.index');

        Route::get('/info/{id}', 'ReportController@show')->name('report.info');


        Route::get('/create/{id}', 'ReportController@create')->name('report.create');
        Route::post('/create/{id}', 'ReportController@store')->name('report.store');


        Route::get('/update/{id}', 'ReportController@edit')->name('report.edit');
        Route::post('/update/{id}', 'ReportController@update')->name('report.update');

        Route::get('/delete/{id}', 'ReportController@delete')->name('report.delete');

        Route::post('/checkin', 'ReportController@checkin')->name('report.checkin');
        Route::post('/checkout', 'ReportController@checkout')->name('report.checkout');

        Route::get('/send', 'ReportController@send')->name('report.send');
        Route::get('/draw', 'ReportController@draw')->name('report.draw');

    });

    Route::group(['prefix' => 'absent'], function () {
        Route::get('/', 'ReportController@index')->name('report.index');

        Route::get('/info/{id}', 'ReportController@show')->name('report.info');


        Route::get('/create/{id}', 'ReportController@create')->name('report.create');
        Route::post('/create/{id}', 'ReportController@store')->name('report.store');


        Route::get('/update/{id}', 'ReportController@edit')->name('report.edit');
        Route::post('/update/{id}', 'ReportController@update')->name('report.update');

        Route::get('/delete/{id}', 'ReportController@delete')->name('report.delete');

        Route::post('/checkin', 'ReportController@checkin')->name('report.checkin');
        Route::post('/checkout', 'ReportController@checkout')->name('report.checkout');

        Route::get('/send', 'ReportController@send')->name('report.send');
        Route::get('/draw', 'ReportController@draw')->name('report.draw');

    });

});


// manager

// Route::group(['namespace' => 'Manager', 'prefix' => 'manager'], function() {
//     Route::group(['prefix' => 'user'], function() {
//         Route::get('/', 'UserController@index')->name('admin.user.index');
//         Route::get('/info/{id}', 'UserController@show')->name('admin.user.show');


//         Route::get('/create', 'UserController@create')->name('admin.user.create');
//         Route::post('/create', 'UserController@store')->name('admin.user.store');


//         Route::get('/update/{id}', 'UserController@edit')->name('admin.user.edit');
//         Route::post('/update/{id}', 'UserController@update')->name('admin.user.update');

//         Route::get('/delete/{id}', 'UserController@delete')->name('admin.user.delete');
//     });

//     Route::group(['prefix' => 'project'], function() {
//         Route::get('/', 'UserController@index')->name('admin.user.index');
//         Route::get('/info/{id}', 'UserController@show')->name('admin.user.show');


//         Route::get('/create', 'UserController@create')->name('admin.user.create');
//         Route::post('/create', 'UserController@store')->name('admin.user.store');


//         Route::get('/update/{id}', 'UserController@edit')->name('admin.user.edit');
//         Route::post('/update/{id}', 'UserController@update')->name('admin.user.update');

//         Route::get('/delete/{id}', 'UserController@delete')->name('admin.user.delete');
//     });

//     Route::group(['prefix' => 'report'], function () {
//         Route::get('/', 'ReportController@index')->name('report.index');

//         Route::get('/info/{id}', 'ReportController@show')->name('report.info');


//         Route::get('/create/{id}', 'ReportController@create')->name('report.create');
//         Route::post('/create/{id}', 'ReportController@store')->name('report.store');


//         Route::get('/update/{id}', 'ReportController@edit')->name('report.edit');
//         Route::post('/update/{id}', 'ReportController@update')->name('report.update');

//         Route::get('/delete/{id}', 'ReportController@delete')->name('report.delete');

//         Route::post('/checkin', 'ReportController@checkin')->name('report.checkin');
//         Route::post('/checkout', 'ReportController@checkout')->name('report.checkout');

//         Route::get('/send', 'ReportController@send')->name('report.send');
//         Route::get('/draw', 'ReportController@draw')->name('report.draw');

//     });

//     Route::group(['prefix' => 'absent'], function () {
//         Route::get('/', 'ReportController@index')->name('report.index');

//         Route::get('/info/{id}', 'ReportController@show')->name('report.info');


//         Route::get('/create/{id}', 'ReportController@create')->name('report.create');
//         Route::post('/create/{id}', 'ReportController@store')->name('report.store');


//         Route::get('/update/{id}', 'ReportController@edit')->name('report.edit');
//         Route::post('/update/{id}', 'ReportController@update')->name('report.update');

//         Route::get('/delete/{id}', 'ReportController@delete')->name('report.delete');

//         Route::post('/checkin', 'ReportController@checkin')->name('report.checkin');
//         Route::post('/checkout', 'ReportController@checkout')->name('report.checkout');

//         Route::get('/send', 'ReportController@send')->name('report.send');
//         Route::get('/draw', 'ReportController@draw')->name('report.draw');

//     });
// });


// // worker
// Route::group(['namespace' => 'Worker', 'prefix' => 'worker'], function() {
//     Route::group(['prefix' => 'project'], function() {
//         Route::get('/', 'UserController@index')->name('admin.user.index');
//         Route::get('/info/{id}', 'UserController@show')->name('admin.user.show');


//         Route::get('/create', 'UserController@create')->name('admin.user.create');
//         Route::post('/create', 'UserController@store')->name('admin.user.store');


//         Route::get('/update/{id}', 'UserController@edit')->name('admin.user.edit');
//         Route::post('/update/{id}', 'UserController@update')->name('admin.user.update');

//         Route::get('/delete/{id}', 'UserController@delete')->name('admin.user.delete');
//     });

//     Route::group(['prefix' => 'report'], function () {
//         Route::get('/', 'ReportController@index')->name('report.index');

//         Route::get('/info/{id}', 'ReportController@show')->name('report.info');


//         Route::get('/create/{id}', 'ReportController@create')->name('report.create');
//         Route::post('/create/{id}', 'ReportController@store')->name('report.store');


//         Route::get('/update/{id}', 'ReportController@edit')->name('report.edit');
//         Route::post('/update/{id}', 'ReportController@update')->name('report.update');

//         Route::get('/delete/{id}', 'ReportController@delete')->name('report.delete');

//         Route::post('/checkin', 'ReportController@checkin')->name('report.checkin');
//         Route::post('/checkout', 'ReportController@checkout')->name('report.checkout');

//         Route::get('/send', 'ReportController@send')->name('report.send');
//         Route::get('/draw', 'ReportController@draw')->name('report.draw');

//     });

//     Route::group(['prefix' => 'absent'], function () {
//         Route::get('/', 'ReportController@index')->name('report.index');

//         Route::get('/info/{id}', 'ReportController@show')->name('report.info');


//         Route::get('/create/{id}', 'ReportController@create')->name('report.create');
//         Route::post('/create/{id}', 'ReportController@store')->name('report.store');


//         Route::get('/update/{id}', 'ReportController@edit')->name('report.edit');
//         Route::post('/update/{id}', 'ReportController@update')->name('report.update');

//         Route::get('/delete/{id}', 'ReportController@delete')->name('report.delete');

//         Route::post('/checkin', 'ReportController@checkin')->name('report.checkin');
//         Route::post('/checkout', 'ReportController@checkout')->name('report.checkout');

//         Route::get('/send', 'ReportController@send')->name('report.send');
//         Route::get('/draw', 'ReportController@draw')->name('report.draw');

//     });
// });




// Route::get('/user', 'UserController@index')->name('user.index');


