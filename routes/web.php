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
use App\Http\Controllers\ApiController;

Route::get('/', [ApiController::class, 'index'])->name('index');

Route::get('/{slug}', [ApiController::class, 'getData'])->name('api.getdata');