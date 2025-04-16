<?php

namespace Flynt\Components\BlockImageGrid;

use Flynt\FieldVariables;

function getACFLayout()
{
    return [
        'name' => 'blockImageGrid',
        'label' => 'Block: Image Grid',
        'sub_fields' => [
            [
                'label' => __('General', 'flynt'),
                'name' => 'generalTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0,
            ],
            [
                'label' => __('Image 1', 'flynt'),
                'name' => 'imageOne',
                'type' => 'image',
                'preview_size' => 'medium',
                'instructions' => __('Image-Format: JPG, PNG, GIF, SVG.', 'flynt'),
                'required' => 1,
                'mime_types' => 'gif,jpg,jpeg,png'
            ],
            [
                'label' => __('Image 2', 'flynt'),
                'name' => 'imageTwo',
                'type' => 'image',
                'preview_size' => 'medium',
                'instructions' => __('Image-Format: JPG, PNG, GIF.', 'flynt'),
                'required' => 1,
                'mime_types' => 'gif,jpg,jpeg,png'
            ],
            [
                'label' => __('Image 3', 'flynt'),
                'name' => 'imageThree',
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
                    FieldVariables\getWidth(),
                    // [
                    //     'label' => __('Size', 'flynt'),
                    //     'name' => 'size',
                    //     'type' => 'radio',
                    //     'other_choice' => 0,
                    //     'save_other_choice' => 0,
                    //     'layout' => 'horizontal',
                    //     'choices' => [
                    //         'sizeSmall' => __('Small', 'flynt'),
                    //         'sizeMedium' => __('Medium', 'flynt'),
                    //         'sizeLarge' => __('Large (Default)', 'flynt)'),
                    //         'sizeHuge' => __('Huge', 'flynt'),
                    //         'sizeFull' => __('Full', 'flynt'),
                    //     ],
                    //     'default_value' => 'sizeLarge',
                    //     'wrapper' =>  [
                    //         'width' => '100',
                    //     ],
                    // ],
                    [
                        'label' => __('No Margin', 'flynt'),
                        'name' => 'no_margin',
                        'type' => 'true_false',
                        'default_value' => 0,
                        'ui' => 1
                    ]

                ]
            ]
        ]
    ];
}
