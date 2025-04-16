<?php

namespace Flynt\Components\Staff;

use Flynt\FieldVariables;
use Flynt\Utils\Options;
use Timber\Timber;

const POST_TYPE = 'post';

add_filter('Flynt/addComponentData?name=Staff', function ($data) {
    $users_with_meta = array();
    $staffs = get_users( array( 'meta_key' => 'visible', 'meta_value' => true) );
    usort($staffs, create_function('$a, $b', 'if($a->last_name == $b->last_name) { return 0;} return ($a->last_name > $b->last_name) ? 1 : -1;'));
    foreach($staffs as $user){

        $user_meta_unformatted = get_user_meta ( $user->ID );
        $user_meta = array(
            'first_name' => $user_meta_unformatted['first_name'][0],
            'last_name' => $user_meta_unformatted['last_name'][0],
            'photo' => $user_meta_unformatted['photo'][0],
            'phone' => $user_meta_unformatted['phone'][0],
            'location' => $user_meta_unformatted['location'][0],
            'title' => $user_meta_unformatted['title'][0],
            'email' => $user_meta_unformatted['email'][0],
            'description' => $user_meta_unformatted['description'][0],
            'long_description' => $user_meta_unformatted['long_description'][0],
            'link' => get_author_posts_url($user->ID)
        );
        $users_with_meta[] = $user_meta;
    }

    $data['staffs'] = $users_with_meta;

    return $data;
});

function getACFLayout()
{
    return [
        'name' => 'Staff',
        'label' => 'Staff',
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
                        'min' => 1,
                        'max' => 4,
                        'step' => 1
                    ]
                ]
            ],
        ]
    ];
}
