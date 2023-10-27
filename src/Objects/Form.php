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
    public string $siteId;

    /**
     * @var non-empty-string
     */
    public string $workspaceId;

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
     * @var array<string, FormField>
     */
    public array $fields;

    public stdClass $responseSettings;

    public static function from(stdClass $data): static
    {
        $data->fields = array_map(
            fn ($data) => FormField::from($data),
            (array) $data->fields,
        );

        return parent::from($data);
    }
}
