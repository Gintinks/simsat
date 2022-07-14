<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Gate::define('admin', function(User $user){
            $user->priviliges_id === 1;
        });
        Gate::define('managementDlh', function(User $user){
            $user->priviliges_id === 2;
        });
        Gate::define('tps', function(User $user){
            $user->priviliges_id === 3;
        });
    }
}
