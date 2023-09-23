<?php

declare(strict_types=1);

namespace Storipress\Webflow\Objects;

/**
 * @phpstan-type DomainData array{
 *     id: non-empty-string,
 *     url: non-empty-string,
 * }
 */
class CustomDomain extends WebflowObject
{
    public string $id;

    public string $url;
}
