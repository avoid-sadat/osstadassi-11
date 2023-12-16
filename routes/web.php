<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SellController;
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
// routes/web.php

use App\Http\Controllers\ProductController;

Route::get('/product/form', [ProductController::class, 'showForm'])->name('product.form');
Route::post('/product/add', [ProductController::class, 'addProduct'])->name('product.add');

Route::get('/buy/product/{id}',[SellController::class,'index'])->name('sell.product');
Route::get('/update/product/{id}',[ProductController::class,'show'])->name('get.product');
Route::post('/update/product/{id}',[ProductController::class,'update'])->name('product.update');
Route::post('/sell/product/',[ProductController::class,'store'])->name('sell.store');

Route::get('transaction/sells',[SellController::class,'transaction'])->name('sell.transactions');


Route::get('/', [ProductController::class,'index'])->name('home');

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->name('dashboard');
//
//Route::middleware('auth')->group(function () {
//    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//});

require __DIR__.'/auth.php';
