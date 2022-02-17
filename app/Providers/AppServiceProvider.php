<?php

namespace App\Providers;

use App\Models\Client;
use App\Models\Account;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
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
        Schema::defaultStringLength(191);




    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (!$this->app->runningInConsole()) {
            // 'key' => 'value'
            $settings = Setting::all('key', 'value')
                ->keyBy('key')
                ->transform(function ($setting) {
                    return $setting->value;
                })
                ->toArray();
            config([
                'settings' => $settings
            ]);

            config(['app.name' => config('settings.app_name')]);
        }

        Paginator::useBootstrap();
    }
}
