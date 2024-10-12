<?php

use App\Http\Middleware\HasValidSpotifyToken;
use Illuminate\Routing\Route;

beforeEach(function () {
    $this->routes = collect(app('router')->getRoutes());
    $this->guest_routes = config('routes.guest');
});

test('routes apply expected middleware', function (string $middleware_name, array $excluded) {
    $middleware_missing = $this->routes->filter(function (Route $route) use ($middleware_name, $excluded) {
        if (in_array($route->getName(), $excluded)) {
            return false;
        }

        return ! in_array($middleware_name, $route->gatherMiddleware());
    });

    $names = function (Route $route): string {
        return empty($route->getName()) ? Str::of($route->uri()) : Str::of($route->getName());
    };

    expect($middleware_missing)
        ->toBeEmpty(sprintf('Routes missing from: %s',
            $middleware_missing->implode($names, ', ')));
})->with([
    ['web', ['storage.local']],
    ['auth', fn () => config('routes.guest')],
    [
        HasValidSpotifyToken::class,
        fn () => [
            ...config('routes.guest'),
            ...config('routes.password'),
            ...config('routes.profile'),
            ...config('routes.spotify_auth'),
            ...config('routes.verification'),
            'logout',
        ],
    ],
]);
