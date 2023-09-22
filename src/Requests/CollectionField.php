<?php

declare(strict_types=1);

namespace Storipress\Webflow\Requests;

use Storipress\Webflow\Objects\CollectionField as CollectionFieldObject;
use Webmozart\Assert\Assert;

/**
 * @phpstan-import-type CollectionFieldData from CollectionFieldObject
 */
class CollectionField extends Request
{
    /**
     * https://developers.webflow.com/reference/create-field
     */
    public function create(string $collectionId, bool $isRequired, string $type, string $displayName, string $slug = null, string $helpText = null): CollectionFieldObject
    {
        $uri = sprintf('/collections/%s/fields', $collectionId);

        $options = [
            'isRequired' => $isRequired,
            'type' => $type,
            'displayName' => $displayName,
        ];

        if ($slug) {
            $options['slug'] = $slug;
        }

        if ($helpText) {
            $options['helpText'] = $helpText;
        }

        /** @var CollectionFieldData|null $data */
        $data = $this->request('post', $uri, $options);

        Assert::isArray($data);

        return (new CollectionFieldObject())->from($data);
    }

    /**
     * https://developers.webflow.com/reference/update-field
     */
    public function update(string $collectionId, string $fieldId, bool $isRequired, string $displayName, string $helpText = null): CollectionFieldObject
    {
        $uri = sprintf('/collections/%s/fields/%s', $collectionId, $fieldId);

        $options = [
            'isRequired' => $isRequired,
            'displayName' => $displayName,
        ];

        if ($helpText) {
            $options['helpText'] = $helpText;
        }

        /** @var CollectionFieldData|null $data */
        $data = $this->request('patch', $uri, $options);

        Assert::isArray($data);

        return (new CollectionFieldObject())->from($data);
    }

    /**
     * https://developers.webflow.com/reference/delete-field
     */
    public function delete(string $collectionId, string $fieldId): bool
    {
        $uri = sprintf('/collections/%s/fields/%s', $collectionId, $fieldId);

        $deleted = $this->request('delete', $uri);

        return !is_bool($deleted) ? false : $deleted;
    }
}
