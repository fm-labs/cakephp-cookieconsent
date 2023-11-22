<?php
return [
    'Settings' => [
        'Cookieconsent' => [
            'groups' => [
                'Cookieconsent' => [
                    'label' => __d('cookieconsent', 'Integration Settings'),
                ],
                'Cookieconsent.Content' => [
                    'label' => __d('cookieconsent', 'Content Settings'),
                ],
                'Cookieconsent.Law' => [
                    'label' => __d('cookieconsent', 'Law Settings'),
                ],
                'Cookieconsent.Cookie' => [
                    'label' => __d('cookieconsent', 'Cookie Settings'),
                ],
            ],

            'schema' => [
                'Cookieconsent.enabled' => [
                    'group' => 'Cookieconsent',
                    'type' => 'boolean',
                    'label' => __d('cookieconsent', 'Enable integration'),
                ],
                'Cookieconsent.autoRender' => [
                    'group' => 'Cookieconsent',
                    'type' => 'boolean',
                    'label' => __d('cookieconsent', 'Enable auto render'),
                    'default' => true,
                ],
                'Cookieconsent.block' => [
                    'group' => 'Cookieconsent',
                    'type' => 'string',
                    'label' => __d('cookieconsent', 'Layout view block'),
                    'default' => 'cookieconsent',
                ],

                'Cookieconsent.autoOpen' => [
                    'group' => 'Cookieconsent.Content',
                    'type' => 'boolean',
                    'label' => __d('cookieconsent', 'Auto Open'),
                    'default' => true,
                ],
                'Cookieconsent.revokable' => [
                    'group' => 'Cookieconsent.Content',
                    'type' => 'boolean',
                    'label' => __d('cookieconsent', 'Revokable'),
                    'default' => false,
                ],
                'Cookieconsent.content.header' => [
                    'group' => 'Cookieconsent.Content',
                    'type' => 'string',
                    'label' => __d('cookieconsent', 'Header Message'),
                    'default' => 'This website uses cookies',
                ],
                'Cookieconsent.content.message' => [
                    'group' => 'Cookieconsent.Content',
                    'type' => 'string',
                    'label' => __d('cookieconsent', 'Content Message'),
                    'default' => 'This website uses cookies to provide a better user experience of our services.',
                ],
                'Cookieconsent.content.dismiss' => [
                    'group' => 'Cookieconsent.Content',
                    'type' => 'string',
                    'label' => __d('cookieconsent', 'Dismiss Message'),
                    'default' => 'I agree',
                ],
                'Cookieconsent.content.link' => [
                    'group' => 'Cookieconsent.Content',
                    'type' => 'string',
                    'label' => __d('cookieconsent', 'Link Title'),
                    'default' => 'Privacy Terms',
                ],
                'Cookieconsent.content.href' => [
                    'group' => 'Cookieconsent.Content',
                    'type' => 'string',
                    'label' => __d('cookieconsent', 'Link Url'),
                    'default' => '/privacy',
                ],

                'Cookieconsent.law.countryCode' => [
                    'group' => 'Cookieconsent.Law',
                    'type' => 'string',
                    'label' => __d('cookieconsent', 'Country Code'),
                    'default' => 'AT',
                ],

                'Cookieconsent.cookie.name' => [
                    'group' => 'Cookieconsent.Cookie',
                    'type' => 'string',
                    'label' => __d('cookieconsent', 'Cookie name'),
                    'default' => 'cookie_law',
                ],

                'Cookieconsent.cookie.expiryDays' => [
                    'group' => 'Cookieconsent.Cookie',
                    'type' => 'string',
                    'label' => __d('cookieconsent', 'Cookie expiration days'),
                    'default' => '365',
                ],

            ],
        ],
    ],
];
