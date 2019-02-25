<?php

namespace AjCastro\LaravelMacros;

use Illuminate\Support\ServiceProvider;

class MacrosServiceProvider extends ServiceProvider
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
        $this->loadHelpers();
        $this->loadMacros();
    }

    public function loadHelpers()
    {
        require __DIR__.'/helpers/boolean.php';
        require __DIR__.'/helpers/numbers.php';

    }

    public function loadMacros()
    {
        require __DIR__.'/macros/query_builder.local.php';
        require __DIR__.'/macros/request.php';
    }
}
