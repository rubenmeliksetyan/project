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
Route::get('/property/tenancy/{property}', 'PropertyController@tenancy_to_property')->name('property.tenancy');
Route::get('/property/{property}', 'PropertyController@show')->name('property.show');

Route::get('/tenant', 'TenantsController@index')->name('tenants');
Route::get('/tenant/create', 'TenantsController@create')->name('tenant.create');
Route::post('/tenant/store', 'TenantsController@store')->name('tenant.store');

