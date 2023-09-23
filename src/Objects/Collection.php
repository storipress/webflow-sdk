<?php

declare(strict_types=1);

namespace Storipress\Webflow\Objects;

use stdClass;

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
