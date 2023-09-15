<?php

namespace Storipress\Webflow\Objects;

/**
 * @phpstan-type PaginationData array{
 *     limit: int,
 *     offset: int,
 *     total: int
 * }
 */
class Pagination extends WebflowObject
{
    public int $limit;

    public int $offset;

    public int $total;

    /**
     * @param  PaginationData  $data
     */
    public function from(array $data): self
    {
        return $this->setRaw($data)->map($data);
    }
}
