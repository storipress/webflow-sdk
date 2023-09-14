<?php

namespace Storipress\Webflow\Objects;

/**
 * @phpstan-import-type DomainData from CustomDomain
 *
 * @phpstan-type SiteData array{
 *     id: string,
 *     workspaceId: string,
 *     createdOn: string,
 *     displayName: string,
 *     shortName: string,
 *     lastPublished: string,
 *     previewUrl: string,
 *     timeZone: string,
 *     customDomains: array<DomainData>,
 *     publishToWebflowSubdomain?: bool
 * }
 */
class Site extends WebflowObject
{
    public string $id;

    public string $workspaceId;

    public string $createdOn;

    public string $displayName;

    public string $shortName;

    public string $lastPublished;

    public string $previewUrl;

    public string $timezone;

    /**
     * @var array<array<CustomDomain>>
     */
    public array $customDomains;

    public bool $publishToWebflowSubdomain;

    /**
     * @param  SiteData  $data
     */
    public function from(array $data): self
    {
        $this->setRaw($data);

        $domains = [];

        foreach ($data['customDomains'] as $domain) {
            $domains[] = (new CustomDomain)->from($domain);
        }

        $data['customDomains'] = $domains;

        $this->map($data);

        if (isset($data['publishToWebflowSubdomain'])) {
            $this->publishToWebflowSubdomain = $data['publishToWebflowSubdomain'];
        }

        return $this;
    }
}
