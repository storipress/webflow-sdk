<?php

declare(strict_types=1);

namespace Storipress\Webflow\Objects;

use stdClass;

class Site extends WebflowObject
{
    public string $id;

    public string $createdOn;

    /**
     * @var array<int, CustomDomain>
     */
    public array $customDomains;

    /**
     * @todo need-explain
     */
    public string $defaultDomain;

    public string $displayName;

    public ?string $lastPublished;

    public string $lastUpdated;

    /**
     * @todo need-explain
     */
    public ?string $locales;

    public ?string $previewUrl;

    public string $shortName;

    public string $timeZone;

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
