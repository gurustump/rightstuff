<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/
 */


add_filter( 'rwmb_meta_boxes', 'right_stuff_register_meta_boxes' );

/**
 * Register meta boxes
 *
 * @return void
 */
function right_stuff_register_meta_boxes( $meta_boxes )
{
	/**
	 * Prefix of meta keys (optional)
	 * Use underscore (_) at the beginning to make keys hidden
	 * Alt.: You also can make prefix empty to disable it
	 */
	// Better has an underscore as last sign
	$prefix = 'right_stuff_';

	// 1st meta box
	$meta_boxes[] = array(
		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
		'id' => 'custom-fields',

		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title' => __( 'Custom Fields', 'rwmb' ),

		// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
		'pages' => array( 'post', 'page' ),

		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context' => 'normal',

		// Order of meta box: high (default), low. Optional.
		'priority' => 'high',

		// Auto save: true, false (default). Optional.
		'autosave' => true,

		// List of meta fields
		'fields' => array(
			// Rank
			array(
				'name' => __( 'Secondary Content', 'rwmb' ),
				'desc' => __( 'Extra content that will appear in a less focal part of the page', 'rwmb' ),
				'id'   => "{$prefix}secondary",
				'type' => 'textarea',
				'cols' => 20,
				'rows' => 3,
			),
			array(
				'name'  => __( 'Rank', 'rwmb' ),
				'id'    => "{$prefix}rank",
				'desc'  => __( 'Ranking for manually ordered lists', 'rwmb' ),
				'type'  => 'number',
				'min'  => 1,
				'step' => 5,
			),
			// PLUPLOAD IMAGE UPLOADS (WP 3.3+)
			array(
				'name' => __( 'Test Images', 'rwmb' ),
				'id'   => "{$prefix}test_image",
				'type' => 'image_advanced',
			),
		),
		'validation' => array(
			'rules' => array(
				"{$prefix}password" => array(
					'required'  => true,
					'minlength' => 7,
				),
			)
		)
	);

	return $meta_boxes;
}


