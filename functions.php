<?php

/**
 *  Add API Endpoint
 **/

add_action('rest_api_init', 'api_init' );

function api_init(){
	register_rest_route( 'img', '/(?P<id>\d+)', array(
		'methods' => 'GET',
		'callback' => 'return_img_by_id'
	) );
}

function return_img_by_id( $data ){
	return wp_get_attachment_image_src($data['id'],'full')[0];
}

/**
 *  Register ACF Fields
 */

add_action( 'acf/init', 'register_fields' );

function register_fields(){
	acf_add_local_field_group(array (
		'key' => 'group_57563450afcc6',
		'title' => 'Mockup Options',
		'fields' => array (
			array (
				'key' => 'field_5756345daef29',
				'label' => 'Rows',
				'name' => 'rows',
				'type' => 'repeater',
				'instructions' => '',
				'required' => 1,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'collapsed' => '',
				'min' => '',
				'max' => '',
				'layout' => 'table',
				'button_label' => 'Add Row',
				'sub_fields' => array (
					array (
						'key' => 'field_5756348baef2a',
						'label' => 'Options',
						'name' => 'options',
						'type' => 'gallery',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array (
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'min' => '',
						'max' => '',
						'preview_size' => 'thumbnail',
						'insert' => 'append',
						'library' => 'all',
						'min_width' => '',
						'min_height' => '',
						'min_size' => '',
						'max_width' => '',
						'max_height' => '',
						'max_size' => '',
						'mime_types' => '',
					),
				),
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => array (
			0 => 'permalink',
			1 => 'the_content',
			2 => 'excerpt',
			3 => 'custom_fields',
			4 => 'discussion',
			5 => 'comments',
			6 => 'revisions',
			7 => 'slug',
			8 => 'author',
			9 => 'format',
			10 => 'page_attributes',
			11 => 'featured_image',
			12 => 'categories',
			13 => 'tags',
			14 => 'send-trackbacks',
		),
		'active' => 1,
		'description' => '',
	));
}
