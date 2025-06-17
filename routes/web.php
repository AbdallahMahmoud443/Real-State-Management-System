<?php

use App\Http\Controllers\Admin\Amenities\AmenityController;
use App\Http\Controllers\Admin\auth\AuthenticationAdminController;
use App\Http\Controllers\admin\auth\ResetPasswordAdminController;
use App\Http\Controllers\admin\dashboard\DashboardAdminController;
use App\Http\Controllers\Admin\locations\LocationController;
use App\Http\Controllers\Admin\pricingPackages\PricingPackagesController;
use App\Http\Controllers\Admin\profile\AdminProfileController;
use App\Http\Controllers\Admin\Types\TypeController;
use App\Http\Controllers\Agent\auth\AgentAuthController;
use App\Http\Controllers\Agent\auth\AgentRegistrationController;
use App\Http\Controllers\Agent\auth\AgentResetPasswordController;
use App\Http\Controllers\agent\dashboard\DashboardAgentController;
use App\Http\Controllers\Agent\profile\AgentUpdateProfileController;
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
Route::get('/pricing', [FrontController::class, 'pricing'])->name('pricing');
Route::get('/location', [FrontController::class, 'location'])->name('location');

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
    // hint: Route for User Profile
    Route::get('/profile', [AdminProfileController::class, 'profile'])->name('profile.show')->middleware('SystemUserLogoutAuth:admin,admin');
    Route::post('/profile', [AdminProfileController::class, 'postProfile'])->name('profile.handle')->middleware('SystemUserLogoutAuth:admin,admin');
    // hint: Admin Dashboard Route
    Route::get('/dashboard/index', [DashboardAdminController::class, 'index'])
        ->name('dashboard.show')
        ->middleware('SystemUserLogoutAuth:admin,admin');
    // hint: Admin Dashboard Route ( Pricing Packages)
    Route::get('/dashboard/package/index', [PricingPackagesController::class, 'index'])
        ->name('package.show')
        ->middleware('SystemUserLogoutAuth:admin,admin');
    Route::get('/dashboard/package/create', [PricingPackagesController::class, 'create'])
        ->name('package.create.show')
        ->middleware('SystemUserLogoutAuth:admin,admin');
    Route::post('/dashboard/package/store', [PricingPackagesController::class, 'store'])
        ->name('package.create.handle')
        ->middleware('SystemUserLogoutAuth:admin,admin');
    Route::delete('/dashboard/package/delete/{id}', [PricingPackagesController::class, 'destroy'])
        ->name('package.delete.handle')
        ->middleware('SystemUserLogoutAuth:admin,admin');
    Route::get('/dashboard/package/edit/{id}', [PricingPackagesController::class, 'edit'])
        ->name('package.edit')
        ->middleware('SystemUserLogoutAuth:admin,admin');
    Route::put('/dashboard/package/update/{id}', [PricingPackagesController::class, 'update'])
        ->name('package.update')
        ->middleware('SystemUserLogoutAuth:admin,admin');
    // hint: Admin Dashboard Route ( Locations)
    Route::resource('location', LocationController::class)->middleware('SystemUserLogoutAuth:admin,admin');
    // hint: Admin Dashboard Route (Types)
    Route::resource('type', TypeController::class)->middleware('SystemUserLogoutAuth:admin,admin');
    // hint: Admin Dashboard Route (Amenities)
    Route::resource('amenity', AmenityController::class)->middleware('SystemUserLogoutAuth:admin,admin');
    
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
// title: Agent Routes
Route::group(['prefix' => 'agent', 'as' => 'agent.'], function () {
    // hint: Routes For User Registration
    Route::get('/register', [AgentRegistrationController::class, 'register'])
        ->name('register.show')->middleware('SystemUserLoginAuth');
    Route::post('/register', [AgentRegistrationController::class, 'postRegister'])
        ->name('register.handle')->middleware('SystemUserLoginAuth');
    Route::get('/register-verify/{token}', [AgentRegistrationController::class, 'postRegisterVerify'])
        ->name('register-verify.handle')->middleware('SystemUserLoginAuth');
    // hint: Routes for User Authentication
    Route::get('/', [AgentAuthController::class, 'login'])
        ->name('login.index')->middleware('SystemUserLoginAuth');
    Route::get('/login', [AgentAuthController::class, 'login'])
        ->name('login.show')->middleware('SystemUserLoginAuth');
    Route::post('/login', [AgentAuthController::class, 'postLogin'])
        ->name('login.handle')->middleware('SystemUserLoginAuth');
    Route::get('/logout', [AgentAuthController::class, 'logout'])
        ->name('logout.handle')
        ->middleware('SystemUserLogoutAuth:agent,agent');
    // hint: Routes for User Reset Password
    Route::get('/forget-password', [AgentResetPasswordController::class, 'forgetPassword'])
        ->name('forget-password.show')->middleware(['SystemUserLoginAuth']);
    Route::post('/forget-password', [AgentResetPasswordController::class, 'postForgetPassword'])
        ->name('forget-password.handle')->middleware(['SystemUserLoginAuth']);
    Route::get('/reset-password/{email}/{token}', [AgentResetPasswordController::class, 'resetPassword'])
        ->name('reset-password.show')->middleware(['SystemUserLoginAuth']);
    Route::post('/reset-password/{email}/{token}', [AgentResetPasswordController::class, 'postResetPassword'])
        ->name('reset-password.handle')->middleware(['SystemUserLoginAuth']);
    // hint: Routes for User Dashboard
    Route::get('/dashboard/index', [DashboardAgentController::class, 'index'])
        ->name('dashboard.show')
        ->middleware('SystemUserLogoutAuth:agent,agent');
    // hint: Route for User Profile
    Route::get('/profile', [AgentUpdateProfileController::class, 'profile'])->name('profile.show')->middleware('SystemUserLogoutAuth:agent,agent');
    Route::put('/profile', [AgentUpdateProfileController::class, 'postProfile'])->name('profile.handle')->middleware('SystemUserLogoutAuth:agent,agent');
});
