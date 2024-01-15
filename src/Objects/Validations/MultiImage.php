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

            $headers = get_headers($item, true);

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
        }

        return true;
    }
}
