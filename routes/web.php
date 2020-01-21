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

Route::resource('students', 'StudentsController');

// Route::get('/students', 'StudentsController@index')->name('students.index');
// Route::get('/student/{id}/edit','StudentsController@edit')->name('students.edit');
// Route::get('/students/{id}/delete','StudentsController@destroy')->name('students.destroy');
// Route::get('/create','StudentsController@create')->name('students.create');
// Route::post('/create','StudentsController@store')->name('students.store');
// Route::post('/students/update','StudentsController@update')->name('students.update');