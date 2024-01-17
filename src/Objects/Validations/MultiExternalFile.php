<?php

declare(strict_types=1);

namespace Storipress\Webflow\Objects\Validations;

class MultiExternalFile extends Validation
{
    /**
     * {@inheritdoc}
     */
    public function validate(mixed $value): bool
    {
        return true;
    }
}
