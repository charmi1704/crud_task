<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
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

Route::get('/', function () {
    return view('website.dashboard');
});

Route::get('/add_product', [ProductController::class, 'create']);
Route::post('/insert_product', [ProductController::class, 'store']);
Route::get('/delete_product/{id}', [ProductController::class, 'destroy']);
Route::get('/editproduct/{id}', [ProductController::class, 'edit']);
Route::post('/updateproduct/{id}', [ProductController::class, 'update']);
Route::get('/manage_product', [ProductController::class, 'index']);



Route::get('/login', [AdminController::class, 'login']);
Route::post('/login_auth', [AdminController::class, 'login_auth']);

Route::get('/logout', [AdminController::class, 'logout']);