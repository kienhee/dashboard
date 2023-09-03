<?php

use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\Category\categoryController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\User\UserController;

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
Route::prefix('/dashboard')->name('dashboard.')->middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, "dashboard"])->name('index');

    Route::prefix('categories')->name('category.')->group(function () {
        Route::get('/', [categoryController::class, 'index'])->name('index');
        // Route::get('/add-a-memmber', [categoryController::class, 'add'])->name('add');
        // Route::post('/add-a-memmber', [categoryController::class, 'store'])->name('store');
        // Route::get('/edit-a-memmber/{user}', [categoryController::class, 'edit'])->name('edit');
        // Route::put('/edit-a-memmber/{id}', [categoryController::class, 'update'])->name('update');
        // Route::delete('/soft-delete-a-memmber/{id}', [categoryController::class, 'softDelete'])->name('soft-delete');
        // Route::delete('/force-delete-a-memmber/{id}', [categoryController::class, 'forceDelete'])->name('force-delete');
        // Route::delete('/restore-a-memmber/{id}', [categoryController::class, 'restore'])->name('restore');
        // Route::get('/account-setting', [categoryController::class, 'AccountSetting'])->name('account-setting');
    });
        // Quản lí người dùng
    Route::prefix('users')->name('user.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/add-a-memmber', [UserController::class, 'add'])->name('add');
        Route::post('/add-a-memmber', [UserController::class, 'store'])->name('store');
        Route::get('/edit-a-memmber/{user}', [UserController::class, 'edit'])->name('edit');
        Route::put('/edit-a-memmber/{id}', [UserController::class, 'update'])->name('update');
        Route::delete('/soft-delete-a-memmber/{id}', [UserController::class, 'softDelete'])->name('soft-delete');
        Route::delete('/force-delete-a-memmber/{id}', [UserController::class, 'forceDelete'])->name('force-delete');
        Route::delete('/restore-a-memmber/{id}', [UserController::class, 'restore'])->name('restore');
        Route::get('/account-setting', [UserController::class, 'AccountSetting'])->name('account-setting');
    });
});
Route::prefix('/auth-dashboard')->name('auth.')->group(function () {
    Route::get('/login', [AuthController::class, 'loginView'])->name('loginView');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
});
//Routes dành cho các mẫu
require __DIR__ . '/template.php';