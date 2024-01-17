<?php

declare(strict_types=1);

namespace Storipress\Webflow\Objects\Validations;

class MultiReference extends Validation
{
    /**
     * @var non-empty-string
     */
    public string $collectionId;

    /**
     * {@inheritdoc}
     */
    public function validate(mixed $value): bool
    {
        if (! is_array($value)) {
            return false;
        }

        foreach ($value as $item) {
            if (! is_string($item)) {
                return false;
            }
        }

        return true;
    }
}
