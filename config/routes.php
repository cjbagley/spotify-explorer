<?php

return [
    'guest' => [
        'login',
        'login.post',
        'register',
        'register.post',
        'password.request',
        'password.email',
        'password.reset',
        'password.store',
        'storage.local',
    ],
    'password' => [
        'password.confirm',
        'password.confirm.post',
        'password.update',
    ],
    'profile' => [
        'profile.edit',
        'profile.update',
        'profile.destroy',
    ],
    'spotify_auth' => [
        'spotify.auth.required',
        'spotify.auth.required.post',
    ],
    'verification' => [
        'verification.notice',
        'verification.verify',
        'verification.send',
    ],
];
