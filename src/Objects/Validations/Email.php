<?php

declare(strict_types=1);

namespace Storipress\Webflow\Objects\Validations;

class Email extends Validation
{
    /**
     * {@inheritdoc}
     */
    public function validate(mixed $value): bool
    {
        if (filter_var($value, FILTER_VALIDATE_EMAIL) === false) {
            return false;
        }

        return true;
    }
}
