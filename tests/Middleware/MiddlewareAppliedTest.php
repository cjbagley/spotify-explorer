<?php

use App\Http\Middleware\HasValidSpotifyToken;
use Illuminate\Routing\Route;

beforeEach(function () {
    $this->routes = collect(app('router')->getRoutes());
});

it('applies auth middleware', function (string $middleware_name, array $excluded) {
    $middleware_missing = $this->routes->filter(function (Route $route) use ($middleware_name, $excluded) {
        if (in_array($route->getName(), $excluded)) {
            return false;
        }

        return ! in_array($middleware_name, $route->gatherMiddleware());
    });

    $names = function (Route $route): string {
        return Str::of($route->getName());
    };

    expect($middleware_missing)
        ->toBeEmpty(sprintf('Routes missing from: %s',
            $middleware_missing->implode($names, ', ')));
})->with([
    ['web', []],
    [HasValidSpotifyToken::class, []],
]);
