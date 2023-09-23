<?php

declare(strict_types=1);

namespace Storipress\Webflow\Objects;

use stdClass;

abstract class WebflowObject
{
    final public function __construct(
        public readonly stdClass $raw,
        bool $map = true,
    ) {
        if (!$map) {
            return;
        }

        foreach (get_object_vars($this->raw) as $key => $value) {
            $this->{$key} = $value;
        }
    }

    public static function from(stdClass $data): static
    {
        return new static($data);
    }
}
