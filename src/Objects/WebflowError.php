<?php

declare(strict_types=1);

namespace Storipress\Webflow\Objects;

class WebflowError extends WebflowObject
{
    /**
     * @var non-empty-string
     */
    public string $message;

    /**
     * @var non-empty-string
     */
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
