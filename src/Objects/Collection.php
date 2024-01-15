<?php

declare(strict_types=1);

namespace Storipress\Webflow\Objects;

use stdClass;

class Collection extends WebflowObject
{
    /**
     * @var non-empty-string
     */
    public string $id;

    /**
     * @var non-empty-string
     */
    public string $displayName;

    /**
     * @var non-empty-string
     */
    public string $singularName;

    /**
     * @var non-empty-string
     */
    public string $slug;

    /**
     * @var non-empty-string
     */
    public string $createdOn;

    /**
     * @var non-empty-string
     */
    public string $lastUpdated;

    /**
     * @var array<int, CollectionField>
     */
    public array $fields;

    public static function from(stdClass $data): static
    {
        $data->fields = array_map(
            fn (stdClass $data) => CollectionField::from($data),
            $data->fields,
        );

        return parent::from($data);
    }
}
