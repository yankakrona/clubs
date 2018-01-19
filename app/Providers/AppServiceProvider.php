<?php

namespace App\Providers;
use Cache;
use Illuminate\Support\ServiceProvider;
use Validator;
use LINE\LINEBot;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      // 半角数字、半角英字のみ
      Validator::extend('check_date', function($attribute, $value){

        if($value == '' || request('birthday') =='--'){ return true; }
        return checkdate(request('birthday_month'),request('birthday_day'),request('birthday_year'));
      });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
      // LINE BOT
      $this->app->bind('line-bot', function ($app, array $parameters) {
          // $parametersを見て、SECRETとかTOKENをDBとかNoSQLから取ってくることが多い
          return new LINEBot(
              new LINEBot\HTTPClient\CurlHTTPClient(env('LINE_ACCESS_TOKEN')),
              ['channelSecret' => env('LINE_CHANNEL_SECRET')]
          );
      });
    }
}
