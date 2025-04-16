<?php

namespace Flynt\Components\AnnualReport;

use Flynt\FieldVariables;

function getACFLayout()
{
    return [
        'name' => 'AnnualReport',
        'label' => 'Annual Report',
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
                'label' => __('Headline', 'flynt'),
                'name' => 'headline',
                'type' => 'text'
            ],
            [
                'label' => __('Secondary Headline', 'flynt'),
                'name' => 'secondary_headline',
                'type' => 'text'
            ],
            [
                'label' => __('Content', 'flynt'),
                'name' => 'content',
                'type' => 'wysiwyg',
                'tabs' => 'visual,text',
                'media_upload' => 0,
                'instructions' => __('Want to add a headline? And a paragraph? Go ahead! Or just leave it empty and nothing will be shown.', 'flynt'),
                'delay' => 1,
            ],
            [
                'label' => __('Annual Reports', 'flynt'),
                'name' => 'annual_reports',
                'type' => 'repeater',
                'collapsed' => '',
                'layout' => 'block',
                'button_label' => 'Add',
                'sub_fields' => [
                    [
                        'label' => __('Report Name', 'flynt'),
                        'name' => 'report_name',
                        'type' => 'text'
                    ],
                    [
                        'label' => __('PDF', 'flynt'),
                        'name' => 'pdf_image',
                        'type' => 'file',
                        'instructions' => __('Format: PDF', 'flynt'),
                        'required' => 1,
                        'mime_types' => 'pdf'
                    ],
                ],
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
                        'label' => __('Report Icons', 'flynt'),
                        'name' => 'report_icons',
                        'type' => 'true_false',
                        'default_value' => 0,
                        'ui' => 1
                    ]
                ]
            ]
        ]
    ];
}
