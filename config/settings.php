<?php
return [
    'Settings' => [
        'Cookieconsent' => [
            'groups' => [
                'Cookieconsent' => [
                    'label' => __d('cookieconsent', 'Cookieconsent Settings'),
                ],
            ],

            'schema' => [
                'Cookieconsent.enabled' => [
                    'group' => 'Cookieconsent',
                    'type' => 'boolean',
                    'label' => __d('cookieconsent', 'Enable Cookieconsent integration'),
                ],
            ],
        ],
    ],
];
