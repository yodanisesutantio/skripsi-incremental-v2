<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\generalPage;
use App\Http\Controllers\loginController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\userController;
use App\Http\Controllers\instructorController;
use App\Http\Controllers\adminController;

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

Route::get('/', [generalPage::class, 'landing']);

Route::get('/app-intro', [generalPage::class, 'appIntro']);

Route::get('/login', [loginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [loginController::class, 'authenticate']);
Route::post('/logout', [loginController::class, 'logout']);

Route::get('/register', [registerController::class, 'index'])->middleware('guest');
Route::post('/register', [registerController::class, 'store']);

Route::middleware(['auth', 'App\Http\Middleware\userMiddleware'])->group(function () {
    Route::get('/user-index', [userController::class, 'index']);
    Route::get('/user-profile', [userController::class, 'profile']);
    Route::get('/user-profile/edit', [userController::class, 'editProfile']);
    Route::post('/user-profile/edit', [userController::class, 'update']);
    // Route::delete('/user/profile/picture', [userController::class, 'deleteProfilePicture'])->name('deleteProfilePicture');
    Route::delete('/delete-account', [userController::class, 'destroy'])->name('account.destroy');
});

Route::middleware(['auth', 'App\Http\Middleware\instructorMiddleware'])->group(function () {
    Route::get('/instructor-index', [instructorController::class, 'index']);
});

Route::middleware(['auth', 'App\Http\Middleware\adminMiddleware'])->group(function () {
    Route::get('/admin-index', [adminController::class, 'index']);
});

Route::get('/tamu', [homeController::class, 'tamu']);

Route::get('/bersihkan', function() {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    $exitCode = Artisan::call('route:cache');
    return 'DONE';
});