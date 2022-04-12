<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ShipmentManagementController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/home', [HomeController::class, 'home'])->name('home');


Route::get('/order', [OrderController::class, 'top'])->name('order.top');
Route::get('/order_data_import', [OrderController::class, 'data_import_index'])->name('order.data_import.index');
Route::post('/order_data_import', [OrderController::class, 'data_import_import'])->name('order.data_import.import');

Route::get('/shipment_mgt/{shipment_status_code}', [ShipmentManagementController::class, 'index'])->name('shipment_mgt.index');