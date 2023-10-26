<?php

declare(strict_types=1);

namespace Storipress\Webflow\Objects;

use stdClass;

/**
 * @phpstan-type TriggerType 'form_submission'|'site_publish'|'page_created'|'page_metadata_updated'|'page_deleted'|'ecomm_new_order'|'ecomm_order_changed'|'ecomm_inventory_changed'|'user_account_added'|'user_account_updated'|'user_account_deleted'|'collection_item_created'|'collection_item_changed'|'collection_item_deleted'|'collection_item_unpublished'
 */
class Webhook extends WebflowObject
{
    /**
     * @var non-empty-string
     */
    public string $id;

    /**
     * @var TriggerType
     */
    public string $triggerType;

    /**
     * @var non-empty-string
     */
    public string $siteId;

    /**
     * @var non-empty-string
     */
    public string $workspaceId;

    public ?stdClass $filter;

    /**
     * @var non-empty-string
     */
    public string $createdOn;

    /**
     * @var non-empty-string
     */
    public string $lastTriggered;

    /**
     * @var non-empty-string
     */
    public string $url;
}
