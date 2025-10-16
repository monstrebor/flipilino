<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\users\{PostController, FriendshipController, ReactionController, CommentController};
use App\Http\Controllers\admin\{LogController, SettingsController};
use App\Http\Controllers\users\ProfileController;
use Illuminate\Support\Facades\{Auth, Route, Artisan};
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
    Route::post('/posts/{id}/share', [PostController::class, 'share'])->name('user.share-post');

    //Friend process
    Route::get('/view-friends', [FriendshipController::class, 'index'])->name('user.view-friend');
    Route::post('/add-friend', [FriendshipController::class, 'addFriend'])->name('user.add-friend');
    Route::post('/confirm-friend', action: [FriendshipController::class, 'confirmFriend'])->name('user.confirm-friend');

    //Reaction process
    Route::post('/user-react', [ReactionController::class, 'store'])->name('user.react-store');

    //Comment Process
    Route::post('/user-comment', [CommentController::class, 'store'])->name('user.comment-store');
    Route::patch('/user-comment/{comment}', [CommentController::class, 'update'])->name('user.comment-update');
    Route::delete('/user-comment/{comment}', [CommentController::class, 'destroy'])->name('user.comment-destroy');

    //Profile Process
    Route::get('/profile', [ProfileController::class, 'index'])->name('user.profile-index');
    Route::put('/profile/cover-update', [ProfileController::class, 'updateCover'])->name('user.cover-update');
    Route::post('/profile/profile-update', [ProfileController::class, 'updateProfile'])->name('user.profile-update');
    Route::put('/profile/intro', [ProfileController::class, 'updateIntro'])->name('user.profile-intro-update');
    Route::get('/user/profile/{id?}', [ProfileController::class, 'show'])->name('user.profile-view');
});

Route::post('/logout', [LogController::class, 'logout'])->name('logout');
Route::post('/auto-logout', [LogController::class, 'autoLogout'])
    ->middleware('auth')
    ->name('auto.logout');
Route::post('/password/update', [SettingsController::class, 'passwordUpdate'])
    ->middleware(['auth'])
    ->name('password.update');

Route::get('/clear', function () {
    Artisan::call('optimize:clear');
    return "<h3 style='color:green;'>✅ All caches cleared successfully!</h3>";

});