<?php

namespace Flynt\Components\NotificationBanner;

use Flynt\FieldVariables;

function getACFLayout()
{
    return [
        'name' => 'NotificationBanner',
        'label' => 'Notification Banner',
        'sub_fields' => [
            [
                'label' => __('General', 'flynt'),
                'name' => 'generalTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0
            ],
            [
                'label' => __('Message', 'flynt'),
                'name' => 'bannerMessage',
                'type' => 'text'
            ],
            [
                'label' => __('Link URL', 'flynt'),
                'name' => 'linkUrl',
                'type' => 'text'
            ],
            [
                'label' => '',
                'name' => 'options',
                'type' => 'group',
                'layout' => 'row',
                'sub_fields' => [
                    [
                        'label' => __('Theme', 'flynt'),
                        'name' => 'theme',
                        'type' => 'select',
                        'allow_null' => 0,
                        'multiple' => 0,
                        'ui' => 0,
                        'ajax' => 0,
                        'choices' => [
                            '' => __('(none)', 'flynt'),
                            'themeYellow' => __('Cream', 'flynt'),
                            'themeGrey' => __('Grey', 'flynt'),
                            'themeLight' => __('Light', 'flynt'),
                            'themeDark' => __('Dark Blue', 'flynt'),
                            'themeGreen' => __('Green', 'flynt'),
                            'themeTurquoise' => __('Turquoise', 'flynt'),
                        ]
                    ]
                ]
            ]
        ]
    ];
}
