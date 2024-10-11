<?php

namespace App\Http\Controllers;

use App\Http\Requests\SpotifyAuthRequest;

final class SpotifyAuthController extends Controller
{
    public function index()
    {
        return view('spotify.auth-required');
    }

    public function authenticate(SpotifyAuthRequest $request)
    {
        return redirect(route('dashboard'));
    }
}
