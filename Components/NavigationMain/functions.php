<?php

namespace Flynt\Components\NavigationMain;

use Timber;
use Flynt\Utils\Asset;

add_action('init', function () {
    register_nav_menus([
        'navigation_main' => __('Navigation Main', 'flynt'),
        'our_work_menu' => __('Our Work', 'flynt'),
        'discover_menu' => __('Discover', 'flynt'),
        'get_involved_menu' => __('Get Involved', 'flynt'),
        'about_menu' => __('About', 'flynt'),
        'sub_menu' => __('Sub-Menu', 'flynt')
    ]);
});

add_filter('Flynt/addComponentData?name=NavigationMain', function ($data) {
    $data['menu'] = new Timber\Menu('navigation_main');
    $data['our_work'] = new Timber\Menu('our_work_menu');
    $data['discover'] = new Timber\Menu('discover_menu');
    $data['get_involved'] = new Timber\Menu('get_involved_menu');
    $data['about'] = new Timber\Menu('about_menu');
    $data['sub_menu'] = new Timber\Menu('sub_menu');
    
    $data['logo'] = [
        'src' => get_theme_mod('custom_header_logo') ? get_theme_mod('custom_header_logo') : Asset::requireUrl('Components/NavigationMain/Assets/logo.svg'),
        'alt' => get_bloginfo('name')
    ];

    return $data;
});
