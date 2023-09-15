<?php

return [
    'api.webflow.com/beta/sites' => [
        'sites' => [
            [
                'id' => '580e63e98c9a982ac9b8b741',
                'workspaceId' => '580e63fc8c9a982ac9b8b744',
                'createdOn' => '2016-10-24T19:41:29.156Z',
                'displayName' => 'api_docs_sample_json',
                'shortName' => 'api-docs-sample-json',
                'lastPublished' => '2016-10-24T23:06:51.251Z',
                'previewUrl' => 'https://d1otoma47x30pg.cloudfront.net/580e63e98c9a982ac9b8b741/201610241603.png',
                'timeZone' => 'America/Los_Angeles',
                'customDomains' => [
                    [
                        'id' => '589a331aa51e760df7ccb89e',
                        'url' => 'www.test-api-domain.com',
                    ],
                ],
            ], [
                'id' => '580ff8c3ba3e45ba9fe588bb',
                'workspaceId' => '580ff8c3ba3e45ba9fe588bf',
                'createdOn' => '2016-10-26T00:28:54.191Z',
                'displayName' => 'Copy of api_docs_sample_json',
                'shortName' => 'api-docs-sample-json-086c6538f9b0583762',
                'lastPublished' => '2022-10-26T00:28:54.191Z',
                'previewUrl' => 'https://d1otoma47x30pg.cloudfront.net/580e63e98c9a982ac9b8b741/201610241603.png',
                'timeZone' => 'America/Los_Angeles',
                'customDomains' => [
                    [
                        'id' => '589a331aa51e760df7ccb89d',
                        'url' => 'test-api-domain.com',
                    ],
                ],
            ],
        ],
    ],
    'api.webflow.com/beta/sites/580e63e98c9a982ac9b8b741' => [
        'id' => '580e63e98c9a982ac9b8b741',
        'workspaceId' => '580e63fc8c9a982ac9b8b744',
        'createdOn' => '2016-10-24T19:41:29.156Z',
        'displayName' => 'api_docs_sample_json',
        'shortName' => 'api-docs-sample-json',
        'lastPublished' => '2016-10-24T23:06:51.251Z',
        'previewUrl' => 'https://d1otoma47x30pg.cloudfront.net/580e63e98c9a982ac9b8b741/201610241603.png',
        'timeZone' => 'America/Los_Angeles',
        'customDomains' => [
            [
                'id' => '589a331aa51e760df7ccb89e',
                'url' => 'www.test-api-domain.com',
            ],
        ],
    ],
    'api.webflow.com/beta/sites/site_id/publish' => [
        'customDomains' => [
            [
                'id' => '589a331aa51e760df7ccb89e',
                'url' => 'www.test-api-domain.com',
            ], [
                'id' => '589a331aa51e760df7ccb89d',
                'url' => 'test-api-domain.com',
            ],
        ],
        'publishToWebflowSubdomain' => false,
    ],
    'api.webflow.com/beta/sites/list/collections' => [
        'collections' => [
            [
                'id' => '63692ab61fb2852f582ba8f5',
                'displayName' => 'Products',
                'singularName' => 'Product',
                'slug' => 'product',
                'createdOn' => '2019-06-12T13:35:14.238Z',
                'lastUpdated' => '2022-11-17T15:08:50.480Z',
            ],
            [
                'id' => '63692ab61fb2856e6a2ba8f6',
                'displayName' => 'Categories',
                'singularName' => 'Category',
                'slug' => 'category',
                'createdOn' => '2019-06-12T13:35:14.238Z',
                'lastUpdated' => '2022-11-17T15:08:50.481Z',
            ],
            [
                'id' => '63692ab61fb285a8562ba8f4',
                'displayName' => 'SKUs',
                'singularName' => 'SKU',
                'slug' => 'sku',
                'createdOn' => '2019-06-12T13:35:14.238Z',
                'lastUpdated' => '2022-11-17T15:08:50.478Z',
            ],
        ],
    ],
    'api.webflow.com/beta/sites/create/collections' => [
        'id' => '580e63fc8c9a982ac9b8b745',
        'displayName' => 'Blog Posts',
        'singularName' => 'Blog Post',
        'slug' => 'post',
        'createdOn' => '2016-10-24T19:41:48.349Z',
        'lastUpdated' => '2016-10-24T19:42:38.929Z',
        'fields' => [
            [
                'id' => '23cc2d952d4e4631ffd4345d2743db4e',
                'isEditable' => true,
                'isRequired' => true,
                'type' => 'PlainText',
                'slug' => 'name',
                'displayName' => 'Name',
                'helpText' => null,
            ],
        ],
    ],
    'api.webflow.com/beta/collections/580e63fc8c9a982ac9b8b745' => [
        'id' => '580e63fc8c9a982ac9b8b745',
        'displayName' => 'Blog Posts',
        'singularName' => 'Blog Post',
        'slug' => 'post',
        'createdOn' => '2016-10-24T19:41:48.349Z',
        'lastUpdated' => '2016-10-24T19:42:38.929Z',
        'fields' => [
            [
                'id' => '23cc2d952d4e4631ffd4345d2743db4e',
                'isEditable' => true,
                'isRequired' => true,
                'type' => 'PlainText',
                'slug' => 'name',
                'displayName' => 'Name',
                'helpText' => null,
            ],
        ],
    ],
    'api.webflow.com/beta/collections/collection_id/fields' => [
        'id' => '75821f618da60c18383330bcc0ca488b',
        'isEditable' => true,
        'isRequired' => false,
        'type' => 'RichText',
        'slug' => 'post-body',
        'displayName' => 'Post Body',
        'helpText' => 'Add the body of your post here',
    ],
    'api.webflow.com/beta/collections/update/fields/75821f618da60c18383330bcc0ca488b' => [
        'id' => '75821f618da60c18383330bcc0ca488b',
        'isEditable' => true,
        'isRequired' => false,
        'type' => 'RichText',
        'slug' => 'post-body',
        'displayName' => 'Post Body',
        'helpText' => 'Add the body of your post here',
    ],
    'api.webflow.com/beta/collections/list/items' => [
        'items' => [
            [
                'id' => '62b720ef280c7a7a3be8cabe',
                'lastPublished' => '2022-06-30T13:35:20.878Z',
                'lastUpdated' => '2022-06-25T14:51:27.809Z',
                'createdOn' => '2022-06-25T14:51:27.809Z',
                'isArchived' => false,
                'isDraft' => false,
                'fieldData' => [
                    'url' => 'https://boards.greenhouse.io/webflow/jobs/26567701',
                    'name' => 'Senior Data Analyst',
                    'department' => 'Data',
                    'slug' => 'senior-data-analyst',
                ],
            ],
        ],
        'pagination' => [
            'limit' => 25,
            'offset' => 0,
            'total' => 2,
        ],
    ],
    'api.webflow.com/beta/collections/create/items' => [
        'id' => '63766b5d283694ddd30bcdce',
        'lastPublished' => '2022-11-29T16:22:43.159Z',
        'lastUpdated' => '2022-11-17T17:19:43.282Z',
        'createdOn' => '2022-11-17T17:11:57.148Z',
        'isArchived' => false,
        'isDraft' => false,
        'fieldData' => [
            'date' => '2022-11-18T00:00:00.000Z',
            'featured' => false,
            'name' => 'My new item',
            'slug' => 'my-new-item',
            'color' => '#db4b68',
        ],
    ],
    'api.webflow.com/beta/collections/get/items/63766b5d283694ddd30bcdce' => [
        'id' => '63766b5d283694ddd30bcdce',
        'lastPublished' => '2022-11-29T16:22:43.159Z',
        'lastUpdated' => '2022-11-17T17:19:43.282Z',
        'createdOn' => '2022-11-17T17:11:57.148Z',
        'isArchived' => false,
        'isDraft' => false,
        'fieldData' => [
            'date' => '2022-11-18T00:00:00.000Z',
            'featured' => false,
            'name' => 'My new item',
            'slug' => 'my-new-item',
            'color' => '#db4b68',
        ],
    ],
    'api.webflow.com/beta/collections/update/items/63766b5d283694ddd30bcdce' => [
        'id' => '63766b5d283694ddd30bcdce',
        'lastPublished' => '2022-11-29T16:22:43.159Z',
        'lastUpdated' => '2022-11-17T17:19:43.282Z',
        'createdOn' => '2022-11-17T17:11:57.148Z',
        'isArchived' => false,
        'isDraft' => false,
        'fieldData' => [
            'date' => '2022-11-18T00:00:00.000Z',
            'featured' => false,
            'name' => 'My new item',
            'slug' => 'my-new-item',
            'color' => '#db4b68',
        ],
    ],
    'api.webflow.com/beta/collections/collection_id/items/publish' => [
        'publishedItemIds' => [
            '643fd856d66b6528195ee2ca',
            '643fd856d66b6528195ee2cb',
        ],
        'errors' => [
            'Staging item ID 643fd856d66b6528195ee2cf not found.',
        ],
    ],
];
