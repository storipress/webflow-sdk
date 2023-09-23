<?php

declare(strict_types=1);

namespace Storipress\Webflow\Objects;

class Pagination extends WebflowObject
{
    /**
     * @var int<1, 100>
     */
    public int $limit;

    /**
     * @var int<0, max>
     */
    public int $offset;

    /**
     * @var int<0, max>
     */
    public int $total;
}
