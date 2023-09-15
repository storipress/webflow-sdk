<?php

namespace Storipress\Webflow\Objects;

use Illuminate\Support\Arr;

/**
 * @phpstan-import-type CollectionFieldData from CollectionField
 *
 * @phpstan-type CollectionData array{
 *     id: string,
 *     displayName: string,
 *     singularName: string,
 *     slug: string,
 *     createdOn: string,
 *     lastUpdated: string,
 *     fields: CollectionFieldData[],
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

    /** @var CollectionField[] */
    public array $fields;

    /**
     * @param  CollectionData  $data
     * @return $this
     */
    public function from(array $data): self
    {
        $this->setRaw($data);

        $fields = [];

        if (Arr::has($data, ['fields'])) {
            foreach ($data['fields'] as $field) {
                $fields[] = (new CollectionField())->from($field);
            }

            $data['fields'] = $fields;
        }

        return $this->map($data);
    }
}
