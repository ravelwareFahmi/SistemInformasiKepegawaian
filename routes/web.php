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

Route::get('/login', 'AuthController@login')->name('login');
Route::post('/postLogin', 'AuthController@postLogin');
Route::get('/logout', 'AuthController@logout');
Auth::routes(['verify' => true]);
// Route::get('/dashboard', 'DashboardController@index')->name('dashboard')->middleware('verified');

// ROUTE ADMIN
Route::group(['middleware' =>['auth', 'checkRole:admin']], function(){
    Route::get('/kepegawaian', 'PegawaiController@index');
    Route::get('/dashboard', 'DashboardController@index');
    Route::get('/kepegawaian/create', 'PegawaiController@create');
    Route::post('/kepegawaian/create', 'PegawaiController@store');
    Route::get('/delete/pegawai/{pegawai}', 'PegawaiController@delete');
    Route::get('/edit/pegawai/{pegawai}', 'PegawaiController@edit');
    Route::post('/edit/pegawai/{pegawai}', 'PegawaiController@update');
    Route::get('/kepegawaian/exportExcel', 'PegawaiController@exportExcel');
    Route::post('/kepegawaian/importexcel', 'PegawaiController@importExcel')->name('pegawai.import');
});

// ROUTE PEGAWAI
Route::group(['middleware' =>['auth', 'checkRole:admin,pegawai']], function(){
    Route::get('/dashboard', 'DashboardController@index');
    Route::get('/change-password', 'Auth\ChangePasswordController@index')->name('password.change');
    Route::post('/change-password', 'Auth\ChangePasswordController@changePassword')->name('password.update');


});

Route::group(['middleware' =>['auth', 'checkRole:pegawai']], function(){
    Route::get('/pegawaiProfile', 'PegawaiController@dataPegawai');

});


