<?php

namespace App\Providers;

use App\Models\Property;
use App\Repositories\Properties\Amenities\AmenityRepository;
use App\Repositories\Properties\Amenities\contract\AmenityContract;
use App\Repositories\Properties\Locations\contracts\locationsContract;
use App\Repositories\Properties\Locations\LocationsRepository;
use App\Repositories\MultiGuardAuthentication\Auth\AdminAuthRepository;
use App\Repositories\MultiGuardAuthentication\Auth\AgentAuthRepository;
use App\Repositories\MultiGuardAuthentication\Auth\Contracts\AdminAuthContract;
use App\Repositories\MultiGuardAuthentication\Auth\Contracts\AgentAuthContract;
use App\Repositories\MultiGuardAuthentication\Auth\Contracts\UserAuthContract;
use App\Repositories\MultiGuardAuthentication\Auth\UserAuthRepository;
use App\Repositories\MultiGuardAuthentication\Registration\AgentRegistrationRepository;
use App\Repositories\MultiGuardAuthentication\Registration\Contracts\AgentRegistrationContract;
use App\Repositories\MultiGuardAuthentication\Registration\Contracts\UserRegistrationContract;
use App\Repositories\MultiGuardAuthentication\Registration\UserRegistrationRepository;
use App\Repositories\MultiGuardAuthentication\Reset_password\AdminResetPasswordRepository;
use App\Repositories\MultiGuardAuthentication\Reset_password\AgentResetPasswordRepository;
use App\Repositories\MultiGuardAuthentication\Reset_password\Contracts\AdminResetPasswordContract;
use App\Repositories\MultiGuardAuthentication\Reset_password\Contracts\AgentResetPasswordContract;
use App\Repositories\MultiGuardAuthentication\Reset_password\Contracts\UserResetPasswordContract;
use App\Repositories\MultiGuardAuthentication\Reset_password\UserResetPasswordRepository;
use App\Repositories\MultiGuardAuthentication\Update_profile\AdminUpdateProfileRepository;
use App\Repositories\MultiGuardAuthentication\Update_profile\AgentUpdateProfileRepository;
use App\Repositories\MultiGuardAuthentication\Update_profile\Contracts\AdminUpdateProfileContract;
use App\Repositories\MultiGuardAuthentication\Update_profile\Contracts\AgentUpdateProfileContract;
use App\Repositories\MultiGuardAuthentication\Update_profile\Contracts\UserUpdateProfileContract;
use App\Repositories\MultiGuardAuthentication\Update_profile\UserUpdateProfileRepository;
use App\Repositories\Orders\contracts\OrderContract;
use App\Repositories\Orders\OrderRepository;
use App\Repositories\PricingPackages\contracts\PricingPackagesRepoContract;
use App\Repositories\PricingPackages\PricingPackagesRepository;
use App\Repositories\Properties\property\contract\PropertyRepoContract;
use App\Repositories\Properties\property\PropertyRepo;
use App\Repositories\Properties\Types\contract\TypeContract;
use App\Repositories\Properties\Types\TypeRepository;
use App\Repositories\Users\Agents\AgentsRepository;
use App\Repositories\Users\Contracts\AgentsRepositoryContract;
use App\Repositories\Users\Contracts\CustomersRepositoryContract;
use App\Repositories\Users\Customers\CustomersRepository;
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
        // agent
        $this->app->bind(AgentRegistrationContract::class, AgentRegistrationRepository::class);
        $this->app->bind(AgentAuthContract::class, AgentAuthRepository::class);
        $this->app->bind(AgentResetPasswordContract::class, AgentResetPasswordRepository::class);
        $this->app->bind(AgentUpdateProfileContract::class, AgentUpdateProfileRepository::class);
        // Verification Emails
        $this->app->bind(RegisterEmailVerificationContract::class, VerifyRegistration::class);
        $this->app->bind(ResetPasswordEmailVerificationContract::class, VerifyResetPassword::class);
        // Pricing Packages
        $this->app->bind(PricingPackagesRepoContract::class, PricingPackagesRepository::class);
        // Location
        $this->app->bind(locationsContract::class, LocationsRepository::class);
        // Types
        $this->app->bind(TypeContract::class, TypeRepository::class);
        // Amenities
        $this->app->bind(AmenityContract::class, AmenityRepository::class);
        // Orders
        $this->app->bind(OrderContract::class, OrderRepository::class);
        // Agents
        $this->app->bind(AgentsRepositoryContract::class, AgentsRepository::class);
        // users
        $this->app->bind(CustomersRepositoryContract::class, CustomersRepository::class);
        // Property
        $this->app->bind(PropertyRepoContract::class, PropertyRepo::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
