<?php

namespace Flashtag\Cms\Providers;

use Flashtag\Cms\Http\ViewComposers\PageComposer;
use Flashtag\Cms\Http\ViewComposers\PostComposer;
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
            PostComposer::class => 'flashtag::posts.show',
            PageComposer::class => 'flashtag::pages.show',
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
