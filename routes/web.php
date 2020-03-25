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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



// Employee 

Route::resource('Employee', 'EmployeeController')->except('edit','destroy','update');
route::get('Employeee/edit/{id}','EmployeeController@editEmployee');
Route::post('Employee/update/{id}','EmployeeController@updateEmployee')->name('updateEmployee');
route::get('Employee/delete/{id}','EmployeeController@deleteEmployee');

// post route 

route::prefix('post')->group(function(){
    route::get('create-post','PostController@create')->name('CreatePost');
    route::post('store-post','PostController@store')->name('StorePost');
    route::get('index-post','PostController@index')->name('IndexPost');
    route::get('/view/{id}','PostController@view');
    route::get('/edit/{id}','PostController@edit');
    route::post('/update/{id}','PostController@update');
    route::get('/delete/{id}','PostController@destroy');
});