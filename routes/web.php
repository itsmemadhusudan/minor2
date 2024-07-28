<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\DesignerController;
use App\Http\Controllers\ProductDetailController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\EsewaController;

// Home Route
// Route::get('/', function () {
//     return view('index');
// })->name('index');

Route::get('/', [UploadController::class, 'index'])->name('index');

Route::get('/upload', [UploadController::class, 'addImage'])->name('add_image');
Route::post('/upload', [UploadController::class, 'store'])->name('save_image');
Route::get('/product/{product_id}', [UploadController::class, 'viewProduct'])->name('view_product');

// Route for UploadController
// Route::resource('uploads', UploadController::class)->only(['index', 'create', 'store']);

Route::get('/upload-data', [UploadController::class, 'index'])->name('upload-data');

// Route for the About Us page
Route::get('/aboutus', [DesignerController::class, 'aboutUs'])->name('aboutus');

// Registration Routes
Route::get('/registration', [AuthManager::class, 'showRegistrationForm'])->name('registration.form');
Route::post('/registration', [AuthManager::class, 'register'])->name('register');

// Login Routes
Route::get('/login', [AuthManager::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthManager::class, 'login'])->name('login.submit');

// Logout Route
Route::get('/logout', [AuthManager::class, 'logout'])->name('logout');

// Search Route
Route::get('/search', [SearchController::class, 'search'])->name('search');

// Public Routes
Route::get('/designer', [DesignerController::class, 'index'])->name('designer');
Route::get('/cultural', function () {
    return view('cultural');
})->name('cultural');
Route::get('/women', function () {
    return view('women');
})->name('women');
Route::get('/men', function () {
    return view('men');
})->name('men');
Route::get('/western', function () {
    return view('western');
})->name('western');

// Protected Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [DesignerController::class, 'profile'])->name('profile');
    Route::post('/profile', [DesignerController::class, 'updateProfile'])->name('profile.update');
    Route::get('/cart', [CartController::class, 'index'])->name('cart'); // Ensuring Cart is accessible for authenticated users
});

// Routes for Product Details
Route::get('/productdetail/{id}', [ProductDetailController::class, 'show'])->name('productdetail');

// Routes for EsewaController
Route::get('/esewa/create', [EsewaController::class, 'create'])->name('esewa.create');
Route::post('/esewa/store', [EsewaController::class, 'store'])->name('esewa.store');
Route::get('/esewa/success', [EsewaController::class, 'success'])->name('payment.success');
Route::get('/esewa/failure', [EsewaController::class, 'failure'])->name('payment.failure');
