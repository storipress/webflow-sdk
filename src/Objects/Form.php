<?php

declare(strict_types=1);

namespace Storipress\Webflow\Objects;

use stdClass;

class Form extends WebflowObject
{
    /**
     * @var non-empty-string
     */
    public string $id;

    /**
     * @var non-empty-string
     */
    public string $displayName;

    /**
     * @var non-empty-string
     */
    public string $siteId;

    /**
     * @var non-empty-string
     */
    public string $siteDomainId;

    /**
     * @var non-empty-string
     */
    public string $pageId;

    /**
     * @var non-empty-string
     */
    public string $pageName;

    /**
     * @var non-empty-string
     */
    public string $workspaceId;

    public stdClass $responseSettings;

    /**
     * @var array<non-empty-string, FormField>
     */
    public array $fields;

    /**
     * @var non-empty-string
     */
    public string $createdOn;

    /**
     * @var non-empty-string
     */
    public string $lastUpdated;

    public static function from(stdClass $data): static
    {
        $data->fields = array_map(
            fn (stdClass $data) => FormField::from($data),
            (array) $data->fields,
        );

        return parent::from($data);
    }
}
