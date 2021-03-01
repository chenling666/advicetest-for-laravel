<?php

namespace Chenl\Advice;

use Illuminate\Support\ServiceProvider;

class AdviceServiceProvider extends ServiceProvider
{
    /**
     * 服务提供者是否延迟加载。
     *
     * @var bool
     */
    protected $defer = true;    //延迟加载服务

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //单例绑定服务
        $this->app->singleton('advice', function ($app) {
            return new Advice($app['session'], $app['config']);
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/views', 'Advice');    //视图目录指定
        $this->publishes([
            __DIR__ . '/views' => base_path('resources/views/vendor/advice'),    //发布视图目录到resources下
            __DIR__ . '/config/advice.php' => config_path('advice.php'),    //发布配置文件到laravel的config下
        ]);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        //因为延迟加载，所以要定义provides函数，具体参考laravel文档
        return ['advice'];
    }
}
