<?php

declare(strict_types=1);

namespace Storipress\Webflow\Exceptions;

use InvalidArgumentException;

/**
 * @internal
 */
final class InvalidRequestMethod extends InvalidArgumentException
{
    /**
     * Create a new exception instance.
     */
    public static function create(): self
    {
        return new self(
            'The request method is invalid.'
        );
    }
}
