<?php
namespace App\Providers;
use App\Services\NavMatcher;
use Illuminate\Routing\Route;
use Illuminate\Routing\Router;
use Illuminate\Container\Container;
use Illuminate\Support\ServiceProvider;
/**
 * Class NavigationServiceProvider.
 */
class NavigationServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(NavMatcher::class, function (Container $app) {
            $route = $this->route($app->make(Router::class));
            return new NavMatcher($route);
        });
    }
    /**
     * @param  Router $router
     * @return Route
     */
    private function route($router)
    {
        $route = $router->current();
        if ($route === null) {
            $route = $router->get('/');
        }
        return $route;
    }
}