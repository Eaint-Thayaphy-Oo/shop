<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
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

Route::middleware(['auth'])->group(function () {
    //dashboard
    Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::get('dashboardOne', [AuthController::class, 'dashboardOne'])->name('dashboardOne');
    Route::get('dashboardTwo', [AuthController::class, 'dashboardTwo'])->name('dashboardTwo');

    Route::group(['middleware' => 'admin_auth'], function () {
        //admin
        //category
        Route::prefix('category')->group(function () {
            Route::get('list', [CategoryController::class, 'list'])->name('category#list');
            Route::get('create/page', [CategoryController::class, 'createPage'])->name('category#createPage');
            Route::post('create', [CategoryController::class, 'create'])->name('category#create');
            Route::get('delete/{id}', [CategoryController::class, 'delete'])->name('category#delete');
            Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('category#edit');
            Route::post('update', [CategoryController::class, 'update'])->name('category#update');
        });

        //password
        Route::get('password/changePage', [AdminController::class, 'changePasswordPage'])->name('admin#changePasswordPage');
        Route::post('change/password', [AdminController::class, 'changePassword'])->name('admin#changePassword');

        //account
        Route::get('details', [AdminController::class, 'details'])->name('admin#details');

        //profile
        Route::get('edit', [AdminController::class, 'edit'])->name('admin#edit');
        Route::post('update/{id}', [AdminController::class, 'update'])->name('admin#update');

        //products
        Route::prefix('products')->group(function () {
            Route::get('list', [ProductController::class, 'list'])->name('product#list');
            Route::get('createPage', [ProductController::class, 'createPage'])->name('product#createPage');
            Route::post('create', [ProductController::class, 'create'])->name('product#create');
            Route::get('edit/{id}', [ProductController::class, 'edit'])->name('product#edit');
            Route::get('delete/{id}', [ProductController::class, 'delete'])->name('product#delete');
            Route::get('update/{id}', [ProductController::class, 'update'])->name('product#update');
            Route::post('updatePage', [ProductController::class, 'updatePage'])->name('product#updatePage');
        });
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
Route::middleware(['admin_auth'])->group(function () {
    Route::redirect('/', 'loginPage');
    Route::get('loginPage', [AuthController::class, 'loginPage'])->name('auth#loginPage');
    Route::get('registerPage', [AuthController::class, 'registerPage'])->name('auth#registerPage');
});
