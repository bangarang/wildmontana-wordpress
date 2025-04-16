<?php

namespace Flynt\Components\BlockForm;

use Flynt\FieldVariables;

function getACFLayout()
{
    return [
        'name' => 'blockForm',
        'label' => 'Block: Gravity Form',
        'sub_fields' => [
            [
                'label' => __('General', 'flynt'),
                'name' => 'generalTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0,
            ],
            [
                'label' => __('Text Alignment', 'flynt'),
                'name' => 'textAlignment',
                'type' => 'button_group',
                'choices' => [
                    'textLeft' => '<i class=\'dashicons dashicons-editor-alignleft\' title=\'Align text left\'></i>',
                    'textCenter' => '<i class=\'dashicons dashicons-editor-aligncenter\' title=\'Align text center\'></i>'
                ]
            ],
            [
                'label' => __('Content', 'flynt'),
                'name' => 'contentHtml',
                'type' => 'wysiwyg',
                'delay' => 1,
                'media_upload' => 0,
                'required' => 1,
            ],
            [
                'label' => __('Gravity Form ID', 'flynt'),
                'name' => 'gravity_form_id',
                'type' => 'text',
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
                        'default_value' => 2,
                        'min' => 1,
                        'max' => 2,
                        'step' => 1
                    ],
                ]
            ]
        ]
    ];
}


/*
*  Populate ACF field (gravity_form_id) with list of gravity forms containing ids
 *************************************************************************************/

//
// //Change gravity_form_id to the name of the ACF select field you want to populate
// add_filter( 'acf/load_field/name=gravity_form_id', function ( $field ) {
//                                                    	 $values = array();
//                                                    	 $forms = GFFormsModel::get_forms();
//
//                                                    	 if ( $forms ) {
//                                                    		 //Add empty option
//                                                    		 $field['choices']["0"] = 'Select a Form';
//
//                                                    		 foreach ( $forms as $form ) {
//                                                    			 $field['choices'][$form->id] = $form->title;
//                                                    		 }
//                                                    	 }
//
//                                                    	 return $field;
//                                                    } );
