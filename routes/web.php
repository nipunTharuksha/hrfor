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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('paevalu/designation', 'Paevalu\\DesignationController');
Route::resource('admin/mainplant', 'Admin\\MainplantController');

Route::resource('userregistration', 'Auth\\RegisterController');

Route::resource('admin/subplants', 'Admin\\SubplantsController');
Route::resource('pa/p-as', 'PA\\PAsController');