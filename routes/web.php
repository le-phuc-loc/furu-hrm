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


//register admin
Route::get('/admin/register', 'Admin\RegisterAdminController@index')->name('register.admin');
Route::post('/admin/register', 'Admin\RegisterAdminController@register')->name('register.admin.post');

// admin
Route::group([
    'namespace' => 'Admin',
    'prefix' => 'admin',
    'middleware'=>'admin',
    'as' => 'admin.'
],
    function() {

    Route::resource('user', 'UserController');

    Route::group([
        'prefix' => 'project'
    ], function() {

        Route::get('/assigned/{id}', 'ProjectController@assigned')->name('project.assigned');
        Route::get('/assign/{id}', 'ProjectController@assign')->name('project.assign');
        Route::post('/assign/{id}', 'ProjectController@assignPost')->name('project.assign_post');
        Route::get('/assigned/{id}/delete', 'ProjectController@deleteAssigned')->name('project.deleteAssigned');

    });
    Route::resource('project', 'ProjectController');


    // Route::group([
    //     'prefix' => 'report',
    // ], function () {
    //     Route::get('/', 'ReportController@index')->name('report.index');

    //     Route::get('/info/{id}', 'ReportController@show')->name('report.info');


    //     Route::get('/create/{id}', 'ReportController@create')->name('report.create');
    //     Route::post('/create/{id}', 'ReportController@store')->name('report.store');


    //     Route::get('/update/{id}', 'ReportController@edit')->name('report.edit');
    //     Route::post('/update/{id}', 'ReportController@update')->name('report.update');

    //     Route::get('/delete/{id}', 'ReportController@delete')->name('report.delete');

    // });

    Route::group([
        'prefix' => 'absent',
    ], function() {
        Route::get('/', 'AbsentController@index')->name('absent.index');

        Route::get('/approve/{id}', 'AbsentController@approve')->name('absent.approve');
        Route::post('/reject/{id}', 'AbsentController@reject')->name('absent.reject');
    });


    Route::group([
        'prefix' => 'dashboard',
    ], function() {
        Route::get('/working', 'DashboardController@timeWorking')->name('dashboard.working');
        Route::get('/absent', 'DashboardController@timeAbsent')->name('dashboard.absent');


    });


});



//manager

Route::group([
    'namespace' => 'Manager',
    'prefix' => 'manager',
    'middleware'=>'manager',
    'as' => 'manager.'
], function() {
    Route::resource('user', 'UserController')->only('index');

    Route::resource('project', 'ProjectController');

    Route::group(['prefix' => 'report'], function () {
        Route::get('/approve/{id}', 'ReportController@approve')->name('report.approve');
        Route::post('/reject/{id}', 'ReportController@reject')->name('report.reject');
    });
    Route::resource('report', 'ReportController');

    Route::group(['prefix' => 'absent'], function () {
        Route::get('/', 'AbsentController@index')->name('absent.index');
        Route::get('/mine', 'AbsentController@mine')->name('absent.mine');

        Route::get('/info/{id}', 'AbsentController@show')->name('absent.info');

        Route::get('/create', 'AbsentController@create')->name('absent.create');
        Route::post('/create', 'AbsentController@store')->name('absent.store');

        Route::get('/approve/{id}', 'AbsentController@approve')->name('absent.approve');
        Route::post('/reject/{id}', 'AbsentController@reject')->name('absent.reject');

        Route::get('/delete/{id}', 'AbsentController@delete')->name('absent.delete');

    });
});


// worker
Route::group([
    'namespace' => 'Worker',
    'prefix' => 'worker',
    'middleware'=>'worker',
    'as' => 'worker.'
], function() {
    Route::group(['prefix' => 'project'], function() {
        Route::get('/', 'ProjectController@index')->name('project.index');
        Route::get('/info/{id}', 'ProjectController@show')->name('user.show');
    });

    Route::group(['prefix' => 'report'], function () {
        Route::get('/', 'ReportController@index')->name('report.index');

        Route::get('/info/{id}', 'ReportController@show')->name('report.info');


        // Route::get('/create/{id}', 'ReportController@create')->name('report.create');
        Route::post('/create', 'ReportController@store')->name('report.store');

        // Route::get('/delete/{id}', 'ReportController@delete')->name('report.delete');

        Route::get('/checkin/{id}', 'ReportController@checkin')->name('report.checkin');
        Route::get('/checkout/{id}', 'ReportController@checkout')->name('report.checkout');

        Route::post('/sendOrDraw/{id}', 'ReportController@sendOrDraw')->name('report.sendOrDraw');

    });

    Route::resource('absent', 'AbsentController');
});




// Route::get('/user', 'UserController@index')->name('user.index');


