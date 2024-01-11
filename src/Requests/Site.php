<?php

declare(strict_types=1);

namespace Storipress\Webflow\Requests;

use stdClass;
use Storipress\Webflow\Exceptions\HttpException;
use Storipress\Webflow\Exceptions\UnexpectedValueException;
use Storipress\Webflow\Objects\CustomDomain;
use Storipress\Webflow\Objects\Site as SiteObject;

class Site extends Request
{
    /**
     * @see https://developers.webflow.com/reference/list-sites
     *
     * @return array<int, SiteObject>
     *
     * @throws HttpException
     * @throws UnexpectedValueException
     */
    public function list(): array
    {
        $data = $this->request(
            'get',
            '/sites',
            schema: 'sites',
        );

        return array_map(
            fn ($data) => SiteObject::from($data),
            $data->sites,
        );
    }

    /**
     * @see https://developers.webflow.com/reference/get-site
     *
     * @throws HttpException
     * @throws UnexpectedValueException
     */
    public function get(?string $siteId = null): SiteObject
    {
        $uri = sprintf('/sites/%s', $siteId ?: $this->app->siteId());

        $data = $this->request('get', $uri, schema: 'get-site');

        return SiteObject::from($data);
    }

    /**
     * @see https://developers.webflow.com/reference/site-publish
     *
     * @param  array<int, non-empty-string>  $customDomains
     * @return  stdClass{
     *     customDomains: array<int, CustomDomain>,
     *     publishToWebflowSubdomain: bool,
     * }
     *
     * @throws HttpException
     * @throws UnexpectedValueException
     */
    public function publish(?string $siteId = null, array $customDomains = [], bool $publishToWebflowSubdomain = false): stdClass
    {
        $uri = sprintf('/sites/%s/publish', $siteId ?: $this->app->siteId());

        $data = $this->request(
            'post',
            $uri,
            compact(
                'customDomains',
                'publishToWebflowSubdomain',
            ),
            'site-publish',
        );

        $data->customDomains = array_map(
            fn ($data) => CustomDomain::from($data),
            $data->customDomains,
        );

        return $data;
    }
}
