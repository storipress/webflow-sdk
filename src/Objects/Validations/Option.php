<?php

declare(strict_types=1);

namespace Storipress\Webflow\Objects\Validations;

class Option extends Validation
{
    /**
     * @var non-empty-array<int, array{
     *     name: non-empty-string,
     *     id: non-empty-string,
     * }>
     */
    public array $options;

    /**
     * {@inheritdoc}
     */
    public function validate(mixed $value): bool
    {
        if (! is_string($value)) {
            return false;
        }

        $options = array_column($this->options, 'id');

        if (! in_array($value, $options, true)) {
            return false;
        }

        return true;
    }
}
