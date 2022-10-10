<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Braintree\Gateway;

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
    public function boot()   //qualunque servizio scritto nel boot noi lo possiamo usare in tutta la nostra applicazione, usando singleton che farà in modo che una determinata classe si crea un solo figlio e può accedere a tutto
    {
        $this->app->singleton(Gateway::class, function () {
            return new Gateway(
                [
                    'environment' => 'sandbox',
                    'merchantId' => 'v8k2y7cn65r9gzss',
                    'publicKey' => '76gj9wvs9jwfrcyb',
                    'privateKey' => '34eaa43c2ff6999fe4c1d9a070db40d2'
                ]
            );
        });
    }
}
