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

// Route::get('/Home', function () {
    
//     return view('welcome1');
// });


Route::post('/devicesaction','HomeController@storeDevice');
Route::get('/Home', 'HomeController@show');
Route::post('/Home/insertBlog', 'HomeController@insertBlog');
Route::get('/Home/index', 'HomeController@index');