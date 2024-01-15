<?php

declare(strict_types=1);

namespace Storipress\Webflow\Objects\Validations;

class Image extends Validation
{
    /**
     * @var array<int, string>
     */
    public array $acceptedExtensions = [];

    public int $minImageSize = 0;

    public int $maxImageSize = 4096;

    public int $minImageWidth = 0;

    public int $maxImageWidth = 9007199254740991;

    public int $minImageHeight = 0;

    public int $maxImageHeight = 9007199254740991;

    /**
     * {@inheritdoc}
     */
    public function validate(mixed $value): bool
    {
        if (! is_string($value)) {
            return false;
        }

        if (filter_var($value, FILTER_VALIDATE_URL) === false) {
            return false;
        }

        $headers = get_headers($value, true);

        if ($headers === false) {
            return false;
        }

        $headers = array_change_key_case($headers);

        if (! isset($headers['content-length'])) {
            return false;
        }

        $length = (int) $headers['content-length'];

        if ($this->minImageSize > $length) {
            return false;
        }

        if ($length > $this->maxImageSize) {
            return false;
        }

        $size = getimagesize($value);

        if ($size === false) {
            return false;
        }

        [$width, $height] = $size;

        if ($this->minImageWidth > $width) {
            return false;
        }

        if ($width > $this->maxImageWidth) {
            return false;
        }

        if ($this->minImageHeight > $height) {
            return false;
        }

        if ($height > $this->maxImageHeight) {
            return false;
        }

        return true;
    }
}
