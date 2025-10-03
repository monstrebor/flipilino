<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\users\PostController;
use App\Http\Controllers\admin\{LogController, SettingsController};
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
    Route::post('/login-store', [LogController::class, 'login'])->name('login.store');
});

Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::view('/home-admin', 'admin.index')->name('admin.dashboard');

    Route::view('/settings', 'settings.index')->name('admin.settings');
    Route::view('/change-password', 'settings.change-password')->name('admin.password');

    Route::get('/add-user', function () {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    })->name('add-user');
    Route::post('/store-user', [RegisterController::class, 'registerUser'])->name('store-user');
    Route::post('/update-user', [RegisterController::class, 'updateUser'])->name('admin.update-user');
});

Route::middleware(['auth', 'role:user'])->prefix('user')->group(function () {

    Route::get('/home-user', [PostController::class, 'index'])->name('user.dashboard');
    Route::view('/settings', 'settings.index')->name('user.settings');
    Route::view('/change-password', 'settings.change-password')->name('user.password');

    //Post process
    Route::post('/store-post', [PostController::class, 'store'])->name('user.store-post');

});

Route::post('/logout', [LogController::class, 'logout'])->name('logout');
Route::post('/auto-logout', [LogController::class, 'autoLogout'])
    ->middleware('auth')
    ->name('auto.logout');
Route::post('/password/update', [SettingsController::class, 'passwordUpdate'])
    ->middleware(['auth'])
    ->name('password.update');