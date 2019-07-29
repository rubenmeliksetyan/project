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
Route::get('/properties', 'PropertyController@index')->name('properties');

Route::get('/property/{property}/edit', 'PropertyController@edit')->name('property.edit');
Route::put('/property/{property}/update', 'PropertyController@update')->name('property.update');

//tenancy routes
Route::get('/tenancies', 'TenancyController@index')->name('tenancies');
Route::get('/property/create', 'TenancyController@create')->name('tenancy.show');
Route::post('/tenancy/property', 'TenancyController@store')->name('tenancy.store');
Route::get('/tenancy/{tenancy}', 'TenancyController@edit')->name('tenancy.edit');
Route::put('/tenancy/{tenancy}', 'TenancyController@update')->name('tenancy.update');

Route::get('/tenant', 'TenantsController@index')->name('tenants');
Route::get('/tenant/create', 'TenantsController@create')->name('tenant.create');
Route::post('/tenant/store', 'TenantsController@store')->name('tenant.store');

