<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('home');
})->name('home');

Route::get('/blog', [PostController::class, 'index'])->name('blog.index');

// Blog routes
Route::resource('posts', PostController::class);

// Categories CRUD
Route::resource('categories', CategoryController::class);

// Extra pages
Route::get('/about', [PageController::class, 'about'])->name('pages.about');
Route::get('/contact', [PageController::class, 'contact'])->name('pages.contact');

// Auth (explicit routes to avoid 404s)
Route::middleware('guest')->group(function () {
    Route::get('/login', [\App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [\App\Http\Controllers\Auth\LoginController::class, 'login']);

    Route::get('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'register']);
});

Route::post('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

// If you still have this, consider removing it to prevent duplicate-route confusion:
// Auth::routes();

Route::get('/dashboard', [\App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
