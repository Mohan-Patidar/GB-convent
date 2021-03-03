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
    return view('auth.login');
});

Auth::routes();
Route::group(['middleware' => ['auth', 'disablepreventback']], function () {
   
   
    Route::resource('/add_class','App\Http\Controllers\ClassController');
    Route::resource('/students','App\Http\Controllers\StudentController');
    Route::get('/getdata', '\App\Http\Controllers\AjaxController@getdata')->name('getdata');


    
    
    
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('export', 'App\Http\Controllers\MyController@export')->name('export');
 
    Route::post('import', 'App\Http\Controllers\MyController@import')->name('import');