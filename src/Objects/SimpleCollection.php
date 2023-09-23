<?php

declare(strict_types=1);

namespace Storipress\Webflow\Objects;

class SimpleCollection extends WebflowObject
{
    /**
     * @var non-empty-string
     */
    public string $id;

    /**
     * @var non-empty-string
     */
    public string $createdOn;

    /**
     * @var non-empty-string
     */
    public string $displayName;

    /**
     * @var non-empty-string
     */
    public string $lastUpdated;

    /**
     * @var non-empty-string
     */
    public string $singularName;

    /**
     * @var non-empty-string
     */
    public string $slug;
}
