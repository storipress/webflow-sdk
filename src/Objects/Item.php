<?php

declare(strict_types=1);

namespace Storipress\Webflow\Objects;

use stdClass;

class Item extends WebflowObject
{
    public string $id;

    public string $createdOn;

    public stdClass $fieldData;

    public bool $isArchived;

    public bool $isDraft;

    public ?string $lastPublished;

    public string $lastUpdated;
}
