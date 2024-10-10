<?php

declare(strict_types=1);

use Illuminate\View\Component;

test('components')
    ->expect('App\View\Components')
    ->toBeClasses()
    ->toBeFinal()
    ->toExtend(Component::class)
    ->toHaveMethod('render');
