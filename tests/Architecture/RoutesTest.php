<?php

use Illuminate\Routing\Route;

test('routes have names', function () {
    $route_name_missing = collect(app('router')->getRoutes())
        ->filter(function (Route $route) {
            // Laravel 'up' route for healthcheck does not have name
            if ($route->uri() === 'up') {
                return false;
            }

            return empty($route->getName());
        });

    $names = function (Route $route): string {
        return Str::of($route->uri());
    };

    expect($route_name_missing)
        ->toBeEmpty(sprintf('Missing a route name: %s',
            $route_name_missing->implode($names, ', ')));
});
