<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TabunganController;
use App\Http\Controllers\WelcomeController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
Route::get('redirect/{driver}', [LoginController::class, 'redirectToProvider'])->name('login.provider');
Route::get('{driver}/callback', [LoginController::class, 'handleProviderCallback'])->name('login.callback');
Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/tabungan', [TabunganController::class, 'index'])->name('tabungan');
route::post('/tabungan/store', [TabunganController::class, 'store'])->name('tabungan.store');
