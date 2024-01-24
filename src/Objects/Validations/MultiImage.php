<?php

declare(strict_types=1);

namespace Storipress\Webflow\Objects\Validations;

class MultiImage extends Validation
{
    /**
     * @var array<int, string>
     */
    public array $acceptedExtensions = [];

    public int $minImageSize = 0;

    public int $maxImageSize = 4096;

    /**
     * {@inheritdoc}
     */
    public function validate(mixed $value): bool
    {
        if (! is_array($value)) {
            return false;
        }

        foreach ($value as $item) {
            if (filter_var($item, FILTER_VALIDATE_URL) === false) {
                return false;
            }

            $content = file_get_contents($item);

            if ($content === false) {
                return false;
            }

            $length = strlen($content);

            if (($this->minImageSize * 1024) > $length) {
                return false;
            }

            if ($length > ($this->maxImageSize * 1024)) {
                return false;
            }
        }

        return true;
    }
}
