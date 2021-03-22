<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\ReportController;
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

Route::any('reportUpdate/{uid?}' , [ReportController::class, "edit"])->name('reportUpdate');
Route::any('reportDelete/{uid?}' , [ReportController::class, "delete"])->name('reportDelete');
Route::any('report/add' , [ReportController::class, "add"])->name('reportAdd');
Route::any('reportEdit/{uid?}' , [ReportController::class, "save"])->name('reportEdit');
Route::get('report' , [ReportController::class , "index"])->name('report');

Route::any('stockUpdate/{uid?}' , [StockController::class, "edit"])->name('stockUpdate');
Route::any('stockDelete/{uid?}' , [StockController::class, "delete"])->name('stockDelete');
Route::any('stock/add' , [StockController::class, "add"])->name('stockAdd');
Route::any('stockEdit/{uid?}' , [StockController::class, "save"])->name('stockEdit');
Route::get('stock' , [StockController::class , "index"])->name('stock');


Route::any('productEdit/{uid?}' , [ProductController::class, "save"])->name('productEdit');
Route::any('productUpdate/{uid?}' , [ProductController::class, "edit"])->name('productUpdate');
Route::any('productDelete/{uid?}' , [ProductController::class, "delete"])->name('productDelete');
Route::any('product/add' , [ProductController::class, "add"])->name('productAdd');
Route::get('/' , [ProductController::class , "index"])->name('product');



