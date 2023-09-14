<?php

namespace Storipress\Webflow\Requests;

use Storipress\Webflow\Objects\CustomDomain;
use Storipress\Webflow\Objects\Site as SiteObject;

/**
 * @phpstan-type SiteData array{
 *     id: string,
 *     workspaceId: string,
 *     createdOn: string,
 *     displayName: string,
 *     shortName: string,
 *     lastPublished: string,
 *     previewUrl: string,
 *     timeZone: string,
 *     customDomains: array<array{
 * 	        id: string,
 *          url: string,
 * 	   }>
 * }
 *
 * @phpstan-type PublishData array{
 * 	   customDomains: array<array{
 *	   	    id: string,
 * 	        url: string,
 * 	   }>,
 * 	   publishToWebflowSubdomain: bool
 * }
 *
 * @phpstan-type PublishResponse array{
 *     customDomains: CustomDomain[],
 *     publishToWebflowSubdomain: bool
 * }
 *
 */
class Site extends Request
{
	/**
	 * @return SiteObject[]|null
	 */
    public function list(): array|null
    {
        $data = $this->request('get', '/sites');

		if (is_null($data)) {
			return null;
		}

		/** @var array{sites: SiteData[]} $data */
        return $this->mapSitesToObject($data);
    }

	/**
	 * @return SiteObject|null
	 */
    public function get(): SiteObject|null
    {
        $uri = sprintf('/sites/%s', $this->app->siteId);

        $data = $this->request('get', $uri);

		if (is_null($data)) {
			return null;
		}

		/** @var SiteData $data */
        return $this->mapSiteToObject($data);
    }

	/**
	 * @param string[] $customDomains
	 * @param bool $publishToWebflowSubdomain
	 * @return PublishResponse|null
	 */
    public function publish(array $customDomains = [], bool $publishToWebflowSubdomain = false): array|null
    {
        $uri = sprintf('/sites/%s/publish', $this->app->siteId);

        $data = $this->request('post', $uri, [
            'customDomains' => $customDomains,
            'publishToWebflowSubdomain' => $publishToWebflowSubdomain,
        ]);

		if (is_null($data)) {
			return null;
		}

		/** @var PublishData $data */
        return $this->mapPublishDataToObject($data);
    }

    /**
	 * @param array{sites: SiteData[]} $data
     * @return array<SiteObject>
     */
    protected function mapSitesToObject(array $data): array
    {
        $sites = [];

        foreach ($data['sites'] as $site) {
            $object = (new SiteObject)->setRaw($site);

            $domains = [];

            foreach ($site['customDomains'] as $domain) {
                $domains[] = (new CustomDomain)->setRaw($domain)->map($domain);
            }

            $site['customDomains'] = $domains;

            $sites[] = $object->map($site);
        }

        return $sites;
    }

	/**
	 * @param SiteData $data
	 * @return SiteObject
	 */
    protected function mapSiteToObject(array $data): SiteObject
    {
        return (new SiteObject())->map($data);
    }

	/**
	 * @param PublishData $data
	 * @return PublishResponse
	 */
    protected function mapPublishDataToObject(array $data): array
    {
        $result = [
            'publishToWebflowSubdomain' => $data['publishToWebflowSubdomain'],
        ];

        $domains = [];

        foreach ($data['customDomains'] as $domain) {
            $domains[] = (new CustomDomain)->map($domain);
        }

        $result['customDomains'] = $domains;

        return $result;
    }
}
