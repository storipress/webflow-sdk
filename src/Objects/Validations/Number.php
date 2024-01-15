<?php

declare(strict_types=1);

namespace Storipress\Webflow\Objects\Validations;

use stdClass;

class Number extends Validation
{
    /**
     * @var 'integer'|'decimal'
     */
    public string $format = 'decimal';

    public int $precision = 1;

    public bool $allowNegative = false;

    public float $minValue = -9007199254740992;

    public float $maxValue = 9007199254740991;

    /**
     * {@inheritdoc}
     */
    public function validate(mixed $value): bool
    {
        if (! is_int($value)) {
            if ($this->format !== 'decimal' || ! is_float($value)) {
                return false;
            }
        }

        if (! $this->allowNegative && $value < 0) {
            return false;
        }

        if ($this->minValue > $value) {
            return false;
        }

        if ($value > $this->maxValue) {
            return false;
        }

        return true;
    }

    public static function from(stdClass $data): static
    {
        $object = parent::from($data);

        if (! $object->allowNegative) {
            if ($object->minValue < 0) {
                $object->minValue = 0;
            }
        }

        return $object;
    }
}
