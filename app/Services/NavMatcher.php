<?php

namespace App\Services;
use Illuminate\Support\Str;
use Illuminate\Routing\Route;
/**
 * Class NavMatcher.
 */
class NavMatcher
{
    /**
     * @var string
     */
    private $active;
    /**
     * @var Route
     */
    private $route;
    /**
     * NavMatcher constructor.
     * @param Route  $route
     * @param string $active
     */
    public function __construct($route,$active = 'active')
    {
        $this->active = $active;
        $this->route = $route;
    }
    /**
     * @param  string $route
     * @return string
     */
    public function match($route)
    {
        return $this->isCurrent($route) || $this->isMatched($route)
            ? $this->active
            : '';
    }
    /**
     * @param  string $needle
     * @return bool
     */
    private function isCurrent($needle)
    {
        return $this->route->getName() === $needle;
    }
    /**
     * @param  string $needle
     * @return bool
     */
    private function isMatched($needle)
    {
        return Str::startsWith($this->route->getName(), $needle . '.');
    }
}