<?php

namespace Flashtag\Cms\Providers;

use Flashtag\Cms\Http\ViewComposers\PageComposer;
use Flashtag\Cms\Http\ViewComposers\PostComposer;
use Illuminate\Contracts\View\Factory as View;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @param View $view
     */
    public function boot(View $view)
    {
        $view->composer('flashtag::posts.show', PostComposer::class);
        $view->composer('flashtag::pages.show', PageComposer::class);
    }

    /**
     * Register any application services.
     */
    public function register()
    {
        //
    }
}
