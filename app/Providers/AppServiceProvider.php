<?php

namespace App\Providers;

use App\Repositories\MultiGuardAuthentication\Auth\AdminAuthRepository;
use App\Repositories\MultiGuardAuthentication\Auth\Contracts\AdminAuthContract;
use App\Repositories\MultiGuardAuthentication\Auth\Contracts\UserAuthContract;
use App\Repositories\MultiGuardAuthentication\Auth\UserAuthRepository;
use App\Repositories\MultiGuardAuthentication\Registration\Contracts\UserRegistrationContract;
use App\Repositories\MultiGuardAuthentication\Registration\UserRegistrationRepository;
use App\Repositories\MultiGuardAuthentication\Reset_password\AdminResetPasswordRepository;
use App\Repositories\MultiGuardAuthentication\Reset_password\Contracts\AdminResetPasswordContract;
use App\Repositories\MultiGuardAuthentication\Reset_password\Contracts\UserResetPasswordContract;
use App\Repositories\MultiGuardAuthentication\Reset_password\UserResetPasswordRepository;
use App\Repositories\MultiGuardAuthentication\Update_profile\AdminUpdateProfileRepository;
use App\Repositories\MultiGuardAuthentication\Update_profile\Contracts\AdminUpdateProfileContract;
use App\Repositories\MultiGuardAuthentication\Update_profile\Contracts\UserUpdateProfileContract;
use App\Repositories\MultiGuardAuthentication\Update_profile\UserUpdateProfileRepository;
use App\Services\MultiGuardAuthentication\Contracts\RegisterEmailVerificationContract;
use App\Services\MultiGuardAuthentication\Contracts\ResetPasswordEmailVerificationContract;
use App\Services\MultiGuardAuthentication\Email_Verification\VerifyRegistration;
use App\Services\MultiGuardAuthentication\Email_Verification\VerifyResetPassword;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Admin
        $this->app->bind(AdminAuthContract::class, AdminAuthRepository::class);
        $this->app->bind(AdminResetPasswordContract::class, AdminResetPasswordRepository::class);
        $this->app->bind(AdminUpdateProfileContract::class, AdminUpdateProfileRepository::class);
        // User
        $this->app->bind(UserAuthContract::class, UserAuthRepository::class);
        $this->app->bind(UserResetPasswordContract::class, UserResetPasswordRepository::class);
        $this->app->bind(UserRegistrationContract::class, UserRegistrationRepository::class);
        $this->app->bind(UserUpdateProfileContract::class, UserUpdateProfileRepository::class);
        // Verification Emails
        $this->app->bind(RegisterEmailVerificationContract::class, VerifyRegistration::class);
        $this->app->bind(ResetPasswordEmailVerificationContract::class, VerifyResetPassword::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
