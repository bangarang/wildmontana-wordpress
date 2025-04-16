<?php

/**
 * This is an example file showcasing how you can add custom post types to your Flynt theme.
 *
 * For a full list of parameters see https://developer.wordpress.org/reference/functions/register_post_type/ or use https://generatewp.com/post-type/ to generate the code for you.
 */

namespace Flynt\CustomPostTypes;

function registerPressReleasePostType()
{
    $labels = [
        'name'                  => _x('Press Releases', 'Post Type General Name', 'flynt'),
        'singular_name'         => _x('Press Release', 'Press Release Singular Name', 'flynt'),
        'menu_name'             => __('Press Releases', 'flynt'),
        'name_admin_bar'        => __('Press Release', 'flynt'),
        'archives'              => __('Press Release Archives', 'flynt'),
        'attributes'            => __('Press Release Attributes', 'flynt'),
        'parent_item_colon'     => __('Parent Press Release:', 'flynt'),
        'all_items'             => __('All Press Releases', 'flynt'),
        'add_new_item'          => __('Add New Press Release', 'flynt'),
        'add_new'               => __('Add New', 'flynt'),
        'new_item'              => __('New Press Release', 'flynt'),
        'edit_item'             => __('Edit Press Release', 'flynt'),
        'update_item'           => __('Update Press Release', 'flynt'),
        'view_item'             => __('View Press Release', 'flynt'),
        'view_items'            => __('View Press Releases', 'flynt'),
        'search_items'          => __('Search Press Release', 'flynt'),
        'not_found'             => __('Not found', 'flynt'),
        'not_found_in_trash'    => __('Not found in Trash', 'flynt'),
        'featured_image'        => __('Featured Image', 'flynt'),
        'set_featured_image'    => __('Set featured image', 'flynt'),
        'remove_featured_image' => __('Remove featured image', 'flynt'),
        'use_featured_image'    => __('Use as featured image', 'flynt'),
        'insert_into_item'      => __('Insert into item', 'flynt'),
        'uploaded_to_this_item' => __('Uploaded to this item', 'flynt'),
        'items_list'            => __('Items list', 'flynt'),
        'items_list_navigation' => __('Items list navigation', 'flynt'),
        'filter_items_list'     => __('Filter items list', 'flynt'),
    ];
    $args = [
        'label'                 => __('Press Release', 'flynt'),
        'description'           => __('Press Releases and Media', 'flynt'),
        'labels'                => $labels,
        'supports'              => ['title', 'revisions'],
        'taxonomies'            => ['category', 'post_tag'],
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
        'rewrite' => array('slug' => 'press_release','with_front' => false)
    ];
    register_post_type('press_release', $args);
    // add_filter( 'post_type_link', array(__CLASS__, 'post_type_link'), 10, 2 );

    // // Converts the Structure Tags in our permalink.
    // function post_type_link($url, $post) {
    //     $url = str_replace( "%year%", get_the_date('Y'), $url );
    //     $url = str_replace( "%monthnum%", get_the_date('m'), $url );
    //     return $url;
    // }
}



add_action('init', '\\Flynt\\CustomPostTypes\\registerPressReleasePostType');

