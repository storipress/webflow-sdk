<?php

declare(strict_types=1);

namespace Storipress\Webflow\Objects;

class Pagination extends WebflowObject
{
    public int $limit;

    public int $offset;

    public int $total;
}
