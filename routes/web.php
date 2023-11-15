<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\user\UserController;

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

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
    //dashboard
    Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::get('dashboardOne', [AuthController::class, 'dashboardOne'])->name('dashboardOne');
    Route::get('dashboardTwo', [AuthController::class, 'dashboardTwo'])->name('dashboardTwo');

    //admin
    //category
    Route::group(['prefix' => 'category', 'middleware' => 'admin_auth'], function () {
        Route::get('list', [CategoryController::class, 'list'])->name('category#list');
    });

    //user
    //home
    Route::group(['prefix' => 'user', 'middleware' => 'user_auth'], function () {
        // Route::get('home', function () {
        //     return view('user.home');
        // })->name('user#name');
        Route::get('/home', [UserController::class, 'home'])->name('user#home');
    });
});

//login,register
Route::redirect('/', 'loginPage');
Route::get('loginPage', [AuthController::class, 'loginPage'])->name('auth#loginPage');
Route::get('registerPage', [AuthController::class, 'registerPage'])->name('auth#registerPage');
