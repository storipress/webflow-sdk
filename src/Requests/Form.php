<?php

declare(strict_types=1);

namespace Storipress\Webflow\Requests;

use Storipress\Webflow\Exceptions\HttpException;
use Storipress\Webflow\Exceptions\UnexpectedValueException;
use Storipress\Webflow\Objects\Form as FormObject;
use Storipress\Webflow\Objects\Pagination;

class Form extends Request
{
    /**
     * @see https://docs.developers.webflow.com/reference/list-forms
     *
     * @param  int<0, max>  $offset
     * @param  int<1, 100>  $limit
     * @return array{
     *      data: array<int, FormObject>,
     *      pagination: Pagination,
     *  }
     *
     * @throws HttpException
     * @throws UnexpectedValueException
     */
    public function list(string $siteId, int $offset = 0, int $limit = 100): array
    {
        $uri = sprintf('/sites/%s/forms', $siteId);

        $data = $this->request(
            'get',
            $uri,
            compact('offset', 'limit'),
        );

        return [
            'data' => array_map(
                fn ($data) => FormObject::from($data),
                $data->forms,
            ),
            'pagination' => Pagination::from($data->pagination),
        ];
    }
}
