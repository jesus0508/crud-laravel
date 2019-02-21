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

Route::get('/employees/{name}','EmployeeController@findOne')->name('employees.findOne')->where('name', '[A-Za-z]+');;
Route::resource('/employees','EmployeeController');
Route::get('/jobs','JobController@index')->name('jobs.index');
Route::get('/departments','DepartmentController@index')->name('departments.index');