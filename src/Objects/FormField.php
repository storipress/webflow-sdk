<?php

declare(strict_types=1);

namespace Storipress\Webflow\Objects;

/**
 * @phpstan-type FormFieldType 'Plain'|'Email'|'Password'|'Phone'|'Number'
 */
class FormField extends WebflowObject
{
    /**
     * @var non-empty-string
     */
    public string $displayName;

    /**
     * @var FormFieldType
     */
    public string $type;

    public ?string $placeholder;

    public bool $userVisible;
}
