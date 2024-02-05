<?php

declare(strict_types=1);

namespace Storipress\Webflow\Objects\Validations;

use finfo;

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

        $content = file_get_contents($value);

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

        $mime = (new finfo)->buffer($content, FILEINFO_MIME_TYPE);

        if ($mime === 'image/svg+xml') {
            $xml = simplexml_load_string($content);

            if ($xml === false) {
                return false;
            }

            $attributes = $xml->attributes();

            $width = (int) $attributes->width;

            $height = (int) $attributes->height;
        } else {
            $size = getimagesizefromstring($content);

            if ($size === false) {
                return false;
            }

            [$width, $height] = $size;
        }

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
