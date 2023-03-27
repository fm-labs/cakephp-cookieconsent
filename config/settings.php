<?php
return [
    'Settings' => [
        'GoogleAnalytics' => [
            'groups' => [
                'GoogleAnalytics' => [
                    'label' => __d('cron', 'Google Analytics Settings'),
                ],
            ],

            'schema' => [
                'GoogleAnalytics.enabled' => [
                    'group' => 'GoogleAnalytics',
                    'type' => 'boolean',
                    'label' => __d('cron', 'Enable Google Analytics integration'),
                ],
                'GoogleAnalytics.disableOnDebug' => [
                    'group' => 'GoogleAnalytics',
                    'type' => 'boolean',
                    'label' => __d('cron', 'Disable in debug mode'),
                    'help' => __d('cron', 'Turn OFF tracking when debug mode is enabled.'),
                ],
                'GoogleAnalytics.trackingId' => [
                    'group' => 'GoogleAnalytics',
                    'type' => 'string',
                    'label' => __d('cron', 'Your google analytics tracking ID'),
                    'help' => __d('cron', 'The tracking ID can be retrieved from Google Analytics admin console'),
                ],
            ],
        ],
    ],
];
