<?php

namespace App\Providers;
use App\Advertisement;
use Illuminate\Support\Facades\View;
use DB;
use App\Article;
use App\Category;
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

        View::share('advertisements',Advertisement::all() );
        View::share('menu', Category::all());
        View::share('sliders', DB::table('articles')
            ->select(DB::raw('id, main_photo, title'))
            ->orderBy('id', 'desc')
            ->take(3)
            ->get());
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
