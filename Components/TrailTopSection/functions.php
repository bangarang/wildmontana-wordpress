<?php

namespace Flynt\Components\TrailTopSection;

use Flynt\FieldVariables;

function getACFLayout()
{
    return [
        'name' => 'trailTopSection',
        'label' => 'TrailTopSection',
        'sub_fields' => [
            [
                'label' => __('General', 'flynt'),
                'name' => 'generalTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0,
            ],
            [
                'label' => __('Image', 'flynt'),
                'name' => 'image',
                'type' => 'image',
                'preview_size' => 'medium',
                'instructions' => __('Image-Format: JPG, PNG, GIF.', 'flynt'),
                'required' => 1,
                'mime_types' => 'gif,jpg,jpeg,png'
            ],
            [
                'label' => __('Headline', 'flynt'),
                'name' => 'headline',
                'type' => 'text'
            ],
            [
                'label' => __('SubHeadline', 'flynt'),
                'name' => 'subheadline',
                'type' => 'text'
            ],
            [
                'label' => __('Text Alignment', 'flynt'),
                'name' => 'textAlignment',
                'type' => 'button_group',
                'choices' => [
                    'textLeft' => '<i class=\'dashicons dashicons-editor-alignleft\' title=\'Align text left\'></i>',
                    'textCenter' => '<i class=\'dashicons dashicons-editor-aligncenter\' title=\'Align text center\'></i>',
                    'textRight' => '<i class=\'dashicons dashicons-editor-alignright\' title=\'Align text right\'></i>'
                ]
            ],

            [
                'label' => __('Options', 'flynt'),
                'name' => 'optionsTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0
            ],
            [
                'label' => '',
                'name' => 'options',
                'type' => 'group',
                'layout' => 'row',
                'sub_fields' => [
                    FieldVariables\getTheme(),
                    [
                        'label' => __('No Margin', 'flynt'),
                        'name' => 'no_margin',
                        'type' => 'true_false',
                        'default_value' => 0,
                        'ui' => 1
                    ],
                     [
                         'label' => __('Solid Color Background', 'flynt'),
                         'name' => 'solid_color_background',
                         'type' => 'true_false',
                         'default_value' => 0,
                         'ui' => 1
                     ]
                ]
            ],
            [
                'label' => __('Notification', 'flynt'),
                'name' => 'notificationTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0,
            ],
            [
                'label' => __('Active', 'flynt'),
                'name' => 'notificationActive',
                'type' => 'true_false',
                'default_value' => 0,
                'ui' => 1
            ],
            [
                'label' => __('Headline', 'flynt'),
                'name' => 'notificationHeadline',
                'type' => 'text'
            ],
            [
                'label' => __('Description', 'flynt'),
                'name' => 'notificationDescription',
                'type' => 'text'
            ],
             [
                 'label' => __('Link Text', 'flynt'),
                 'name' => 'notificationLinkText',
                 'type' => 'text'
             ],
             [
                 'label' => __('Link', 'flynt'),
                 'name' => 'notificationLink',
                 'type' => 'text'
             ],
        ]
    ];
}
