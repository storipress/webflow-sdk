<?php

declare(strict_types=1);

namespace Storipress\Webflow\Objects\Validations;

use Storipress\Webflow\Objects\WebflowObject;

abstract class Validation extends WebflowObject
{
    /**
     * Check if the value passed the validations.
     */
    abstract public function validate(mixed $value): bool;
}
