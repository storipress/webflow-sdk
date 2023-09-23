<?php

use Storipress\Webflow\Exceptions\Exception;
use Storipress\Webflow\Objects\WebflowObject;
use Storipress\Webflow\Requests\Request;

test('There are no debugging statements remaining in our code.')
    ->expect(['dd', 'dump', 'ray', 'var_dump', 'echo'])
    ->not
    ->toBeUsed();

test('Strict typing must be enforced in the code.')
    ->expect('Storipress\Webflow')
    ->toUseStrictTypes();

test('The code should not utilize the "final" keyword.')
    ->expect('Storipress\Webflow')
    ->not()
    ->toBeFinal();

test('All Request classes should extend "Request".')
    ->expect('Storipress\Webflow\Requests')
    ->classes()
    ->toExtend(Request::class);

test('All Object classes should extend "WebflowObject".')
    ->expect('Storipress\Webflow\Objects')
    ->classes()
    ->toExtend(WebflowObject::class);

test('All Exception classes should extend "Exception".')
    ->expect('Storipress\Webflow\Exceptions')
    ->classes()
    ->toExtend(Exception::class);
