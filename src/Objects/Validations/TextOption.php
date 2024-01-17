<?php

declare(strict_types=1);

namespace Storipress\Webflow\Objects\Validations;

class TextOption extends Validation
{
    /**
     * @var non-empty-string
     */
    public string $enumName;

    /**
     * {@inheritdoc}
     */
    public function validate(mixed $value): bool
    {
        return true;
    }
}
