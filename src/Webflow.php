<?php

declare(strict_types=1);

namespace Storipress\Webflow;

use Illuminate\Http\Client\Factory;
use Storipress\Webflow\Requests\Collection;
use Storipress\Webflow\Requests\CollectionField;
use Storipress\Webflow\Requests\Form;
use Storipress\Webflow\Requests\Item;
use Storipress\Webflow\Requests\Site;
use Storipress\Webflow\Requests\Webhook;

class Webflow
{
    protected readonly Site $site;

    protected readonly Collection $collection;

    protected readonly CollectionField $collectionField;

    protected readonly Item $item;

    protected readonly Webhook $webhook;

    protected readonly Form $form;

    protected string $token;

    protected int $retryAfter = 60;

    protected int $rateLimitRemaining = 60;

    public function __construct(
        public Factory $http,
    ) {
        $this->site = new Site($this);

        $this->collection = new Collection($this);

        $this->collectionField = new CollectionField($this);

        $this->item = new Item($this);

        $this->webhook = new Webhook($this);

        $this->form = new Form($this);
    }

    public function instance(): static
    {
        return $this;
    }

    /**
     * @param  non-empty-string  $token
     */
    public function setToken(string $token): static
    {
        $this->token = $token;

        return $this;
    }

    public function token(): string
    {
        return $this->token;
    }

    public function setRetryAfter(int $retryAfter): Webflow
    {
        $this->retryAfter = $retryAfter;

        return $this;
    }

    public function retryAfter(): int
    {
        return $this->retryAfter;
    }

    public function setRateLimitRemaining(int $rateLimitRemaining): Webflow
    {
        $this->rateLimitRemaining = $rateLimitRemaining;

        return $this;
    }

    public function rateLimitRemaining(): int
    {
        return $this->rateLimitRemaining;
    }

    public function site(): Site
    {
        return $this->site;
    }

    public function collection(): Collection
    {
        return $this->collection;
    }

    public function collectionField(): CollectionField
    {
        return $this->collectionField;
    }

    public function item(): Item
    {
        return $this->item;
    }

    public function webhook(): Webhook
    {
        return $this->webhook;
    }

    public function form(): Form
    {
        return $this->form;
    }
}
