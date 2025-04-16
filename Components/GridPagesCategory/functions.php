<?php

namespace Flynt\Components\GridPagesCategory;

use Flynt\FieldVariables;
use Flynt\Utils\Options;
use Timber\Timber;

const POST_TYPE = 'post';

add_filter('Flynt/addComponentData?name=GridPagesCategory', function ($data) {
    $postType = POST_TYPE;

    $data['taxonomies'] = $data['taxonomies'] ?: [];
    // $data['orderby'] = $data['options.orderby'];

    $data['items'] = Timber::get_posts([
        'post_status' => 'publish',
        'post_type' => 'page',
        'category' => join(',', array_map(function ($taxonomy) {
            return $taxonomy->term_id;
        }, $data['taxonomies'])),
        'ignore_sticky_posts' => 1,
        'numberposts' => -1,
        'orderby'=> $data['options']['orderby'],
        'order' => 'ASC',
        'post__not_in' => array(get_the_ID())
    ]);

    $data['postTypeArchiveLink'] = get_post_type_archive_link($postType);

    return $data;
});

function getACFLayout()
{
    return [
        'name' => 'GridPagesCategory',
        'label' => 'Grid: Pages by Category',
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
                'delay' => 1,
                'instructions' => __('Want to add a headline? And a paragraph? Go ahead! Or just leave it empty and nothing will be shown.', 'flynt'),
            ],
            [
                'label' => __('Categories', 'flynt'),
                'name' => 'taxonomies',
                'type' => 'taxonomy',
                'instructions' => __('Select 1 or more categories or leave empty to show from all posts.', 'flynt'),
                'taxonomy' => 'category',
                'field_type' => 'multi_select',
                'allow_null' => 1,
                'multiple' => 1,
                'add_term' => 0,
                'save_terms' => 0,
                'load_terms' => 0,
                'return_format' => 'object'
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
                        'label' => __('Columns', 'flynt'),
                        'name' => 'columns',
                        'type' => 'number',
                        'default_value' => 3,
                        'min' => 2,
                        'max' => 9,
                        'step' => 1
                    ],
                    [
                        'label' => __('Orderby', 'flynt'),
                        'name' => 'orderby',
                        'type' => 'select',
                        'instructions' => __('Pick Orderby.', 'flynt'),
                        'allow_null' => 0,
                        'multiple' => 0,
                        'ui' => 0,
                        'ajax' => 0,
                        'choices' => [
                            'title' => __('Title', 'flynt'),
                            'date' => __('Date', 'flynt'),
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
            ],
        ]
    ];
}

Options::addTranslatable('GridPostsLatest', [
    [
        'label' => __('Labels', 'flynt'),
        'name' => 'labelsTab',
        'type' => 'tab',
        'placement' => 'top',
        'endpoint' => 0
    ],
    [
        'label' => '',
        'name' => 'labels',
        'type' => 'group',
        'sub_fields' => [
            [
                'label' => __('Reading Time', 'flynt'),
                'name' => 'readingTime',
                'type' => 'text',
                'default_value' => 'min',
                'required' => 1,
                'wrapper' => [
                    'width' => 50
                ],
            ],
            [
                'label' => __('All Posts', 'flynt'),
                'name' => 'allPosts',
                'type' => 'text',
                'default_value' => 'See More Posts',
                'required' => 1,
                'wrapper' => [
                    'width' => 50
                ],
            ],
            [
                'label' => __('Read More', 'flynt'),
                'name' => 'readMore',
                'type' => 'text',
                'default_value' => 'Read More',
                'required' => 1,
                'wrapper' => [
                    'width' => 50
                ],
            ]
        ],
    ]
]);
