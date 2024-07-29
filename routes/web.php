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
Route::get('/', [UploadController::class, 'index'])->name('index');

// Upload Routes
Route::get('/upload', [UploadController::class, 'addImage'])->name('add_image');
Route::post('/upload', [UploadController::class, 'store'])->name('save_image');
Route::get('/product/{product_id}', [UploadController::class, 'viewProduct'])->name('view_product');
Route::get('/upload-data', [UploadController::class, 'index'])->name('upload-data');

//designer routes
Route::get('/designer', [DesignerController::class, 'index'])->name('designer');
// About Us Route
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

// Product Detail Route
Route::post('/submit_form', [ProductDetailController::class, 'submitForm'])->name('submit_form');

// Public Routes
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
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::get('/designer', [DesignerController::class, 'showDesignerPage'])->name('designer');
});

// Product Detail Route
Route::get('/productdetail/{id}', [ProductDetailController::class, 'show'])->name('productdetail');

// Esewa Payment Routes
Route::get('/esewa/create', [EsewaController::class, 'create'])->name('esewa.create');
Route::post('/esewa/store', [EsewaController::class, 'store'])->name('esewa.store');
Route::get('/esewa/success', [EsewaController::class, 'success'])->name('payment.success');
Route::get('/esewa/failure', [EsewaController::class, 'failure'])->name('payment.failure');

// Cart routes
Route::middleware('auth')->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::patch('/cart/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
});
Route::get('/admin-profile', function () {
    return view('adminprofile'); // Ensure this matches your view filename
})->name('admin.profile');
