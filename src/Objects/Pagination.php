<?php

declare(strict_types=1);

namespace Storipress\Webflow\Objects;

/**
 * @phpstan-type PaginationData array{
 *     limit: int<1, 100>,
 *     offset: int<0, max>,
 *     total: int<0, max>,
 * }
 */
class Pagination extends WebflowObject
{
    public int $limit;

    public int $offset;

    public int $total;
}
