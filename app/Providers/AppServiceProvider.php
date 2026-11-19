<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Setting;
use App\Models\SubCategory;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View as FacadesView;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        if (app()->environment('production') || config('app.env') === 'production') {
            URL::forceScheme('https');
        }

        FacadesView::composer('*', function ($view) {
            try {
                $view->with('globalSiteSettings', Setting::first());
                $view->with('globalCarts', Cart::where('ip_address', request()->ip())->with('product')->get());
                $view->with('globalCartCount', Cart::where('ip_address', request()->ip())->count());
                $view->with('globalCategories', Category::orderBy('name', 'asc')->with('subCategory')->get());
                $view->with('globalSubCategories', SubCategory::orderBy('name', 'asc')->get());
            } catch (\Exception $e) {
                $view->with('globalSiteSettings', null);
                $view->with('globalCarts', collect());
                $view->with('globalCartCount', 0);
                $view->with('globalCategories', collect());
                $view->with('globalSubCategories', collect());
            }
        });
    }
}
