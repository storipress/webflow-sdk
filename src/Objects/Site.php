<?php

declare(strict_types=1);

namespace Storipress\Webflow\Objects;

use stdClass;

class Site extends WebflowObject
{
    /**
     * @var non-empty-string
     */
    public string $id;

    /**
     * @var non-empty-string
     */
    public string $workspaceId;

    /**
     * @var non-empty-string
     */
    public string $displayName;

    /**
     * @var non-empty-string
     */
    public string $shortName;

    /**
     * @var non-empty-string|null
     */
    public ?string $previewUrl;

    /**
     * @var non-empty-string
     */
    public string $timeZone;

    /**
     * @var non-empty-string
     */
    public string $createdOn;

    /**
     * @var non-empty-string
     */
    public string $lastUpdated;

    /**
     * @var non-empty-string|null
     */
    public ?string $lastPublished;

    /**
     * @var array<int, CustomDomain>
     */
    public array $customDomains;

    public ?Locales $locales;

    /**
     * Webflow build-in domain.
     *
     * @var non-empty-string
     */
    public string $defaultDomain;

    public static function from(stdClass $data): static
    {
        if (property_exists($data, 'customDomains')) {
            $data->customDomains = array_map(
                fn (stdClass $data) => CustomDomain::from($data),
                $data->customDomains,
            );
        }

        if (property_exists($data, 'locales') && $data->locales instanceof stdClass) {
            $data->locales = Locales::from($data->locales);
        }

        $object = parent::from($data);

        if (isset($object->shortName)) {
            $object->defaultDomain = sprintf(
                '%s.webflow.io',
                $object->shortName,
            );
        }

        return $object;
    }
}
