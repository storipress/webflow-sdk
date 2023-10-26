<?php

declare(strict_types=1);

namespace Storipress\Webflow\Requests;

use Storipress\Webflow\Exceptions\HttpException;
use Storipress\Webflow\Exceptions\UnexpectedValueException;
use Storipress\Webflow\Objects\Webhook as WebhookObject;

/**
 * @phpstan-import-type TriggerType from WebhookObject
 */
class Webhook extends Request
{
    /**
     * @see https://developers.webflow.com/reference/list-webhooks
     *
     * @return array<int, WebhookObject>
     *
     * @throws HttpException
     * @throws UnexpectedValueException
     */
    public function list(string $siteId = null): array
    {
        $uri = sprintf('/sites/%s/webhooks', $siteId ?: $this->app->siteId());

        $data = $this->request('get', $uri, schema: 'list-webhooks');

        return array_map(
            fn ($data) => WebhookObject::from($data),
            $data->webhooks,
        );
    }

    /**
     * @see https://docs.developers.webflow.com/reference/get-webhook
     */
    public function get(string $webhookId): WebhookObject
    {
        $uri = sprintf('/webhooks/%s', $webhookId);

        $data = $this->request('get', $uri, schema: "webhook-details");

        return WebhookObject::from($data);
    }

    /**
     * @see https://docs.developers.webflow.com/reference/create-webhook
     *
     * @param  TriggerType  $triggerType
     * @param  array<non-empty-string, non-empty-string>  $filter
     */
    public function create(string $triggerType, string $url, array $filter = [], string $siteId = null): WebhookObject
    {
        $uri = sprintf('/sites/%s/webhooks', $siteId ?: $this->app->siteId());

        $data = $this->request(
            'post',
            $uri,
            array_filter(compact('triggerType', 'url', 'filter')),
            schema: "webhook-details"
        );

        return WebhookObject::from($data);
    }

    /**
     * @see https://docs.developers.webflow.com/reference/remove-webhook
     */
    public function remove(string $webhookId): bool
    {
        $uri = sprintf('/webhooks/%s', $webhookId);

        return $this->request('delete', $uri);
    }
}
