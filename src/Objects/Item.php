<?php

declare(strict_types=1);

namespace Storipress\Webflow\Objects;

use stdClass;

/**
 * @phpstan-type ItemData array{
 *     id: non-empty-string,
 *     createdOn: non-empty-string,
 *     fieldData: stdClass<non-empty-string, mixed>,
 *     isArchived: bool,
 *     isDraft: bool,
 *     lastPublished: non-empty-string|null,
 *     lastUpdated: non-empty-string,
 * }
 */
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
