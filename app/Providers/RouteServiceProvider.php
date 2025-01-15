<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    public function boot()
    {
        parent::boot();

        // Define the middleware in the routes file
        Route::middleware(['web', 'auth', 'admin']) // Ensure 'auth' and 'admin' middleware are defined correctly
            ->prefix('admin')
            ->name('admin.')
            ->group(function () {
                Route::get('/', function () {
                    return view('moonshine::index');
                });
            });
    }

    public function map()
    {
        $this->mapWebRoutes();
    }

    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->group(base_path('routes/web.php'));
    }
}
