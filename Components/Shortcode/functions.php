<?php

namespace Flynt\Components\Shortcode;

use Flynt\FieldVariables;

function getACFLayout()
{
    return [
        'name' => 'Shortcode',
        'label' => 'Shortcode',
        'sub_fields' => [
            [
                'label' => __('General', 'flynt'),
                'name' => 'generalTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0
            ],
            [
                'label' => __('The Shortcode', 'flynt'),
                'name' => 'the_shortcode',
                'type' => 'text'
            ],
        ]
    ];
}
