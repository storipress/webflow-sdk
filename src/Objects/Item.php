<?php

namespace Storipress\Webflow\Objects;

/**
 * @phpstan-type ItemData array{
 *     id: string,
 *     lastPublished: string,
 *     lastUpdated: string,
 *     createdOn: string,
 *     isArchived: bool,
 *     isDraft: bool,
 *     fieldData: array<mixed>
 * }
 */
class Item extends WebflowObject
{
    public string $id;

    public string $lastPublished;

    public string $lastUpdated;

    public string $createdOn;

    public bool $isArchived;

    public bool $isDraft;

    /** @var array<mixed> */
    public array $fieldData;

    /**
     * @param  ItemData  $data
     * @return $this
     */
    public function from(array $data): self
    {
        return $this->setRaw($data)->map($data);
    }
}
