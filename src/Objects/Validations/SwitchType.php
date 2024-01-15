<?php

declare(strict_types=1);

namespace Storipress\Webflow\Objects\Validations;

class SwitchType extends Validation
{
    /**
     * {@inheritdoc}
     */
    public function validate(mixed $value): bool
    {
        if (! is_bool($value)) {
            return false;
        }

        return true;
    }
}
