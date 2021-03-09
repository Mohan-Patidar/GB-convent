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
    Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
   
    Route::resource('/add_class','App\Http\Controllers\ClassController');
    Route::resource('/students','App\Http\Controllers\StudentController');
    Route::resource('/reports','App\Http\Controllers\ReportController');
    
    // Route::get('/getdata', '\App\Http\Controllers\AjaxController@getdata')->name('getdata');

    Route::get('export', 'App\Http\Controllers\MyController@export')->name('export');
 
    Route::post('import', 'App\Http\Controllers\MyController@import')->name('import');
    
    Route::get('classes/{id}', 'App\Http\Controllers\SidebarController@classData')->name('classData');
    Route::get('session/{id}', 'App\Http\Controllers\SidebarController@sessionData')->name('sessionData');
    
    Route::resource('assignrole', 'App\Http\Controllers\RoleAssign');
});
// Route::group(['middleware' => ['auth','role:Admin']], function () 
// {
    // Route::get('/roles-permissions', 'App\Http\Controllers\RolePermissionController@roles')->name('roles-permissions');
    // Route::get('/role-create', 'App\Http\Controllers\RolePermissionController@createRole')->name('role.create');
    // Route::post('/role-store', 'App\Http\Controllers\RolePermissionController@storeRole')->name('role.store');
    // Route::get('/role-edit/{id}', 'App\Http\Controllers\RolePermissionController@editRole')->name('role.edit');
    // Route::put('/role-update/{id}', 'App\Http\Controllers\RolePermissionController@updateRole')->name('role.update');

    // Route::get('/permission-create', 'App\Http\Controllers\RolePermissionController@createPermission')->name('permission.create');
    // Route::post('/permission-store', 'App\Http\Controllers\RolePermissionController@storePermission')->name('permission.store');
    // Route::get('/permission-edit/{id}', 'App\Http\Controllers\RolePermissionController@editPermission')->name('permission.edit');
    // Route::put('/permission-update/{id}', 'App\Http\Controllers\RolePermissionController@updatePermission')->name('permission.update');

   

// });

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



