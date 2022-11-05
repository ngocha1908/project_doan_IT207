<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class TranslationServiceProvider extends ServiceProvider
{
    protected $lang;
    /**
     * Register services.
     *
     * @return void
     */

    public function __construct()
    {
        $this->lang = App::getLocale();
    }

    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::share(
            'translationJson',
            File::get(resource_path('lang/' . $this->lang . '.json'))
        );
    }
}
