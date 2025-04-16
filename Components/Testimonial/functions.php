<?php

namespace Flynt\Components\Testimonial;

use Flynt\FieldVariables;

function getACFLayout()
{
    return [
        'name' => 'Testimonial',
        'label' => 'Testimonial',
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
                        'label' => __('Image', 'flynt'),
                        'name' => 'image',
                        'type' => 'image',
                        'preview_size' => 'medium',
                        'instructions' => __('Image-Format: JPG, PNG, GIF.', 'flynt'),
                        'required' => 1,
                    ],
                    [
                        'label' => __('Content', 'flynt'),
                        'name' => 'contentHtml',
                        'type' => 'wysiwyg',
                        'tabs' => 'visual,text',
                        'media_upload' => 0,
                        'delay' => 1,
                    ],
                    [
                        'label' => __('Byline', 'flynt'),
                        'name' => 'byline',
                        'type' => 'text'
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
                         'label' => __('Slider', 'flynt'),
                         'name' => 'slider',
                         'type' => 'true_false',
                         'default_value' => 0,
                         'ui' => 1
                     ]
                ]
            ]
        ]
    ];
}
