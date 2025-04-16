<?php

namespace Flynt\Components\CodeBlock;

use Flynt\FieldVariables;

function getACFLayout()
{
    return [
        'name' => 'codeBlock',
        'label' => 'Block: Code',
        'sub_fields' => [
            [
                'label' => __('Code Block', 'flynt'),
                'name' => 'code_block',
                'type' => 'textarea',
            ],
        ]
    ];
}
