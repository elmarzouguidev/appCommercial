<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Macros\RequestMixin;
use Illuminate\Http\Request;
class MacroServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
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
        Request::mixin(new RequestMixin());
    }
}
