<?php

namespace App\Providers;

use App\Models\Ingredient;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer("recipes.create", function ($view) {
            $view->with("ingredients",Ingredient::all());
        });
    }
}
