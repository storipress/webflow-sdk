<?php

declare(strict_types=1);

namespace Storipress\Webflow\Objects;

class CollectionField extends WebflowObject
{
    public string $id;

    public string $displayName;

    public ?string $helpText;

    public bool $isEditable;

    public bool $isRequired;

    public string $slug;

    public string $type;

    public object $validations;
}
