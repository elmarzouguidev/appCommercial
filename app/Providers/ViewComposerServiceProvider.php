<?php

namespace App\Providers;

use App\Http\View\Composers\EstimateComposer;
use App\Http\View\Composers\TicketComposer;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ViewComposerServiceProvider extends ServiceProvider
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
        View::composer(['theme.layouts._parts._leftSidebar','theme.layouts._parts._leftSidebar_commercial'], EstimateComposer::class);
    }
}
