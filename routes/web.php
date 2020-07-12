<?php

use Illuminate\Support\Facades\Route;


Route::namespace('frontend')->group(function () {

Route::get('/', 'DefaultController@index')->name('anasayfa');
Route::get('/urun', 'UrunController@index')->name('urun');
Route::get('/urun-detay/{slug}', 'UrunController@index')->name('urun-detay');
Route::get('/kategori/{slug}', 'KategoriController@index')->name('kategori');
Route::get('/sepet', 'SepetController@index')->name('sepet');
Route::get('/sepet-ekle/{pid}', 'SepetController@ekle')->name('ekle');
Route::get('/sepet-bosalt', 'SepetController@sepet_bosalt')->name('sepet-bosalt');
Route::get('/urun-sil/{rowID}', 'SepetController@urun_sil')->name('urun-sil');
Route::post('/sepet-guncelle/', 'SepetController@sepet_guncelle')->name('sepet-guncelle');
Route::get('/odeme', 'PaymentController@index')->name('odeme');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
