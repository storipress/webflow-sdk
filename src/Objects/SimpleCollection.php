<?php

declare(strict_types=1);

namespace Storipress\Webflow\Objects;

/**
 * @phpstan-type SimpleCollectionData array{
 *     id: non-empty-string,
 *     createdOn: non-empty-string,
 *     displayName: non-empty-string,
 *     lastUpdated: non-empty-string,
 *     singularName: non-empty-string,
 *     slug: non-empty-string,
 * }
 */
class SimpleCollection extends WebflowObject
{
    public string $id;

    public string $createdOn;

    public string $displayName;

    public string $lastUpdated;

    public string $singularName;

    public string $slug;
}
