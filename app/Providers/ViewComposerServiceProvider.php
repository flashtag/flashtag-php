<?php

namespace Flashtag\Cms\Providers;

use Flashtag\Cms\ViewComposers;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\Factory as View;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @param View $view
     */
    public function boot(View $view)
    {
        $view->composers([
            ViewComposers\PostComposer::class => 'flashtag::posts.show',
            ViewComposers\PageComposer::class => 'flashtag::pages.show',
        ]);
    }

    /**
     * Register any application services.
     */
    public function register()
    {
        //
    }
}
