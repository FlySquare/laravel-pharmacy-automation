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

Route::group(['middleware' => 'notLoggedIn'], function () {
    Route::get('/', [\App\Http\Controllers\Auth::class, 'loginGet'])->name('login-get');
    Route::post('/login-post', [\App\Http\Controllers\Auth::class, 'loginPost'])->name('login-post');
});

Route::group(['middleware' => 'loggedIn'], function () {
    Route::get('/dashboard', [\App\Http\Controllers\Dashboard::class, 'index'])->name('dashboard');
    Route::get('/tum-ilaclar', [\App\Http\Controllers\Drags::class, 'index'])->name('tum-ilaclar');
    Route::get('/ilac-ekle', [\App\Http\Controllers\Drags::class, 'addDrag'])->name('ilac-ekle');
    Route::post('/ilac-ekle-post', [\App\Http\Controllers\Drags::class, 'addDragPost'])->name('ilac-ekle-post');
    Route::get('/ilac-duzenle/{id}', [\App\Http\Controllers\Drags::class, 'editDrag'])->name('ilac-duzenle');
    Route::post('/ilac-duzenle/{id}', [\App\Http\Controllers\Drags::class, 'editDragPost'])->name('ilac-duzenle-post');
    Route::get('/ilac-sil/{id}', [\App\Http\Controllers\Drags::class, 'deleteDrag'])->name('ilac-sil');
    Route::get('/logout', function(){
        session()->flush();
        return redirect()->route('login-get');
    })->name('logout');
    Route::get('/tum-siparisler', [\App\Http\Controllers\Orders::class, 'index'])->name('tum-siparisler');
    Route::get('/siparis-ekle', [\App\Http\Controllers\Orders::class, 'addOrder'])->name('siparis-ekle');
    Route::post('/siparis-ekle-post', [\App\Http\Controllers\Orders::class, 'addOrderPost'])->name('siparis-ekle-post');
    Route::get('/siparis-duzenle/{id}', [\App\Http\Controllers\Orders::class, 'editOrder'])->name('siparis-duzenle');
    Route::post('/siparis-duzenle/{id}', [\App\Http\Controllers\Orders::class, 'editOrderPost'])->name('siparis-duzenle-post');
    Route::get('/siparis-sil/{id}', [\App\Http\Controllers\Orders::class, 'deleteOrder'])->name('siparis-sil');
});
