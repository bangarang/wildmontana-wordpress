<?php

/**
 * Hide password protected posts from listings when using the loop or `get_posts`.
 */

namespace Flynt\HideProtectedPosts;

add_action('pre_get_posts', function ($query) {
    if (!$query->is_singular() && !is_admin()) {
        $query->set('has_password', false);
    }
});


add_action( 'init', function (){
    /*add categories and tags to pages*/
    register_taxonomy_for_object_type('category', 'page');
    register_taxonomy_for_object_type('post_tag', 'page');
});


add_action( 'pre_get_posts', function ( $query ) {
    if ( is_admin() || ! $query->is_main_query() ) {
        return;
    }
    /*view categories and tags archive pages */
    if($query->is_category && $query->is_main_query()){
        $query->set('post_type', array( 'post', 'page'));
    }
    if($query->is_tag && $query->is_main_query()){
        $query->set('post_type', array( 'post', 'page'));
    }
} );
