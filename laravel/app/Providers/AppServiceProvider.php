<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        config([
            'laravellocalization.supportedLocales' => [
                'en'    => ['name' => 'English', 'script' => 'Latn', 'native' => 'English'],
                'pt-BR' => ['name' => 'Brazilian Portuguese', 'script' => 'Latn', 'native' => 'Português do Brasil', 'regional' => 'pt_BR'],
            ],

            'laravellocalization.useAcceptLanguageHeader' => true,

            'laravellocalization.hideDefaultLocaleInURL' => true
        ]);
    }
}
