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
// class cars
// {
// }

// $car1= new cars();

// $cars_serialized= serialize($car1);

// echo "This is the serialized object: '$cars_serialized'";







Route::get(
    '/', function () {
        return view('welcome'); 
    }
); 
//Route::get('/', 'StudentsController@index')->name('home'); 
Route::resource('students', 'StudentsController');
Route::resource('lessons', 'LessonsController');

Auth::routes();

Route::get('/comp', 'PagesController@index')->name('comp');

Route::get('/home', 'PagesController@index')->name('home');

//Static
Route::get('/bookings', ['as' => 'bookings', 'uses' => 'BookingsController@index']);

