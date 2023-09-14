<?php

namespace Storipress\Webflow;

use Illuminate\Http\Client\PendingRequest;
use Storipress\Webflow\Requests\Site;

class Webflow
{
    public Site $site;

    public string $siteId;

    public function __construct(public PendingRequest $http)
    {
    }

    public function setSiteId(string $siteId): self
    {
        $this->siteId = $siteId;

        return $this;
    }

    public function setHttpClient(PendingRequest $http): self
    {
        $this->http = $http;

        return $this;
    }

    public function setAccessToken(string $token): self
    {
        $this->http->withToken($token);

        return $this;
    }

    public function site(): Site
    {
        if (! isset($this->site)) {
            $this->site = new Site($this);
        }

        return $this->site;
    }
}
