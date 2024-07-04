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

// Landing Page
Route::get('/', [generalPage::class, 'landing']);

// App Intro Page
Route::get('/app-intro', [generalPage::class, 'appIntro']);

// Login Page
Route::get('/login', [loginController::class, 'index'])->middleware('guest')->name('login');
// Login Logic Handler
Route::post('/login', [loginController::class, 'authenticate']);
// Logout Logic Handler
Route::post('/logout', [loginController::class, 'logout']);

// Register Page
Route::get('/register', [registerController::class, 'index'])->middleware('guest');
// Register Logic Handler
Route::post('/register', [registerController::class, 'store']);

// Users / Student Specific Route
Route::middleware(['auth', 'App\Http\Middleware\userMiddleware'])->group(function () {
    // User Dashboard Page
    Route::get('/user-index', [userController::class, 'index']);
    // User Profile Page
    Route::get('/user-profile', [userController::class, 'profile']);
    // User Edit Profile Page
    Route::get('/user-profile/edit', [userController::class, 'editProfile']);
    // User Edit Profile Logic Handler
    Route::post('/user-profile/edit', [userController::class, 'update']);

    // Route::delete('/user/profile/picture', [userController::class, 'deleteProfilePicture'])->name('deleteProfilePicture');
    
    // User Delete Account Logic Handler
    Route::delete('/user-delete-account', [userController::class, 'destroy'])->name('user.account.destroy');

    // Add Driving School Page
    Route::get('/add-driving-school', [userController::class, 'addDrivingSchool']);
});

// Instructor Specific Route
Route::middleware(['auth', 'App\Http\Middleware\instructorMiddleware'])->group(function () {
    // Instructor Dashboard Page
    Route::get('/instructor-index', [instructorController::class, 'index']);
    // Instructor Profile Page
    Route::get('/instructor-profile', [instructorController::class, 'profile']);
    // Instructor Edit Profile Page
    Route::get('/instructor-profile/edit', [instructorController::class, 'editProfile']);
    // Instructor Edit Profile Logic Handler
    Route::post('/instructor-profile/edit', [instructorController::class, 'update']);
});

Route::middleware(['auth', 'App\Http\Middleware\adminMiddleware'])->group(function () {
    // Admin Dashboard Page
    Route::get('/admin-index', [adminController::class, 'index']);
    // Admin Profile Page
    Route::get('/admin-profile', [adminController::class, 'profile']);
    // Admin Edit Profile Page
    Route::get('/admin-profile/edit', [adminController::class, 'editProfile']);
    // Admin Edit Profile Logic Handler
    Route::post('/admin-profile/edit', [adminController::class, 'update']);
    // Admin Delete Account Logic Handler
    Route::delete('/admin-delete-account', [adminController::class, 'destroy'])->name('admin.account.destroy');
});

// Guest Dashboard Page
Route::get('/tamu', [homeController::class, 'tamu']);

// Clear Cache
Route::get('/bersihkan', function() {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    $exitCode = Artisan::call('route:cache');
    return 'DONE';
});