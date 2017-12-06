<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Billing\Stripe;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    // protected $defer = true;
        
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // \DB::statement("SET lc_time_names = 'zh_TW'");
        // \Carbon\Carbon::setLocale('zh_TW');
        // \View::composer();
        view()->composer('layouts.sidebar', function ($view) {
            $view->with('archives', \App\Post::archives());
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // App::bind('App\Billing\Stripe', function() {
        //     return new \App\Billing\Stripe(config('services.stripe.secret'));
        // });

        $this->app->singleton(Stripe::class, function() {
            return new Stripe(config('services.stripe.secret'));
        });

        // $this->app->singleton(Stripe::class, function(app) {
        //     // app->make();
        //     return new Stripe(config('services.stripe.secret'));
        // });
    }
}
