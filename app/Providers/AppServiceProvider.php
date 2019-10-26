<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\MyClasses\MyServiceInterface;
use App\MyClasses\MyService;
use App\MyClasses\PowerMyService;

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
        // app()->when('App\MyClasses\MyService')
        //     ->needs('$id')
        //     ->give(2);

        // 粗な結合
        // 「このMyServiceInterfaceを結合する。具体的な実装は、このMyServiceを使う」って意味。
        // app()->bind(
        //     MyServiceInterface::class,
        //
        //     // PowerMyServiceを使うためコメントアウト
        //     // MyService::class
        //
        //     // PowerMyServiceに変更
        //     PowerMyService::class
        // );


        ///// 結合イベント ////

        // 結合時に呼び出される
        app()->resolving(function ($obj, $app) {
            // is_object 変数がオブジェクトかどうかを検査する
            if (is_object($obj)) {
                // get_class オブジェクトのクラス名を返す
                echo get_class($obj) . '<br>';
            } else {
                echo $obj . '<br>';
            }
        });

        // 指定のクラスと結合時のみに呼び出される
        app()->resolving(PowerMyService::class, function ($obj, $app) {
            $newdata = ['ハンバーグ', 'カレーライス', '唐揚げ', '餃子'];

            // 引数にサービスのインスタンスが渡されるため、それを利用することでサービス自体を操作することが可能
            $obj->setData($newdata);
            $obj->setId(rand(0, count($newdata)));
        });

        // ここで切り替え
        app()->singleton(
            MyServiceInterface::class,
            // MyService::class
            PowerMyService::class
        );

    }
}
