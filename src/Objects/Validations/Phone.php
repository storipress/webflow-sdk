<?php

declare(strict_types=1);

namespace Storipress\Webflow\Objects\Validations;

class Phone extends Validation
{
    /**
     * {@inheritdoc}
     */
    public function validate(mixed $value): bool
    {
        if (! is_string($value)) {
            return false;
        }

        return true;
    }
}
