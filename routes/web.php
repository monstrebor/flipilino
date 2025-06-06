<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserLoginController;
use Illuminate\Support\Facades\{Auth, Route};
use App\Models\User;

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

Route::middleware('guest')->group(function () {
    Route::view('/', 'home.index')->name('login');
    Route::view('/home', 'home.index')->name('home.login');
    Route::post('/register-store', [RegisterController::class, 'registerUser'])->name('register.store');
    Route::post('/login-store', [UserLoginController::class, 'user_login'])->name('login.store');
});

Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::view('/home', 'admin.index')->name('admin.home');

    Route::view('/settings', 'settings.index')->name('admin.settings');
    Route::view('/change-password', 'settings.change-password')->name('admin.password');

    Route::view('/home', 'admin.index')->name('admin.home');

    Route::get('/add-user', function () {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    })->name('add-user');
    Route::post('/store-user', [RegisterController::class, 'registerUser'])->name('store-user');
    Route::post('/update-user', [RegisterController::class, 'updateUser'])->name('admin.update-user');
});

Route::middleware(['auth', 'role:user'])->prefix('user')->group(function () {
    Route::view('/home', 'users.regular-user.index')->name('user.home');

    Route::view('/settings', 'settings.index')->name('user.settings');
    Route::view('/change-password', 'settings.change-password')->name('user.password');
});


Route::post('/logout', [UserLoginController::class, 'logout'])->name('admin.logout');

