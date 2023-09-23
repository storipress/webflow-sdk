<?php

use Storipress\Webflow\Exceptions\Exception;
use Storipress\Webflow\Objects\WebflowObject;
use Storipress\Webflow\Requests\Request;

it('must use strict type')
    ->expect('Storipress\Webflow')
    ->toUseStrictTypes();

it('must not use final')
    ->expect('Storipress\Webflow')
    ->not()
    ->toBeFinal();

it('must extend Request for Requests')
    ->expect('Storipress\Webflow\Requests')
    ->classes()
    ->toExtend(Request::class);

it('must extend WebflowObject for Objects')
    ->expect('Storipress\Webflow\Objects')
    ->classes()
    ->toExtend(WebflowObject::class);

it('must extend Exception for Exceptions')
    ->expect('Storipress\Webflow\Exceptions')
    ->classes()
    ->toExtend(Exception::class);
