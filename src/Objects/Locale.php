<?php

declare(strict_types=1);

namespace Storipress\Webflow\Objects;

class Locale extends WebflowObject
{
    /**
     * @var non-empty-string
     */
    public string $id;

    /**
     * @var non-empty-string
     */
    public string $cmsLocaleId;

    public bool $enabled;

    /**
     * @var non-empty-string
     */
    public string $displayName;

    public ?bool $redirect = null;

    public string $subdirectory;

    /**
     * @var non-empty-string
     */
    public string $tag;
}
