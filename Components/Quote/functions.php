<?php

namespace Flynt\Components\Quote;

use Flynt\FieldVariables;

function getACFLayout()
{
    return [
        'name' => 'Quote',
        'label' => 'Quote',
        'sub_fields' => [
            [
                'label' => __('General', 'flynt'),
                'name' => 'generalTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0
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
                'label' => __('Items', 'flynt'),
                'name' => 'items',
                'type' => 'repeater',
                'collapsed' => '',
                'layout' => 'block',
                'button_label' => 'Add',
                'max' => 5,
                'sub_fields' => [
                    [
                        'label' => __('Content', 'flynt'),
                        'name' => 'contentHtml',
                        'type' => 'wysiwyg',
                        'tabs' => 'visual,text',
                        'media_upload' => 0,
                        'delay' => 1,
                    ],
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
                            'themeLight' => __('Light', 'flynt'),
                            'themeDark' => __('Dark', 'flynt'),
                        ]
                    ],
                     [
                         'label' => __('Quote Styling', 'flynt'),
                         'name' => 'quote_styling',
                         'type' => 'true_false',
                         'default_value' => 1,
                         'ui' => 1
                     ],
                     [
                         'label' => __('Slider', 'flynt'),
                         'name' => 'slider',
                         'type' => 'true_false',
                         'default_value' => 0,
                         'ui' => 1
                     ],
                     [
                         'label' => __('Autoplay', 'flynt'),
                         'name' => 'autoplay',
                         'type' => 'true_false',
                         'default_value' => 0,
                         'ui' => 1
                     ],
                     [
                         'label' => __('Delay', 'flynt'),
                         'name' => 'delay',
                         'type' => 'number',
                         'default_value' => 5000,
                         'min' => 150,
                         'step' => 50
                     ],
                ]
            ]
        ]
    ];
}
