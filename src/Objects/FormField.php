<?php

declare(strict_types=1);

namespace Storipress\Webflow\Objects;

class FormField extends WebflowObject
{
    /**
     * @var non-empty-string
     */
    public string $displayName;

    /**
     * @var non-empty-string
     */
    public string $type;

    public string $placeHolder;

    public bool $userVisible;
}
