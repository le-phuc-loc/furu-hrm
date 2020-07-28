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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/welcome1', function () {
    return view('welcome1');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('role');

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

Route::get('/manager', function () {
    return view('userManager/index');
})->name('manager');


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
Route::get('/projectWorker', function () {
    return view('user/worker/projectWorker');
})->name('projectWorker');

Route::get('/reportWorker', function () {
    return view('user/worker/reportWorker');
})->name('reportWorker');
