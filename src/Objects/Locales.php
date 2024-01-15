<?php

declare(strict_types=1);

namespace Storipress\Webflow\Objects;

use stdClass;

class Locales extends WebflowObject
{
    public Locale $primary;

    /**
     * @var array<int, Locale>
     */
    public array $secondary = [];

    public static function from(stdClass $data): static
    {
        $data->primary = Locale::from($data->primary);

        if (property_exists($data, 'secondary')) {
            $data->secondary = array_map(
                fn (stdClass $data) => Locale::from($data),
                $data->secondary,
            );
        }

        return parent::from($data);
    }
}
