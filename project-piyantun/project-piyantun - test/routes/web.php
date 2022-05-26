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


Route::group(['middleware' => ['auth', 'cekrole:admin']], 

function () 
{
	Route::get('home', 'HomeController@index')->name('home');
	
	Route::get('profile-pengguna', 'ViewPenggunaController@index')->name('akun_pengguna');
	
	Route::resource('produk', 'ProdukController');
	Route::get('produk/{productID}/gambar', 'ProdukController@gambar')->name('gambar');
	Route::get('produk/{productID}/tambah-gambar', 'ProdukController@tambahGambar'); 
	Route::post('produk/gambar/{productID}', 'ProdukController@uploadGambar'); 
	Route::delete('produk/gambar/{imageID}', 'ProdukController@hapusGambar')->name('hapusgb'); 
	
	
	Route::get('profile-admin', 'UserProfileController@index')->name('adminProfile');
	Route::get('profile-admin/edit', 'UserProfileController@edit')->name('adminProfile.edit');
	Route::put('profile-admin/update', 'UserProfileController@update')->name('up.profile.admin');

	Route::resource('pengeluaran', 'PengeluaranController');
	Route::resource('pemesanan', 'MonitorPemesananController');
	// Route::get('pemesanan', 'AdminPemesananController@pemesanan');

});



Route::group(['middleware' => ['auth', 'cekrole:user']], 
function () 
{
	
	Route::get('produk/{id}/detail', 'DetailController@index');
	
	Route::post('produk/{id}/pesan', 'PesananController@pesan');

	Route::get('keranjang', 'PesananController@keranjang')->name('keranjang');
	Route::delete('keranjang/{id}', 'PesananController@delete');

	Route::get('riwayat-pemesanan', 'RiwayatPemesananController@riwayat')->name('riwayatPemesanan');
	Route::get('riwayat-pemesanan/{id}/edit', 'RiwayatPemesananController@edit')->name('riwayatPemesanan.edit');
	Route::put('riwayat-pemesanan/{id}/update', 'RiwayatPemesananController@update')->name('riwayatPemesanan.update');

	Route::get('home', 'HomeController@index')->name('home');
	Route::get('profile', 'UserProfileController@index');
	Route::get('profile/edit', 'UserProfileController@edit');
	Route::put('profile/update', 'UserProfileController@update')->name('up.profile');
	

});


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'WelcomeController@index');


