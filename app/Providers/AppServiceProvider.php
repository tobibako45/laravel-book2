<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\MyClasses\MyService;

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
        // app()->bind(MyService::class,
        //     function ($app) {
        //         $myservice = new MyService();
        //         $myservice->setId(10);
        //         return $myservice;
        //     });

        // シングルトンで結合
        // app()->singleton('App\MyClasses\MyService', function ($app){
        //     $myservice = new MyService();
        //     $myservice->setId(0);
        //     return $myservice;
        // });


        // 引数を必要とする結合
        app()->when('App\MyClasses\MyService')
            ->needs('$id')
            ->give(2);
    }
}
