<?php

namespace Storipress\Webflow\Requests;

use Storipress\Webflow\Objects\CustomDomain;
use Storipress\Webflow\Objects\Site as SiteObject;

/**
 * @phpstan-import-type DomainData from CustomDomain
 * @phpstan-import-type SiteData from Site
 */
class Site extends Request
{
    /**
     * @return SiteObject[]|null
     */
    public function list(): ?array
    {
		/** @var array{sites: SiteData[]}|null $data */
        $data = $this->request('get', '/sites');

        if (is_null($data)) {
            return null;
        }

		$sites = [];

		foreach ($data['sites'] as $site) {
			$sites[] = (new SiteObject)->from($site);
		}

		return $sites;
    }

    public function get(): ?SiteObject
    {
        $uri = sprintf('/sites/%s', $this->app->siteId);

		/** @var SiteData|null $data */
        $data = $this->request('get', $uri);

        if (is_null($data)) {
            return null;
        }

		return (new SiteObject)->from($data);
    }

    /**
     * @param  string[]  $customDomains
     * @return SiteObject|null
     */
    public function publish(array $customDomains = [], bool $publishToWebflowSubdomain = false): ?SiteObject
    {
        $uri = sprintf('/sites/%s/publish', $this->app->siteId);

		/** @var SiteData|null $data */
		$data = $this->request('post', $uri, [
            'customDomains' => $customDomains,
            'publishToWebflowSubdomain' => $publishToWebflowSubdomain,
        ]);

        if (is_null($data)) {
            return null;
        }

		return (new SiteObject)->from($data);
    }
}
