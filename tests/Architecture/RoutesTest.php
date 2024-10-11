<?php

use Illuminate\Routing\Route;

test('routes have names', function () {
    $route_name_missing = collect(app('router')->getRoutes())
        ->filter(function (Route $route) {
            if ($route->getName() === '') {
                return true;
            }

            return $route->getName() === null;
        });

    $names = function (Route $route): string {
        return Str::of($route->uri());
    };

    expect($route_name_missing)
        ->toBeEmpty(sprintf('Missing a route name: %s',
            $route_name_missing->implode($names, ', ')));
});
