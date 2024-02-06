<?php

declare(strict_types=1);

namespace Storipress\Webflow\Objects\Validations;

class RichText extends Validation
{
    public int $minLength = 0;

    public int $maxLength = 2147483647;

    /**
     * {@inheritdoc}
     */
    public function validate(mixed $value): bool
    {
        if (! is_string($value)) {
            return false;
        }

        $len = strlen($value);

        if ($this->minLength > $len) {
            return false;
        }

        if ($len > $this->maxLength) {
            return false;
        }

        return true;
    }
}
