<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\HomeController;

### guest
Route::get('/', [
    App\Http\Controllers\Guest\HomeController::class, 'index'
])->name('guestIndex');

### auth
Auth::routes();

### guest
Route::get('test1', function () {

    return view ('client.test');

})->name ('test-route');

Route::get('/login/{provider}', [
    App\Http\Controllers\Auth\LoginController::class, 'redirectToProvider'
])->name('oauthLogin');

Route::get('/login/{provider}/callback', [
    App\Http\Controllers\Auth\LoginController::class, 'handleProviderCallback'
])->name('oauthLoginCallback');

Route::prefix('dashboard')->group(function() {

    Route::get( 'index', [
        App\Http\Controllers\Dashboard\HomeController::class, 'index'
    ])->name('dashboardIndex')->middleware('enduser');

    Route::prefix('profile')->group(function () {

        Route::get( 'edit', [
            App\Http\Controllers\Dashboard\ProfileController::class, 'editProfile'
        ])->name('dashboardProfileEdit')->middleware('enduser');

        Route::post('update', [
            App\Http\Controllers\Dashboard\ProfileController::class, 'updateProfile'
        ])->name('dashboardProfileUpdate')->middleware('enduser');

        Route::post('change-password', [
            App\Http\Controllers\Dashboard\ProfileController::class, 'changePassword'

        ])
        ->name('dashboardProfileChangePassword')->middleware('enduser');

        Route::post('account/profile-image/upload', [

            App\Http\Controllers\Dashboard\ProfileController::class, 'updateProfileImage'

        ])->name('dashboardProfileImageUpdate')->middleware('enduser');

    });

    Route::prefix('user')->group(function () {

        Route::get( 'list', [
            App\Http\Controllers\Dashboard\UserController::class, 'listUsers'
        ])->name('dashboardUserList')->middleware('admin');

        Route::get( 'edit/{id}', [
            App\Http\Controllers\Dashboard\UserController::class, 'editUser'
        ])->name('dashboardUserEdit')->middleware('admin');

        Route::post('update', [
            App\Http\Controllers\Dashboard\UserController::class, 'updateUser'
        ])->name('dashboardUserUpdate')->middleware('admin');

        Route::post('delete', [
            App\Http\Controllers\Dashboard\UserController::class, 'deleteUser'
        ])->name('dashboardUserDelete')->middleware('admin');

        Route::post('update/profile-image', [
            App\Http\Controllers\Dashboard\UserController::class, 'updateUserProfileImage'
        ])->name('dashboardUserUpdateProfileImage')->middleware('admin');

        Route::post('update/password', [
            App\Http\Controllers\Dashboard\UserController::class, 'changeUserPassword'
        ])->name('dashboardUserUpdatePassword')->middleware('admin');

    });

});


Route::redirect('dashboard', '/dashboard/index')->middleware('enduser');


Route::redirect('dashboard', '/dashboard/index')->middleware('enduser');


//facebook callback
Route::get('auth/facebook', [SocialController::class, 'facebookRedirect']);
Route::get('auth/facebook/callback', [SocialController::class, 'loginWithFacebook']);

//google login applications
Route::get('auth/google', [SocialController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [SocialController::class, 'handleGoogleCallback']);



// auth routes

Route::get('superuser',  [App\Http\Controllers\Dashboard\HomeController::class, 'superUser'])->name('super-user');

Route::get('adminb',  [App\Http\Controllers\Dashboard\HomeController::class, 'adminHome'])-> name('admin-home');

Route::get('tutorhome',  [App\Http\Controllers\Dashboard\HomeController::class, 'tutorHome'])->name ('tutor-home');

Route::get('client-home',  [App\Http\Controllers\Dashboard\HomeController::class, 'clientHome'])->name ('client-home');

//Route::get('tasks',  [App\Http\Controllers\Tasks\TasksController::class, 'index']);

Route::get('tasks', [App\Http\Controllers\Tasks\TaskController::class, 'index']);

//Route::get('test', [SocialController::class, 'testing']);

Route::get('test', [App\Http\Controllers\Dashboard\HomeController::class, 'testing']);

Route::any('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');