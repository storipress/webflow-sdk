<?php

declare(strict_types=1);

namespace Storipress\Webflow\Objects;

/**
 * @phpstan-type CollectionFieldData array{
 *     id: non-empty-string,
 *     displayName: non-empty-string,
 *     helpText: non-empty-string|null,
 *     isEditable: bool,
 *     isRequired: bool,
 *     slug: non-empty-string,
 *     type: 'PlainText'|'RichText'|'Image'|'MultiImage'|'Video'|'Link'|'Email'|'Phone'|'Number'|'DateTime'|'Boolean'|'Color'|'ExtFileRef',
 *     validations: array<int, mixed>,
 * }
 */
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
