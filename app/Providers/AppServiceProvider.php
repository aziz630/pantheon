<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Contact;

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
        View::share('name', 'Jawad khan');

        // Using Closure based composers...
        View::composer(['experiment', 'contact_create'], function ($view) {
            $view->with('contacts', Contact::all());
        });


        View::composer(['experiment', 'contact_create'], function ($view) {
            $view->with('dataSharedBy', 'view composer closure.');
        });
    }
}
