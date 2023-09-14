<?php

namespace Storipress\Webflow\Objects;

abstract class WebflowObject
{
    /**
     * @var array<mixed>
     */
    public array $raw;

    /**
     * @param  array<mixed>  $attributes
     * @return $this
     */
    public function map(array $attributes): self
    {
        foreach ($attributes as $key => $value) {
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }

        return $this;
    }

    /**
     * @param  array<mixed>  $raw
     * @return $this
     */
    public function setRaw(array $raw): self
    {
        $this->raw = $raw;

        return $this;
    }
}
