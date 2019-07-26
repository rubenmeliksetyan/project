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

Route::post('/property/store', 'PropertyController@store')->name('property.store');
Route::get('/property', 'PropertyController@index')->name('property');
Route::get('/property/{property}', 'PropertyController@show')->name('property.show');
Route::get('/property/{property}/edit', 'PropertyController@edit')->name('property.edit');
Route::put('/property/{property}/update', 'PropertyController@update')->name('property.update');

//tenancy routes

Route::post('/tenancy/property/{property}', 'TenancyController@store')->name('tenancy.store');
Route::get('/tenancy', 'TenancyController@index')->name('tenancy');
Route::get('/tenancy/{tenancy}', 'TenancyController@edit')->name('tenancy.edit');

Route::get('/tenant', 'TenantsController@index')->name('tenants');
Route::get('/tenant/create', 'TenantsController@create')->name('tenant.create');
Route::post('/tenant/store', 'TenantsController@store')->name('tenant.store');

