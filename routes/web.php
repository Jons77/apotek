<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'ContohController@welcome');
Route::get('/obat', 'ContohController@index');
Route::get('/about', 'ContohController@about');
Route::get('/contact', 'ContohController@contactus');
Route::get('/produk', 'ContohController@index');


//vitamin
Route::get('/vitamin', 'ContohController@index');
Route::get('/vitamin', 'VitaminController@index')->name('vitamin.index');
Route::get('/vitamin/create', 'VitaminController@create')->name('vitamin.create');   
Route::post('/vitamin', 'VitaminController@store')->name('vitamin.store');   
Route::get('/vitamin/edit/{id}', 'VitaminController@edit')->name('vitamin.edit');
Route::post('/vitamin/update/{id}', 'VitaminController@update')->name('vitamin.update');
Route::post('/vitamin/delete/{id}', 'VitaminController@destroy')->name('vitamin.destroy');
Route::get('/vitamin/search', 'VitaminController@search')->name('vitamin.search');
Route::get('/exportVitamin', 'VitaminController@exportVitamin')->name('exxcel');
Route::get('/pdfVitamin', 'VitaminController@pdfVitamin')->name('cetakPdfVitamin');

//obat
Route::get('/obat', 'ObatController@index')->name('obat.index');
Route::get('/obat/create', 'ObatController@create')->name('obat.create');   
Route::post('/obat', 'ObatController@store')->name('obat.store');   
Route::get('/obat/edit/{id}', 'ObatController@edit')->name('obat.edit');
Route::post('/obat/update/{id}', 'ObatController@update')->name('obat.update');
Route::post('/obat/delete/{id}', 'ObatController@destroy')->name('obat.destroy');
Route::get('/obat/search', 'ObatController@search')->name('obat.search');
Route::get('/exportObat', 'ObatController@exportObat')->name('excel');
Route::get('/pdfObat', 'ObatController@pdfObat')->name('cetakPdfObat');

//login
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/new-login', function(){
    return view('newLogin');
});

Route::get('/new-register', function(){
    return view('newRegister');
});

Route::get('/new-forget', function(){
    return view('newForget');
});

//produk
Route::get('/produk', 'ProdukController@index')->name('produk.index');
Route::get('/produk/create', 'ProdukController@create')->name('produk.create');   
Route::post('/produk', 'ProdukController@store')->name('produk.store');   
Route::get('/produk/edit/{id}', 'ProdukController@edit')->name('produk.edit');
Route::post('/produk/update/{id}', 'ProdukController@update')->name('produk.update');
Route::post('/produk/delete/{id}', 'ProdukController@destroy')->name('produk.destroy');
Route::get('/produk/search', 'ProdukController@search')->name('produk.search');

//kategori
Route::get('/kategori', 'KategoriController@index')->name('kategori.index');
Route::get('/kategori/create', 'KategoriController@create')->name('kategori.create');   
Route::post('/kategori', 'KategoriController@store')->name('kategori.store');   
Route::get('/kategori/edit/{id}', 'KategoriController@edit')->name('kategori.edit');
Route::post('/kategori/update/{id}', 'KategoriController@update')->name('kategori.update');
Route::post('/kategori/delete/{id}', 'KategoriController@destroy')->name('kategori.destroy');
Route::get('/kategori/search', 'KategoriController@search')->name('kategori.search');

//POS
Route::get('pos', 'POSController@index');

Route::get('produk/ajax/{id}', 'POSController@get_produk');