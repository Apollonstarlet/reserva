<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider {
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot() {
        // Index view should always have $state defined
        view()->composer('*', 'App\Views\Composers\All');
        view()->composer(array(
            'panels.navbar','panels.sidebar','pages.notifi-new','pages.notifi-expired','pages.notifi-canceled','pages.notifi-quot_new', 'pages.app-email'), 'App\Views\Composers\Navigation');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {
        //
    }
}