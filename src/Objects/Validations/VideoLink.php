<?php

declare(strict_types=1);

namespace Storipress\Webflow\Objects\Validations;

class VideoLink extends Validation
{
    /**
     * {@inheritdoc}
     */
    public function validate(mixed $value): bool
    {
        if (filter_var($value, FILTER_VALIDATE_URL) === false) {
            return false;
        }

        return true;
    }
}
