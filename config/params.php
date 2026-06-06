<?php

return [
    'adminEmail' => 'admin@example.com',
    'senderEmail' => 'noreply@example.com',
    'senderName' => 'Example.com mailer',

    'metronic.brand' => 'Demo App',

    'metronic.sidebar' => [
        ['label' => 'Dashboard', 'icon' => 'ki-filled ki-chart-line-star', 'url' => ['site/index'], 'active' => true],
        ['label' => 'About', 'icon' => 'ki-filled ki-information', 'url' => ['site/about']],
        ['label' => 'Contact', 'icon' => 'ki-filled ki-sms', 'url' => ['site/contact']],
        ['label' => 'Components', 'icon' => 'ki-filled ki-element-11', 'url' => ['site/components']],
        ['label' => 'Grid + Detail', 'icon' => 'ki-filled ki-grid-2', 'url' => ['site/grid']],
        ['label' => 'TopNav demo', 'icon' => 'ki-filled ki-burger-menu', 'url' => ['site/topnav']],
    ],

    'metronic.navbar' => [
        ['label' => 'Overview', 'url' => ['site/index'], 'active' => true],
        ['label' => 'Activity', 'url' => '#'],
        ['label' => 'Settings', 'url' => '#'],
    ],

    'metronic.accountMenu' => [
        ['label' => 'Profile', 'icon' => 'ki-filled ki-profile-circle', 'url' => '#'],
        ['label' => 'Settings', 'icon' => 'ki-filled ki-setting-2', 'url' => '#', 'active' => true],
        ['label' => 'Logout', 'icon' => 'ki-filled ki-exit-right', 'url' => '#'],
    ],

    'metronic.userMenu' => [
        ['label' => 'Notifications', 'icon' => 'ki-filled ki-notification-bing', 'url' => '#'],
    ],

    'metronic.topnav' => [
        ['label' => 'Dashboard', 'url' => ['site/index'], 'active' => true],
        [
            'label' => 'Account',
            'items' => [
                ['label' => 'Profile', 'icon' => 'ki-filled ki-profile-circle', 'url' => '#'],
                ['label' => 'Settings', 'icon' => 'ki-filled ki-setting-2', 'url' => '#'],
            ],
        ],
        ['label' => 'About', 'url' => ['site/about']],
        ['label' => 'Contact', 'url' => ['site/contact']],
    ],

    'metronic.footerLinks' => [
        ['label' => 'Docs', 'url' => '#'],
        ['label' => 'Support', 'url' => '#'],
    ],
];
