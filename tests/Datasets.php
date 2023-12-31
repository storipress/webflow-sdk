<?php

return [
    'api.webflow.com/v2/sites' => [
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
    'api.webflow.com/v2/sites/580e63e98c9a982ac9b8b741' => [
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
    'api.webflow.com/v2/sites/site_id/publish' => [
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
    'api.webflow.com/v2/sites/list/collections' => [
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
    'api.webflow.com/v2/sites/create/collections' => [
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
    'api.webflow.com/v2/collections/580e63fc8c9a982ac9b8b745' => [
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
    'api.webflow.com/v2/collections/collection_id/fields' => [
        'id' => '75821f618da60c18383330bcc0ca488b',
        'isEditable' => true,
        'isRequired' => false,
        'type' => 'RichText',
        'slug' => 'post-body',
        'displayName' => 'Post Body',
        'helpText' => 'Add the body of your post here',
    ],
    'api.webflow.com/v2/collections/update/fields/75821f618da60c18383330bcc0ca488b' => [
        'id' => '75821f618da60c18383330bcc0ca488b',
        'isEditable' => true,
        'isRequired' => false,
        'type' => 'RichText',
        'slug' => 'post-body',
        'displayName' => 'Post Body',
        'helpText' => 'Add the body of your post here',
    ],
    'api.webflow.com/v2/collections/list/items' => [
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
    'api.webflow.com/v2/collections/create/items' => [
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
    'api.webflow.com/v2/collections/get/items/63766b5d283694ddd30bcdce' => [
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
    'api.webflow.com/v2/collections/update/items/63766b5d283694ddd30bcdce' => [
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
    'api.webflow.com/v2/collections/collection_id/items/publish' => [
        'publishedItemIds' => [
            '643fd856d66b6528195ee2ca',
            '643fd856d66b6528195ee2cb',
        ],
        'errors' => [
            'Staging item ID 643fd856d66b6528195ee2cf not found.',
        ],
    ],
    'api.webflow.com/v2/sites/site_id/webhooks' => [
        'webhooks' => [
            [
                'id' => '57ca0a9e418c504a6e1acbb6',
                'triggerType' => 'form_submission',
                'siteId' => '562ac0395358780a1f5e6fbd',
                'workspaceId' => '4f4e46fd476ea8c507000001',
                'filter' => [
                    'name' => 'Email Form',
                ],
                'createdOn' => '2016-09-02T23:26:22.241Z',
                'lastTriggered' => '2023-02-08T23:59:28.572Z',
                'url' => 'https://webhook.site/7f7f7f7f-7f7f-7f7f-7f7f-7f7f7f7f7f7f',
            ],
            [
                'id' => '578d85cce0c47cd2865f4cf2',
                'triggerType' => 'form_submission',
                'siteId' => '562ac0395358780a1f5e6fbd',
                'workspaceId' => '4f4e46fd476ea8c507000001',
                'filter' => [
                    'name' => 'Email Form',
                ],
                'createdOn' => '2016-07-19T01:43:40.585Z',
                'lastTriggered' => '2023-02-08T23:59:28.572Z',
                'url' => 'https://webhook.site/7f7f7f7f-7f7f-7f7f-7f7f-7f7f7f7f7f7f',
            ],
            [
                'id' => '578d85cce0c47cd2865f4cf3',
                'triggerType' => 'form_submission',
                'siteId' => '562ac0395358780a1f5e6fbd',
                'workspaceId' => '4f4e46fd476ea8c507000001',
                'filter' => [
                    'name' => 'Email Form',
                ],
                'createdOn' => '2016-07-19T01:43:40.605Z',
                'lastTriggered' => '2023-02-08T23:59:28.572Z',
                'url' => 'https://webhook.site/7f7f7f7f-7f7f-7f7f-7f7f-7f7f7f7f7f7f',
            ],
        ],
    ],
    'api.webflow.com/v2/webhooks/582266e0cd48de0f0e3c6d8b' => [
        'id' => '582266e0cd48de0f0e3c6d8b',
        'triggerType' => 'form_submission',
        'siteId' => '562ac0395358780a1f5e6fbd',
        'workspaceId' => '4f4e46fd476ea8c507000001',
        'createdOn' => '2022-11-08T23:59:28.572Z',
        'lastTriggered' => '2023-02-08T23:59:28.572Z',
        'filter' => null,
        'url' => 'https://webhook.site/7f7f7f7f-7f7f-7f7f-7f7f-7f7f7f7f7f7f',
    ],
    'api.webflow.com/v2/sites/582266e0cd48de0f0e3c6d8b/create/webhooks' => [
        'id' => '582266e0cd48de0f0e3c6d8b',
        'triggerType' => 'form_submission',
        'siteId' => '562ac0395358780a1f5e6fbd',
        'workspaceId' => '4f4e46fd476ea8c507000001',
        'createdOn' => '2022-11-08T23:59:28.572Z',
        'lastTriggered' => '2023-02-08T23:59:28.572Z',
        'filter' => null,
        'url' => 'https://webhook.site/7f7f7f7f-7f7f-7f7f-7f7f-7f7f7f7f7f7f',
    ],
    'api.webflow.com/v2/sites/580e63e98c9a982ac9b8b741/forms?offset=0&limit=100' => [
        'forms' => [
            [
                'id' => '589a331aa51e760df7ccb89e',
                'displayName' => 'Email Form',
                'siteId' => '580e63e98c9a982ac9b8b741',
                'siteDomainId' => '6419db964a9c436a4baf6248',
                'pageId' => '6419db964a9c43f6a3af6348',
                'pageName' => 'Home',
                'workspaceId' => '580e63fc8c9a982ac9b8b744',
                'responseSettings' => [
                    'sendEmailConfirmation' => true,
                    'redirectUrl' => 'https://example.com',
                    'redirectMethod' => 'GET',
                    'redirectAction' => '',
                ],
                'fields' => [
                    [
                        '589a331aa51e760df7ccb89d' => [
                            'displayName' => 'Email',
                            'type' => 'string',
                            'placeholder' => 'Enter your email',
                            'userVisible' => true,
                        ],
                    ],
                ],
                'createdOn' => '2016-10-24T19:41:29.156Z',
                'lastUpdated' => '2016-10-24T19:43:17.271Z',
            ],
            [
                'id' => '580ff8d7ba3e45ba9fe588e9',
                'displayName' => 'Name Form',
                'siteId' => '580e63e98c9a982ac9b8b741',
                'workspaceId' => '580e63fc8c9a982ac9b8b744',
                'responseSettings' => [
                    'sendEmailConfirmation' => false,
                    'redirectUrl' => 'https://example.com',
                    'redirectMethod' => 'GET',
                    'redirectAction' => '',
                ],
                'fields' => [
                    [
                        '589a331aa51e760df7ccb89d' => [
                            'displayName' => 'Name',
                            'type' => 'string',
                            'placeholder' => 'Enter your name',
                            'userVisible' => true,
                        ],
                    ],
                ],
                'createdOn' => '2016-10-24T19:41:29.156Z',
                'lastUpdated' => '2016-10-24T19:43:17.271Z',
            ],
        ],
        'pagination' => [
            'limit' => 25,
            'offset' => 0,
            'total' => 2,
        ],
    ],
];
