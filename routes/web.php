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

Route::get('/login','AuthController@login')->name('login');
Route::post('/postlogin','AuthController@postlogin');
Route::get('/logout','AuthController@logout');

Route::group(['middleware' => 'auth'], function(){
Route::get('/dashboard','DashboardController@index');

Route::get('/transaksi','TransaksiController@index');
Route::get('/transaksi/detail','TransaksiController@detail');
Route::post('/transaksi/create','TransaksiController@create');
Route::get('/transaksi/{id}/delete','TransaksiController@delete');

Route::get('/paket','PaketController@index');
Route::post('/paket/create','PaketController@create');
Route::post('/paket/{id}/edit','PaketController@edit');
Route::get('/paket/{id}/delete','PaketController@delete');

Route::get('/aboutadm','TentangController@index');
Route::post('/aboutadm/create','TentangController@create');
Route::post('/aboutadm/{id}/edit','TentangController@edit');
Route::get('/aboutadm/{id}/delete','TentangController@delete');

Route::get('/carousel','CarouselController@index');
Route::post('/carousel/create','CarouselController@create');
Route::post('/carousel/{id}/edit','CarouselController@edit');
Route::get('/carousel/{id}/delete','CarouselController@delete');

Route::get('/clients','ClientsController@index');
Route::post('/clients/create','ClientsController@create');
Route::post('/clients/{id}/edit','ClientsController@edit');
Route::get('/clients/{id}/delete','ClientsController@delete');

Route::get('/bus','BusController@index');
Route::post('/bus/create','BusController@create');
Route::post('/bus/{id}/edit','BusController@edit');
Route::get('/bus/{id}/delete','BusController@delete');
Route::get('/bus/{id}/cari','BusController@cari');

Route::get('/hotel','HotelController@index');
Route::post('/hotel/create','HotelController@create');
Route::post('/hotel/{id}/edit','HotelController@edit');
Route::get('/hotel/{id}/delete','HotelController@delete');

Route::get('/galeriadm','GaleriController@index');
Route::post('/galeriadm/create','GaleriController@create');
Route::post('/galeriadm/{id}/edit','GaleriController@edit');
Route::get('/galeriadm/{id}/delete','GaleriController@delete');
});

Route::get('/home', function (Request $request) {
    $datacarousel = \App\Carousel::all();
    $dataclients = \App\Clients::all();
    $datapaket = \App\Paket::all();
    return view('pages.home', ['datacarousel' => $datacarousel,'dataclients'=>$dataclients,'datapaket'=>$datapaket]);
});
Route::get('/', function (Request $request) {
    $datacarousel = \App\Carousel::all();
    $dataclients = \App\Clients::all();
    $datapaket = \App\Paket::all();
    return view('pages.home', ['datacarousel' => $datacarousel,'dataclients'=>$dataclients,'datapaket'=>$datapaket]);
});

Route::get('/about', function (Request $request) {
    $dataclients = \App\Clients::all();
    return view('pages.about',['dataclients'=>$dataclients]);
});

Route::get('/contact', function () {
    return view('pages.contact');
});
Route::get('/tour', 'TourController@index');
Route::post('/tour/hitung', 'TourController@proses');
Route::post('/tour/create', 'TourController@create');
Route::get('/cari', 'TourController@cari');
Route::get('/cari2', 'TourController@cari2');

Route::get('/galeri', function () {
    $datagaleri = \App\Galeri::all();
    return view('pages.galeri', ['datagaleri'=>$datagaleri]);
});
