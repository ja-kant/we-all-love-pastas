<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider {

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
//        View::composer(
//            'layouts.base', 'App\Http\View\Composers\ListingComposer'
//        );

        View::composer('layouts.base', function ($view) {

            $publicListing = \App\Snippet::where(function ($query) {
                        $query->whereNull('access_mode_id')
                                ->orWhere('access_mode_id', 1);
                    })
                    ->latest()
                    ->take(10)
                    ->get();

            return $view->with('publicListing', $publicListing);
        });
    }

}
