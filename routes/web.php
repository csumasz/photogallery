<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\PhotoController;
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
Route::group(['middleware'=>'web'], function(){
  
    Route::resource('/gallery', 'GalleryController');
    Route::get('/', 'GalleryController@index');
    Route::get('/gallery/show/{id}', 'GalleryController@show');
    
    Route::resource('/photo', 'PhotoController');
    Route::get('/photo/details/{id}', 'PhotoController@details');//Az "id" átadása {} kötött működik    
    Route::get('/photo/create/{id}', 'PhotoController@create');
    
    
    Auth::routes();
    
    Route::get('/home', 'GalleryController@index');
    
    Route::get('/layout', 'Auth\LoginController@logout');
});
