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


Route::get('/Login','LoginController@index');
//Route::post('/Login/loginverify','LoginController@loginverify');
Route::post('/loginverify','LoginController@loginverify');
Route::get('/FaqLists','FaqListsController@index');
Route::get('/ActivityList','ActivityListController@index');
Route::get('/CountryList','CountryListsController@index');
Route::get('/AddFaq','AddFaqController@index');
Route::get('/AddCountry','AddCountryController@index');
Route::get('/AddCity','AddCityController@index');
Route::post('/addFaq','AddFaqController@addFaq');
Route::get('/AddCategory','AddCategoryController@index');
Route::get('/AddActivity','AddActivityController@index');
Route::post('/addEditData','AddCountryController@addEditData');
Route::post('/City/addEditData','AddCityController@addEditData');
Route::post('/Category/addEditData','AddCategoryController@addEditData');
Route::post('/Activity/addEditData','AddActivityController@addEditData');
Route::get('/Logout','LogoutController@index');



Route::get('/ApplicationLists','ApplicationListsController@index');
Route::get('/CityList','CityListController@index');
Route::get('/CategoryList','CategoryListController@index');


Route::get('ActivityList/edit/{operation}/{id}','ActivityListController@edit');
Route::get('CategoryList/edit/{operation}/{id}','CategoryListController@edit');
Route::get('FaqLists/editFaq/{operation}/{id}','FaqListsController@editFaq');
Route::get('CityList/edit/{operation}/{id}','CityListController@edit');
Route::get('CountryList/edit/{operation}/{id}','CountryListsController@edit');
Route::get('FaqLists/edit/{operation}/{id}', function ($operation, $id) {
    //
});