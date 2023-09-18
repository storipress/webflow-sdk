<?php

declare(strict_types=1);

namespace Storipress\Webflow\Requests;

use Storipress\Webflow\Objects\CollectionField as CollectionFieldObject;

/**
 * @phpstan-import-type CollectionFieldData from CollectionFieldObject
 */
class CollectionField extends Request
{
    /**
     * https://developers.webflow.com/reference/create-field
     *
     * @return CollectionFieldObject|null
     */
    public function create(bool $isRequired, string $type, string $displayName, string $slug = null, string $helpText = null)
    {
        $uri = sprintf('/collections/%s/fields', $this->app->collectionId);

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

        if (!is_array($data)) {
            return null;
        }

        return (new CollectionFieldObject())->from($data);
    }

    /**
     * https://developers.webflow.com/reference/update-field
     *
     * @return CollectionFieldObject|null
     */
    public function update(string $fieldId, bool $isRequired, string $displayName, string $helpText = null)
    {
        $uri = sprintf('/collections/%s/fields/%s', $this->app->collectionId, $fieldId);

        $options = [
            'isRequired' => $isRequired,
            'displayName' => $displayName,
        ];

        if ($helpText) {
            $options['helpText'] = $helpText;
        }

        /** @var CollectionFieldData|null $data */
        $data = $this->request('patch', $uri, $options);

        if (!is_array($data)) {
            return null;
        }

        return (new CollectionFieldObject())->from($data);
    }

    /**
     * https://developers.webflow.com/reference/delete-field
     */
    public function delete(string $fieldId): bool
    {
        $uri = sprintf('/collections/%s/fields/%s', $this->app->collectionId, $fieldId);

        $deleted = $this->request('delete', $uri);

        return !is_bool($deleted) ? false : $deleted;
    }
}
