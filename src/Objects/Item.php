<?php

declare(strict_types=1);

namespace Storipress\Webflow\Objects;

use stdClass;

class Item extends WebflowObject
{
    /**
     * @var non-empty-string
     */
    public string $id;

    /**
     * @var non-empty-string|null
     */
    public ?string $cmsLocaleId;

    /**
     * @var non-empty-string|null
     */
    public ?string $lastPublished;

    /**
     * @var non-empty-string
     */
    public string $lastUpdated;

    /**
     * @var non-empty-string
     */
    public string $createdOn;

    public bool $isArchived;

    public bool $isDraft;

    public stdClass $fieldData;
}
