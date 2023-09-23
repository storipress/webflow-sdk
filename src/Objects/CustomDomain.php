<?php

declare(strict_types=1);

namespace Storipress\Webflow\Objects;

class CustomDomain extends WebflowObject
{
    /**
     * @var non-empty-string
     */
    public string $id;

    /**
     * @var non-empty-string
     */
    public string $url;
}
