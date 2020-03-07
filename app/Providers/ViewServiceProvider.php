<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;

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

            $viewData = [];

            $publicListing = \App\Snippet::where(function ($query) {
                        $query->whereNull('access_mode_id')->orWhere('access_mode_id', 1);
                    })
                    ->where(function($q) {
                        $q->whereNull('expired_at')->orWhere('expired_at', '>=', date('Y-m-d H:i:s'));
                    })
                    ->latest()
                    ->take(10)
                    ->get();
            $viewData['publicListing'] = $publicListing;


            if (Auth::check()) {
                $privateListing = \App\Snippet::where('author_id', Auth::id())
                        ->where(function($q) {
                            $q->whereNull('expired_at')->orWhere('expired_at', '>=', date('Y-m-d H:i:s'));
                        })
                        ->latest()
                        ->take(10)
                        ->get();
                $viewData['privateListing'] = $privateListing;
            }
            return $view->with($viewData);
        });
    }

}
