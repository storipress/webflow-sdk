<?php

declare(strict_types=1);

namespace Storipress\Webflow\Objects\Validations;

use Carbon\Exceptions\InvalidFormatException;
use Illuminate\Support\Carbon;

class DateTime extends Validation
{
    /**
     * @var 'date'|'date-time'
     */
    public string $format = 'date';

    /**
     * {@inheritdoc}
     */
    public function validate(mixed $value): bool
    {
        if (! is_string($value)) {
            return false;
        }

        try {
            $time = Carbon::parse($value);
        } catch (InvalidFormatException) {
            return false;
        }

        return $time->toIso8601String() === $value;
    }
}
