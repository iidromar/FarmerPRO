<?php

use App\Http\Controllers\farmer;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [farmer::class, 'dashboard'])->name('dashboard');

Route::get('/farmers_table', [farmer::class, 'farmers_table'])->name('farmers_table');

