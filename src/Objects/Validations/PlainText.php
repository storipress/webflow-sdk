<?php

declare(strict_types=1);

namespace Storipress\Webflow\Objects\Validations;

use Illuminate\Support\Str;

class PlainText extends Validation
{
    public bool $singleLine = true;

    public int $minLength = 0;

    public int $maxLength = 9007199254740991;

    /**
     * {@inheritdoc}
     */
    public function validate(mixed $value): bool
    {
        if (! is_string($value)) {
            return false;
        }

        if ($this->singleLine && Str::contains($value, PHP_EOL)) {
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
