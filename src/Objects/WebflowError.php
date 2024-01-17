<?php

declare(strict_types=1);

namespace Storipress\Webflow\Objects;

class WebflowError extends WebflowObject
{
    public string $message;

    public string $code;

    public mixed $externalReference;

    /**
     * @var array<int, object{
     *     param: string,
     *     description: string,
     * }>
     */
    public array $details;
}
