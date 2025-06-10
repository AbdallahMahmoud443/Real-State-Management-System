<?php

use App\Http\Controllers\Admin\auth\AuthenticationAdminController;
use App\Http\Controllers\admin\auth\ResetPasswordAdminController;
use App\Http\Controllers\admin\dashboard\DashboardAdminController;
use App\Http\Controllers\Admin\profile\AdminProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\FrontController;
use App\Http\Controllers\User\auth\AuthenticationUserController;
use App\Http\Controllers\User\auth\RegistrationUserController;
use App\Http\Controllers\User\auth\ResetPasswordUserController;
use App\Http\Controllers\User\dashboard\DashboardUserController;
use App\Http\Controllers\User\profile\UserProfileController;

// title: Frontend Routes
Route::get('/', [FrontController::class, 'index'])->name('home');
Route::get('/contact', [FrontController::class, 'contact'])->name('contact');

// title: Admin Routes
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    // hint: Routes for Admin Authentication
    Route::get('/', [AuthenticationAdminController::class, 'login'])
        ->name('login.index')->middleware('SystemUserLoginAuth');
    Route::get('/login', [AuthenticationAdminController::class, 'login'])
        ->name('login.show')->middleware('SystemUserLoginAuth');
    Route::post('/login', [AuthenticationAdminController::class, 'postLogin'])
        ->name('login.handle')->middleware('SystemUserLoginAuth');
    Route::get('/logout', [AuthenticationAdminController::class, 'logout'])
        ->name('logout.handle')
        ->middleware('SystemUserLogoutAuth:admin,admin');
    // hint: Routes for Admin Reset Password
    Route::get('/forget-password', [ResetPasswordAdminController::class, 'forgetPassword'])
        ->name('forget-password.show')->middleware('SystemUserLoginAuth');
    Route::post('/forget-password', [ResetPasswordAdminController::class, 'postForgetPassword'])
        ->name('forget-password.handle')->middleware('SystemUserLoginAuth');
    Route::get('/reset-password/{email}/{token}', [ResetPasswordAdminController::class, 'resetPassword'])
        ->name('reset-password.show')->middleware('SystemUserLoginAuth');
    Route::post('/reset-password/{email}/{token}', [ResetPasswordAdminController::class, 'postResetPassword'])
        ->name('reset-password.handle')->middleware('SystemUserLoginAuth');
    // hint: Admin Dashboard Route
    Route::get('/dashboard/index', [DashboardAdminController::class, 'index'])
        ->name('dashboard.show')
        ->middleware('SystemUserLogoutAuth:admin,admin');

    // hint: Route for User Profile
    Route::get('/profile', [AdminProfileController::class, 'profile'])->name('profile.show')->middleware('SystemUserLogoutAuth:admin,admin');
    Route::post('/profile', [AdminProfileController::class, 'postProfile'])->name('profile.handle')->middleware('SystemUserLogoutAuth:admin,admin');
});

// title: Users Routes
Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
    // hint: Routes For User Registration
    Route::get('/register', [RegistrationUserController::class, 'register'])
        ->name('register.show')->middleware('SystemUserLoginAuth');
    Route::post('/register', [RegistrationUserController::class, 'postRegister'])
        ->name('register.handle')->middleware('SystemUserLoginAuth');
    Route::get('/register-verify/{token}', [RegistrationUserController::class, 'postRegisterVerify'])
        ->name('register-verify.handle')->middleware('SystemUserLoginAuth');
    // hint: Routes for User Authentication
    Route::get('/', [AuthenticationUserController::class, 'login'])
        ->name('login.index')->middleware('SystemUserLoginAuth');
    Route::get('/login', [AuthenticationUserController::class, 'login'])
        ->name('login.show')->middleware('SystemUserLoginAuth');
    Route::post('/login', [AuthenticationUserController::class, 'postLogin'])
        ->name('login.handle')->middleware('SystemUserLoginAuth');
    Route::get('/logout', [AuthenticationUserController::class, 'logout'])
        ->name('logout.handle')
        ->middleware('SystemUserLogoutAuth:web,user');
    // hint: Routes for User Reset Password
    Route::get('/forget-password', [ResetPasswordUserController::class, 'forgetPassword'])
        ->name('forget-password.show')->middleware(['SystemUserLoginAuth']);
    Route::post('/forget-password', [ResetPasswordUserController::class, 'postForgetPassword'])
        ->name('forget-password.handle')->middleware(['SystemUserLoginAuth']);
    Route::get('/reset-password/{email}/{token}', [ResetPasswordUserController::class, 'resetPassword'])
        ->name('reset-password.show')->middleware(['SystemUserLoginAuth']);
    Route::post('/reset-password/{email}/{token}', [ResetPasswordUserController::class, 'postResetPassword'])
        ->name('reset-password.handle')->middleware(['SystemUserLoginAuth']);
    // hint: Routes for User Dashboard
    Route::get('/dashboard/index', [DashboardUserController::class, 'index'])
        ->name('dashboard.show')
        ->middleware('SystemUserLogoutAuth:web,user');
    // hint: Route for User Profile
    Route::get('/profile', [UserProfileController::class, 'profile'])->name('profile.show')->middleware('SystemUserLogoutAuth:web,user');
    Route::put('/profile', [UserProfileController::class, 'postProfile'])->name('profile.handle')->middleware('SystemUserLogoutAuth:web,user');
});
