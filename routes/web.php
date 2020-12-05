<?php

Route::get('/', function () {
    return view('service');
});
Route::post('/service', 'ServiceController@store');
Route::get('/service', 'ServiceController@index');
Route::get('/service-meta', 'ServiceMetaController@index');
Route::post('/service-meta', 'ServiceMetaController@store');
Route::delete('/service-meta/{id}', 'ServiceMetaController@destroy');
Route::get('/customer', 'CustomerController@index');
Route::post('/customer', 'CustomerController@store');
Route::get('/customer-service/{customer}', 'CustomerServiceController@index');
Route::post('/customer-service/{customer}', 'CustomerServiceController@store')->name('customer.service.store');

