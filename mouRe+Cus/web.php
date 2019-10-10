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



//start from here
Route::get('/moufirst', function () {
    return view('mou.moufirst');
});


Route::get('/mou/customer', function () {
    return view('mou.customers.createcus');
});


Route::get('/mou/customer/show', 'MouController@index')->name('showcus');


Route::resource('/mou', 'MouController'); //customer



