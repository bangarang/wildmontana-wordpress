<?php

namespace Flynt\Components\BlockVideoOembed;

use Flynt\FieldVariables;
use Flynt\Utils\Oembed;

add_filter('Flynt/addComponentData?name=BlockVideoOembed', function ($data) {
    $data['video'] = Oembed::setSrcAsDataAttribute(
        $data['oembed'],
        [
            'autoplay' => 'true',
            'rel' => 0
        ]
    );

    return $data;
});

function getACFLayout()
{
    return [
        'name' => 'blockVideoOembed',
        'label' => 'Block: Video Oembed',
        'sub_fields' => [
            [
                'label' => __('General', 'flynt'),
                'name' => 'generalTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0
            ],
            [
                'label' => __('Poster Image', 'flynt'),
                'name' => 'posterImage',
                'type' => 'image',
                'preview_size' => 'medium',
                'mime_types' => 'jpg,jpeg,png',
                'instructions' => __('Recommended Size: Min-Width 1920px; Min-Height: 1080px; Image-Format: JPG, PNG. Aspect Ratio 16/9.', 'flynt'),
                'required' => 1
            ],
            [
                'label' => __('Video', 'flynt'),
                'name' => 'oembed',
                'type' => 'oembed',
                'required' => 1
            ],
            [
                'label' => __('Side Content', 'flynt'),
                'name' => 'sideContentTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0
            ],
            [
                'label' => '',
                'name' => 'sideContent',
                'type' => 'group',
                'layout' => 'row',
                'sub_fields' => [
                    [
                        'label' => __('Headline', 'flynt'),
                        'name' => 'headline',
                        'type' => 'text',
                    ],
                    [
                        'label' => __('Content', 'flynt'),
                        'name' => 'contentHtml',
                        'type' => 'wysiwyg',
                        'delay' => 1,
                        'media_upload' => 1,
                        'required' => 1,
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
                    FieldVariables\getTheme(),
                    [
                        'label' => __('Full Width', 'flynt'),
                        'name' => 'full_width',
                        'type' => 'true_false',
                        'default_value' => 0,
                        'ui' => 1
                    ],
                ]
            ]
        ]
    ];
}
