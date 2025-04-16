<?php

use ACFComposer\ACFComposer;
use Flynt\Components;

add_action('Flynt/afterRegisterComponents', function () {
    ACFComposer::registerFieldGroup([
        'name' => 'postComponents',
        'title' => 'Post Components',
        'style' => 'seamless',
        'fields' => [
            [
                'name' => 'postComponents',
                'label' => __('Post Components', 'flynt'),
                'type' => 'flexible_content',
                'button_label' => __('Add Component', 'flynt'),
                'layouts' => [
                    Components\Accordion\getACFLayout(),
                    Components\BlockCollapse\getACFLayout(),
                    Components\BlockImageOld\getACFLayout(),
                    Components\BlockImageGrid\getACFLayout(),
                    Components\Donate\getACFLayout(),
                    Components\BlockImageText\getACFLayout(),
                    Components\BlockVideoOembed\getACFLayout(),
                    Components\BlockForm\getACFLayout(),
                    Components\BlockWysiwyg\getACFLayout(),
                    Components\GridImageText\getACFLayout(),
                    Components\GridPostsLatest\getACFLayout(),
                    Components\ListComponents\getACFLayout(),
                    Components\SliderImages\getACFLayout(),
                    Components\PressReleasesLatest\getACFLayout(),
                    Components\Quote\getACFLayout(),
                    Components\CodeBlock\getACFLayout(),
                ],
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'post',
                ],
            ],
            [
                [
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'press_release',
                ],
            ],
        ],
    ]);
});
