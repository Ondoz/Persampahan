<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{
    DaerahController,
    DashboardController,
    KategoriController
};

route::get('/', [DashboardController::class, 'index'])->name('dashboard');
route::get('/daerah', [DaerahController::class, 'index'])->name('daerah');
route::get('/kategori', [KategoriController::class, 'index'])->name('kategori');
