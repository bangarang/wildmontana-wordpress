<?php

namespace Flynt\Components\SponsorGrid;

use Flynt\FieldVariables;

function getACFLayout()
{
    return [
        'name' => 'SponsorGrid',
        'label' => 'Sponsors Grid',
        'sub_fields' => [
            [
                'label' => __('General', 'flynt'),
                'name' => 'generalTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0
            ],
            [
                'label' => __('Title', 'flynt'),
                'name' => 'preContentHtml',
                'type' => 'wysiwyg',
                'tabs' => 'visual,text',
                'media_upload' => 0,
                'instructions' => __('Want to add a headline? And a paragraph? Go ahead! Or just leave it empty and nothing will be shown.', 'flynt'),
                'delay' => 1,
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
                'sub_fields' => [
                    [
                        'label' => __('Image', 'flynt'),
                        'name' => 'image',
                        'type' => 'image',
                        'preview_size' => 'medium',
                        'instructions' => __('Image-Format: JPG, PNG, SVG.', 'flynt'),
                        'mime_types' => 'jpg,jpeg,png,svg',
                        'wrapper' => [
                            'width' => 40
                        ],
                    ],
                    [
                        'label' => __('Link URL', 'flynt'),
                        'name' => 'link',
                        'type' => 'text',
                    ]
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
                ]
            ]
        ]
    ];
}
