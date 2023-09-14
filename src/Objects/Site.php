<?php

namespace Storipress\Webflow\Objects;

class Site extends WebflowObject
{
    public string $id;

    public string $workspaceId;

    public string $createdOn;

    public string $shortName;

    public string $lastPublished;

    public string $previewUrl;

    public string $timezone;

    /**
     * @var array<array<CustomDomain>>
     */
    public array $customDomains;
}
