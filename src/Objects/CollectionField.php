<?php

namespace Storipress\Webflow\Objects;

/**
 * @phpstan-type CollectionFieldData array{
 *     id: string,
 *     isEditable: bool,
 *     isRequired: bool,
 *     type: string,
 *     slug: string,
 *     displayName: string,
 *     helpText: string,
 * }
 */
class CollectionField extends WebflowObject
{
    public string $id;

    public bool $isEditable;

    public bool $isRequired;

    public string $type;

    public string $slug;

    public string $displayName;

    public string $helpText;

    /**
     * @param  CollectionFieldData  $data
     */
    public function from(array $data): self
    {
        return $this->setRaw($data)->map($data);
    }
}
