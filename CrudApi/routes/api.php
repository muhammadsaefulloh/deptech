<?php

use App\Http\Controllers\ShoppingController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
use App\Models\Shopping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('login', 'AuthController@login');
Route::group(['prefix' => 'auth', 'middleware' => 'auth:sanctum'], function() {
    // manggil controller sesuai bawaan laravel 8
    Route::post('logout', [AuthController::class, 'logout']);
    // manggil controller dengan mengubah namespace di RouteServiceProvider.php biar bisa kayak versi2 sebelumnya
    Route::post('logoutall', 'AuthController@logoutall');
});
//ROUTE ADMIN
 Route::post('/add-admin',[AdminController::class,'create']);
 Route::get('/get-admin',[AdminController::class,'get']);
 Route::patch('/update-admin/{id}', [AdminController::class,'update']);
 Route::delete('/delete-admin/{id}', [AdminController::class, 'delete']);
 Route::post('login', [AdminController::class, 'login']);
 //ROUTE KATEGORI
 Route::post('/add-kategori',[KategoriController::class,'create']);
 Route::get('/get-kategori',[KategoriController::class,'get']);
 Route::patch('/update-kategori/{id}', [KategoriController::class,'update']);
 Route::delete('/delete-kategori/{id}', [KategoriController::class, 'delete']);
 //ROUTE PRODUK
 Route::post('/add-produk',[ProdukController::class,'create']);
 Route::get('/get-produk',[ProdukController::class,'get']);
 Route::patch('/update-produk/{id}', [ProdukController::class,'update']);
 Route::delete('/delete-produk/{id}', [ProdukController::class, 'delete']);