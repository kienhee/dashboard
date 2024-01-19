<?php

use App\Http\Controllers\Admin\Auth\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Group\GroupController;
use App\Http\Controllers\Admin\UserController;


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

Route::get("/", function () {
    return view('welcome');
});
Route::prefix('/dashboard')->name('dashboard.')->middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, "dashboard"])->name('index');
    Route::prefix('groups')->name('group.')->group(function () {
        Route::get('/', [GroupController::class, 'index'])->name('index');
        Route::get('/add', [GroupController::class, 'add'])->name('add');
        Route::post('/add', [GroupController::class, 'store'])->name('store');
        Route::get('/edit/{group}', [GroupController::class, 'edit'])->name('edit');
        Route::put('/edit/{id}', [GroupController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [GroupController::class, 'delete'])->name('delete');
        Route::get('/permissions/{group}', [GroupController::class, 'permissions']);
        Route::put('/permissions/{id}', [GroupController::class, 'postPermissions']);
    });
    Route::prefix('users')->name('user.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/add', [UserController::class, 'add'])->name('add');
        Route::post('/add', [UserController::class, 'store'])->name('store');
        Route::get('/edit/{user}', [UserController::class, 'edit'])->name('edit');
        Route::put('/edit/{id}', [UserController::class, 'update'])->name('update');
        Route::delete('/soft-delete/{id}', [UserController::class, 'softDelete']);
        Route::delete('/force-delete/{id}', [UserController::class, 'forceDelete']);
        Route::delete('/restore/{id}', [UserController::class, 'restore'])->name('restore');
    });
    Route::prefix('users')->name('user.')->group(function () {
        Route::get('/account-setting', [UserController::class, 'AccountSetting'])->name('account-setting');
        Route::put('/account-setting/{id}', [UserController::class, 'accountSettingPost'])->name('account-setting-post');
        Route::get('/change-password', [UserController::class, 'changePw'])->name('change-password');
        Route::put('/change-password/{email}', [UserController::class, 'handleChangePassword'])->name('handle-change-password');
    });

    Route::get('/media', function () {
        return view('admin.media.index');
    })->name('media');
});

Route::prefix('/auth')->name('auth.')->group(function () {
    Route::get('/login', [AuthController::class, 'loginView'])->name('loginView');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/forgot-password', [AuthController::class, 'ForgotPassword'])->name('ForgotPassword');
    Route::post('/forgot-password', [AuthController::class, 'SendMailForgotPassword'])->name('SendMailForgotPassword');
    Route::get('/reset-password', [AuthController::class, 'resetPassword'])->name('resetPassword');
    Route::post('/reset-password', [AuthController::class, 'PostResetPassword'])->name('PostResetPassword');
    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
});

//Routes dành cho các mẫu
require __DIR__ . '/template.php';
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
