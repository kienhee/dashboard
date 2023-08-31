<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\DashboardController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::prefix('/dashboard')->name('dashboard.')->group(function () {
    Route::get('/', [DashboardController::class, "dashboard"])->name('index');
});

//Routes dành cho các mẫu
require __DIR__ . '/template.php';
