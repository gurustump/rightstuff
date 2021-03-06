<?php
/* Bones TWT Article Type Example
This page walks you through creating 
a custom post type and taxonomies. You
can edit this one or copy the following code 
to create another one. 

I put this in a separate file so as to 
keep it organized. I find it easier to edit
and change things if they are concentrated
in their own file.

Developed by: Eddie Machado
URL: http://themble.com/bones/
*/

// Flush rewrite rules for custom post types
add_action( 'after_switch_theme', 'bones_flush_rewrite_rules' );

// Flush your rewrite rules
function bones_flush_rewrite_rules() {
	flush_rewrite_rules();
}

function twt_article_post_type() { 
	// creating (registering) the custom type 
	register_post_type( 'twt_article', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
		// let's now add all the options for this post type
		array( 
			'labels' => 
			array(
				'name' => __( 'TWT Articles', 'bonestheme' ), /* This is the Title of the Group */
				'singular_name' => __( 'TWT Article', 'bonestheme' ), /* This is the individual type */
				'all_items' => __( 'All TWT Articles', 'bonestheme' ), /* the all items menu item */
				'add_new' => __( 'Add New', 'bonestheme' ), /* The add new menu item */
				'add_new_item' => __( 'Add New TWT Article', 'bonestheme' ), /* Add New Display Title */
				'edit' => __( 'Edit', 'bonestheme' ), /* Edit Dialog */
				'edit_item' => __( 'Edit TWT Article', 'bonestheme' ), /* Edit Display Title */
				'new_item' => __( 'New TWT Article', 'bonestheme' ), /* New Display Title */
				'view_item' => __( 'View TWT Article', 'bonestheme' ), /* View Display Title */
				'search_items' => __( 'Search TWT Articles', 'bonestheme' ), /* Search Custom Type Title */ 
				'not_found' =>  __( 'Nothing found in the Database.', 'bonestheme' ), /* This displays if there are no entries yet */ 
				'not_found_in_trash' => __( 'Nothing found in Trash', 'bonestheme' ), /* This displays if there is nothing in the trash */
				'parent_item_colon' => ''
			),
			'description' => __( 'Washington Post Articles', 'bonestheme' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon.png', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'twt_article', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'twt_article', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky')
		) /* end of options */
	); /* end of register post type */
}

// adding the function to the Wordpress init
add_action( 'init', 'twt_article_post_type');

/*
for more information on taxonomies, go here:
http://codex.wordpress.org/Function_Reference/register_taxonomy
*/

// now let's add custom categories (these act like categories)
register_taxonomy( 'twt_cat', 
	array('twt_article'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
	array('hierarchical' => true,     /* if this is true, it acts like categories */
		'labels' => array(
			'name' => __( 'TWT Categories', 'bonestheme' ), /* name of the custom taxonomy */
			'singular_name' => __( 'TWT Category', 'bonestheme' ), /* single taxonomy name */
			'search_items' =>  __( 'Search TWT Categories', 'bonestheme' ), /* search title for taxomony */
			'all_items' => __( 'All TWT Categories', 'bonestheme' ), /* all title for taxonomies */
			'parent_item' => __( 'Parent TWT Category', 'bonestheme' ), /* parent title for taxonomy */
			'parent_item_colon' => __( 'Parent TWT Category:', 'bonestheme' ), /* parent taxonomy title */
			'edit_item' => __( 'Edit TWT Category', 'bonestheme' ), /* edit custom taxonomy title */
			'update_item' => __( 'Update TWT Category', 'bonestheme' ), /* update title for taxonomy */
			'add_new_item' => __( 'Add New TWT Category', 'bonestheme' ), /* add new title for taxonomy */
			'new_item_name' => __( 'New TWT Category Name', 'bonestheme' ) /* name title for taxonomy */
		),
		'show_admin_column' => true, 
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'twt-slug' ),
	)
);

// now let's add custom tags (these act like categories)
register_taxonomy( 'twt_tag', 
	array('twt_article'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
	array('hierarchical' => false,    /* if this is false, it acts like tags */
		'labels' => array(
			'name' => __( 'TWT Tags', 'bonestheme' ), /* name of the custom taxonomy */
			'singular_name' => __( 'TWT Tag', 'bonestheme' ), /* single taxonomy name */
			'search_items' =>  __( 'Search TWT Tags', 'bonestheme' ), /* search title for taxomony */
			'all_items' => __( 'All TWT Tags', 'bonestheme' ), /* all title for taxonomies */
			'parent_item' => __( 'Parent TWT Tag', 'bonestheme' ), /* parent title for taxonomy */
			'parent_item_colon' => __( 'Parent TWT Tag:', 'bonestheme' ), /* parent taxonomy title */
			'edit_item' => __( 'Edit TWT Tag', 'bonestheme' ), /* edit custom taxonomy title */
			'update_item' => __( 'Update TWT Tag', 'bonestheme' ), /* update title for taxonomy */
			'add_new_item' => __( 'Add New TWT Tag', 'bonestheme' ), /* add new title for taxonomy */
			'new_item_name' => __( 'New TWT Tag Name', 'bonestheme' ) /* name title for taxonomy */
		),
		'show_admin_column' => true,
		'show_ui' => true,
		'query_var' => true,
	)
);

function module_post_type() { 
	// creating (registering) the custom type 
	register_post_type( 'module', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
		// options for this post type
		array( 
			'labels' => 
			array(
				'name' => __( 'Modules', 'bonestheme' ), /* This is the Title of the Group */
				'singular_name' => __( 'Module', 'bonestheme' ), /* This is the individual type */
				'all_items' => __( 'All Modules', 'bonestheme' ), /* the all items menu item */
				'add_new' => __( 'Add New', 'bonestheme' ), /* The add new menu item */
				'add_new_item' => __( 'Add New Module', 'bonestheme' ), /* Add New Display Title */
				'edit' => __( 'Edit', 'bonestheme' ), /* Edit Dialog */
				'edit_item' => __( 'Edit Module', 'bonestheme' ), /* Edit Display Title */
				'new_item' => __( 'New Module', 'bonestheme' ), /* New Display Title */
				'view_item' => __( 'View Module', 'bonestheme' ), /* View Display Title */
				'search_items' => __( 'Search Modules', 'bonestheme' ), /* Search Custom Type Title */ 
				'not_found' =>  __( 'You have NOOOOOOOO Modules.', 'bonestheme' ), /* This displays if there are no entries yet */ 
				'not_found_in_trash' => __( 'Nothing found in Trash', 'bonestheme' ), /* This displays if there is nothing in the trash */
				'parent_item_colon' => ''
			),
			'description' => __( 'Custom Modules', 'bonestheme' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon.png', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'module', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => false, /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky')
		) /* end of options */
	); /* end of register post type */
}

// adding the function to the Wordpress init
add_action( 'init', 'module_post_type');

?>
