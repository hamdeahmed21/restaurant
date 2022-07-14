<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes(['register'=>false]);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::group(['prefix' => 'category', 'middleware' => ['web','auth']], function (){
Route::get('/', [CategoryController::class, 'index'])->name('category.index');
Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
Route::get('/edit{id}', [CategoryController::class, 'edit'])->name('category.edit');
Route::post('/update{id}', [CategoryController::class, 'update'])->name('category.update');
Route::get('/delete{id}', [CategoryController::class, 'destroy'])->name('category.delete');
}
);
Route::group(['prefix' => 'food', 'middleware' => ['web','auth']], function (){
    Route::get('/', [FoodController::class, 'index'])->name('food.index');
    Route::get('/create', [FoodController::class, 'create'])->name('food.create');
    Route::post('/store', [FoodController::class, 'store'])->name('food.store');
    Route::get('/edit{id}', [FoodController::class, 'edit'])->name('food.edit');
    Route::post('/update{id}', [FoodController::class, 'update'])->name('food.update');
    Route::get('/delete{id}', [FoodController::class, 'destroy'])->name('food.delete');

}
);
Route::get('/', [FoodController::class, 'listFood']);
Route::get('/foods/{id}',[FoodController::class,'view'])->name('food.view');

