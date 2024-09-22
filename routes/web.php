<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactUsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DianaGisController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SebaranController;

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

Route::middleware('guest')->group(function() {
    Route::get('/diana-gis', [DianaGisController::class, 'dianaGis']);
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/contact-us', [ContactUsController::class, 'index']);
    Route::post('/contact-us/store', [ContactUsController::class, 'store']);
    Route::get('/peta-sebaran/{tahun}', [SebaranController::class, 'index']);
    Route::get('/login', [AuthController::class, 'logIndex'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'regIndex']);
    Route::post('/register', [AuthController::class, 'register']);
});


Route::middleware('auth')->group(function() {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/admin/data-penyebaran', [AdminController::class, 'penyebaran']);
    Route::get('/admin/data-kasus', [AdminController::class, 'kasus']);
    Route::get('/admin/keluhan', [AdminController::class, 'keluhan']);
    Route::get('/logout', [AuthController::class, 'logout']);
});
