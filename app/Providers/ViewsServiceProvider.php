<?php

namespace App\Providers;
use App\Views\Composers\NavComposer;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\ServiceProvider;
/**
 * Class ViewsServiceProvider
 * @package App\Providers
 */
class ViewsServiceProvider extends ServiceProvider
{
    /**
     * @var Factory
     */
    private $views;
    /**
     * @param Factory $viewFactory
     */
    public function boot(Factory $viewFactory)
    {
        $this->views = $viewFactory;
        $this->compose('layouts.app', NavComposer::class);
    }
    /**
     * @param array|string $views
     * @param string $viewComposer
     */
    private function compose($views, $viewComposer)
    {
        $this->app->singleton($viewComposer);
        $this->views->composer($views, $viewComposer);
    }
}