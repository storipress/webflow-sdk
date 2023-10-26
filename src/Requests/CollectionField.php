<?php

declare(strict_types=1);

namespace Storipress\Webflow\Requests;

use Storipress\Webflow\Exceptions\HttpException;
use Storipress\Webflow\Exceptions\UnexpectedValueException;
use Storipress\Webflow\Objects\CollectionField as CollectionFieldObject;

/**
 * @phpstan-type CollectionFieldCreateType 'PlainText'|'RichText'|'Image'|'MultiImage'|'Video'|'Link'|'Email'|'Phone'|'Number'|'DateTime'|'Switch'|'Color'|'ExtFileRef'
 */
class CollectionField extends Request
{
    /**
     * @see https://developers.webflow.com/reference/create-field
     *
     * @param  array{
     *     displayName: non-empty-string,
     *     type: CollectionFieldCreateType,
     *     isRequired: bool,
     *     slug?: non-empty-string,
     *     helpText?: non-empty-string,
     * } $params
     *
     * @throws HttpException
     * @throws UnexpectedValueException
     */
    public function create(
        string $collectionId,
        array $params,
    ): CollectionFieldObject {
        $uri = sprintf('/collections/%s/fields', $collectionId);

        $data = $this->request('post', $uri, $params, 'collection-field');

        return CollectionFieldObject::from($data);
    }

    /**
     * @see https://developers.webflow.com/reference/update-field
     *
     * @param  array{
     *     displayName?: non-empty-string,
     *     isRequired?: bool,
     *     helpText?: non-empty-string,
     * } $params
     *
     * @throws HttpException
     * @throws UnexpectedValueException
     */
    public function update(
        string $collectionId,
        string $fieldId,
        array $params,
    ): CollectionFieldObject {
        $uri = sprintf('/collections/%s/fields/%s', $collectionId, $fieldId);

        $data = $this->request('patch', $uri, $params, 'collection-field');

        return CollectionFieldObject::from($data);
    }

    /**
     * @see https://developers.webflow.com/reference/delete-field
     *
     * @throws HttpException
     * @throws UnexpectedValueException
     */
    public function delete(string $collectionId, string $fieldId): bool
    {
        $uri = sprintf('/collections/%s/fields/%s', $collectionId, $fieldId);

        return $this->request('delete', $uri);
    }
}
