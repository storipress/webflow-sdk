<?php

declare(strict_types=1);

namespace Storipress\Webflow\Objects;

use stdClass;

class CollectionField extends WebflowObject
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
     * @var non-empty-string|null
     */
    public ?string $helpText;

    public bool $isEditable;

    public bool $isRequired;

    /**
     * @var non-empty-string
     */
    public string $slug;

    /**
     * @var non-empty-string
     */
    public string $type;

    public stdClass $validations;
}
