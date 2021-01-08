<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{
    DaerahController,
    DashboardController,
    DataTransaksiController,
    KategoriController,
    NasabahController,
    SampahController
};
use App\Models\Kategori;

Route::group(['prefix' => 'ajax'], function () {
    Route::post('kategories/edit', [KategoriController::class, 'editajax'])->name('ajax_kategories');
    Route::post('derah/edit', [DaerahController::class, 'editajax'])->name('ajax_daerahes');
    Route::post('sampah/edit', [SampahController::class, 'editajax'])->name('ajax_sampah');
    Route::post('nasabah/edit', [NasabahController::class, 'editajax'])->name('ajax_nasabah');
    route::post('datatransaksi/delete', [DataTransaksiController::class, 'destroy'])->name('ajax_datatransaksi_destroy');
});

route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::group(['prefix' => 'nasabah'], function () {
    route::get('/', [NasabahController::class, 'index'])->name('nasabah');
    route::post('/store', [NasabahController::class, 'store'])->name('nasabah.store');
    route::post('/update', [NasabahController::class, 'update'])->name('nasabah.update');
    route::post('/delete', [NasabahController::class, 'destroy'])->name('nasabah.delete');
    Route::group(['prefix' => '/{nasabah}/datatransaksi'], function () {
        route::get('/', [DataTransaksiController::class, 'index'])->name('nasabah.datatransaksi');
        route::post('/store', [DataTransaksiController::class, 'store'])->name('nasabah.datatransaksi.store');
    });
});

Route::group(['prefix' => 'sampah'], function () {
    route::get('/', [SampahController::class, 'index'])->name('sampah');
    route::post('/store', [SampahController::class, 'store'])->name('sampah.store');
    route::post('/update', [SampahController::class, 'update'])->name('sampah.update');
    route::post('/delete', [SampahController::class, 'destroy'])->name('sampah.delete');
});

Route::group(['prefix' => 'daerah'], function () {
    route::get('/', [DaerahController::class, 'index'])->name('daerah');
    route::post('/store', [DaerahController::class, 'store'])->name('daerah.store');
    route::post('/update', [DaerahController::class, 'update'])->name('daerah.update');
    route::post('/delete', [DaerahController::class, 'destroy'])->name('daerah.delete');
});
// Route::resource('/kategori', KategoriController::class);
Route::group(['prefix' => 'kategori'], function () {
    route::get('/', [KategoriController::class, 'index'])->name('kategori');
    route::post('/store', [KategoriController::class, 'store'])->name('kategori.store');
    route::post('/update', [KategoriController::class, 'update'])->name('kategori.update');
    route::post('/delete', [KategoriController::class, 'destroy'])->name('kategori.delete');
});
