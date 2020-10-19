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

/*
Route::get('/admin', function () {
    return 'hello admin';
});
*/



Route::namespace('Front')->group(function(){
    
    Route::get('adminn','AdminController@showAdminName');
    Route::get('get','AdminController@showAdminName');
});


Route::get ('chick',function(){

    return 'Meddleware';
})->middleware('auth');

Route::get('second0','SecondController@showSecond0');
Route::get('second1','SecondController@showSecond1');
Route::get('second2','SecondController@showSecond2');
Route::get('second3','SecondController@showSecond3');
Route::get('last','Front\LastController@showLast');

Route::resource('news','NewsController');

Route::get('last','Front\LastController@showLast');

