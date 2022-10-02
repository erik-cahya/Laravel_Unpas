<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Pagination\Paginator;

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
        Paginator::useBootstrap();

        // membuat sebuah gate, yang dimana hanya bisa diakses oleh user dengan usernamenya Erikcahya
        Gate::define('admin', function(User $user){
            // return $user->username === 'Erikcahya';
            return $user->is_admin;
        });
    }
}
