<?php

declare(strict_types=1);

namespace Storipress\Webflow\Objects;

use stdClass;
use Storipress\Webflow\Objects\Validations\Unknown;
use Storipress\Webflow\Objects\Validations\Validation;

/**
 * @phpstan-type CollectionFieldType 'PlainText'|'RichText'|'Image'|'MultiImage'|'VideoLink'|'Link'|'Email'|'Phone'|'Number'|'DateTime'|'Switch'|'Color'|'Option'|'File'|'Reference'|'MultiReference'|'User'|'SkuSettings'|'SkuValues'|'Price'|'MembershipPlan'|'TextOption'|'MultiExternalFile'
 */
class CollectionField extends WebflowObject
{
    /**
     * @var non-empty-string
     */
    public string $id;

    public bool $isEditable;

    public bool $isRequired;

    /**
     * @var CollectionFieldType
     */
    public string $type;

    /**
     * @var non-empty-string
     */
    public string $slug;

    /**
     * @var non-empty-string
     */
    public string $displayName;

    /**
     * @var non-empty-string|null
     */
    public ?string $helpText;

    public ?Validation $validations;

    public static function from(stdClass $data): static
    {
        $type = $data->type;

        if ($type === 'Switch') {
            $type = 'SwitchType';
        }

        $class = sprintf('Storipress\Webflow\Objects\Validations\%s', $type);

        $validations = $data->validations ?: new stdClass();

        if (is_a($class, Validation::class, true)) {
            $data->validations = $class::from($validations);
        } else {
            $data->validations = Unknown::from($validations);
        }

        return parent::from($data);
    }
}
