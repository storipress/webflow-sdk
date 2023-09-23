<?php

declare(strict_types=1);

namespace Storipress\Webflow\Objects;

use stdClass;

/**
 * @phpstan-import-type CollectionFieldData from CollectionField
 *
 * @phpstan-type CollectionData array{
 *     id: non-empty-string,
 *     displayName: non-empty-string,
 *     singularName: non-empty-string,
 *     slug: non-empty-string,
 *     createdOn: non-empty-string,
 *     lastUpdated: non-empty-string,
 *     fields: array<int, CollectionFieldData>,
 * }
 */
class Collection extends WebflowObject
{
    public string $id;

    public string $displayName;

    public string $singularName;

    public string $slug;

    public string $createdOn;

    public string $lastUpdated;

    /**
     * @var array<int, CollectionField>
     */
    public array $fields;

    public static function from(stdClass $data): static
    {
        $data->fields = array_map(
            fn ($data) => CollectionField::from($data),
            $data->fields,
        );

        return parent::from($data);
    }
}
