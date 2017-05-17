<?php

namespace Crabbly\FPDF;

use Illuminate\Support\ServiceProvider;

class FpdfServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('FPDF', function () {
            return new FPDF;
        });
    }
}
