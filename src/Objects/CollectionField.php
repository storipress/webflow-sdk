<?php

declare(strict_types=1);

namespace Storipress\Webflow\Objects;

use stdClass;

/**
 * @phpstan-type CollectionFieldType 'PlainText'|'RichText'|'Image'|'MultiImage'|'VideoLink'|'Link'|'Email'|'Phone'|'Number'|'DateTime'|'Switch'|'Color'|'Option'|'File'|'Reference'|'MultiReference'|'User'|'SkuSettings'|'SkuValues'|'Price'|'MembershipPlan'|'TextOption'|'MultiExternalFile'
 */
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
     * @var CollectionFieldType
     */
    public string $type;

    public ?stdClass $validations;
}
