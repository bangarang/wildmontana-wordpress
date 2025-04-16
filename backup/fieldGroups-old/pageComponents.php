<?php

use ACFComposer\ACFComposer;
use Flynt\Components;

add_action('Flynt/afterRegisterComponents', function () {
    ACFComposer::registerFieldGroup([
        'name' => 'pageComponents',
        'title' => 'Page Components',
        'style' => 'seamless',
        'fields' => [
            [
                'name' => 'pageComponents',
                'label' => __('Page Components', 'flynt'),
                'type' => 'flexible_content',
                'button_label' => __('Add Component', 'flynt'),
                'layouts' => [
                    Components\Accordion\getACFLayout(),
                    Components\AnnualReport\getACFLayout(),
                    Components\BlockCollapse\getACFLayout(),
                    Components\BlockForm\getACFLayout(),
                    Components\BlockImageGrid\getACFLayout(),
                    Components\BlockImageOld\getACFLayout(),
                    Components\BlockImageText\getACFLayout(),
                    Components\BlockImage\getACFLayout(),
                    Components\BlockVideoOembed\getACFLayout(),
                    Components\BlockWysiwyg\getACFLayout(),
                    Components\CodeBlock\getACFLayout(),
                    Components\Donate\getACFLayout(),
                    Components\GridImageText\getACFLayout(),
                    Components\GridPagesCategory\getACFLayout(),
                    Components\GridPostsLatest\getACFLayout(),
                    Components\ListComponents\getACFLayout(),
                    Components\PDFDownload\getACFLayout(),
                    Components\PressReleasesLatest\getACFLayout(),
                    Components\Quote\getACFLayout(),
                    Components\Shortcode\getACFLayout(),
                    Components\SliderImages\getACFLayout(),
                    Components\Staff\getACFLayout(),
                    Components\Testimonial\getACFLayout(),
                ]
            ]
        ],
        'location' => [
            [
                [
                    'param' => 'post_type',
                    'operator' => '!=',
                    'value' => 'post'
                ],
                [
                    'param' => 'post_type',
                    'operator' => '!=',
                    'value' => 'press_release'
                ]
            ]
        ]
    ]);
});
