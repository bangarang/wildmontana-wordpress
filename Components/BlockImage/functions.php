<?php

namespace Flynt\Components\BlockImage;

use Flynt\FieldVariables;
use Flynt\Utils\Options;
use Timber\Timber;

const POST_TYPE = 'post';

add_filter('Flynt/addComponentData?name=BlockImage', function ($data) {
    $postType = POST_TYPE;

    $featured = Timber::get_posts([
        'post_status' => 'publish',
        'post_type' => $postType,
        'posts_per_page' => 1,
        'tax_query' => array(
            array(
                'taxonomy' => 'post_tag',
                'field'    => 'slug',
                'terms'    => 'featured'
            )
        ),

    ]);

    $data['featured'] = $featured[0];
    $data['featured_background'] = get_the_post_thumbnail_url( $featured[0]->ID );
    return $data;
});

function getACFLayout()
{
    return [
        'name' => 'blockImage',
        'label' => 'Top Section',
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
                'mime_types' => 'gif,jpg,jpeg,png'
            ],
            [
                'label' => __('Mobile Image', 'flynt'),
                'name' => 'mobile_image',
                'type' => 'image',
                'preview_size' => 'medium',
                'instructions' => __('Image-Format: JPG, PNG, GIF.', 'flynt'),
                'mime_types' => 'gif,jpg,jpeg,png'
            ],
            [
                'label' => __('Horizontal Alignment', 'flynt'),
                'name' => 'horizontal',
                'type' => 'select',
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 0,
                'ajax' => 0,
                'default_value' => 'center',
                'choices' => [
                    'left' => ' Left',
                    'center' => ' Center',
                    'right' => ' Right',
                ],
            ],
            [
                'label' => __('Vertical Alignment', 'flynt'),
                'name' => 'vertical',
                'type' => 'select',
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 0,
                'ajax' => 0,
                'default_value' => 'center',
                'choices' => [
                    'top' => ' Top',
                    'center' => ' Center',
                    'bottom' => ' Bottom',
                ],
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
                        'label' => __('News Center', 'flynt'),
                        'name' => 'news_center',
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
