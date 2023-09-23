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
    public string $createdOn;

    /**
     * @var array<int, CustomDomain>
     */
    public array $customDomains;

    /**
     * @todo need-explain
     *
     * @var non-empty-string
     */
    public string $defaultDomain;

    /**
     * @var non-empty-string
     */
    public string $displayName;

    /**
     * @var non-empty-string|null
     */
    public ?string $lastPublished;

    /**
     * @var non-empty-string
     */
    public string $lastUpdated;

    /**
     * @todo need-explain
     *
     * @var non-empty-string|null
     */
    public ?string $locales;

    /**
     * @var non-empty-string|null
     */
    public ?string $previewUrl;

    /**
     * @var non-empty-string
     */
    public string $shortName;

    /**
     * @var non-empty-string
     */
    public string $timeZone;

    /**
     * @var non-empty-string
     */
    public string $workspaceId;

    public static function from(stdClass $data): static
    {
        if (property_exists($data, 'customDomains')) {
            $data->customDomains = array_map(
                fn ($data) => CustomDomain::from($data),
                $data->customDomains,
            );
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
