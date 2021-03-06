<?php
/*
Author: Eddie Machado
URL: htp://themble.com/bones/

This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images,
sidebars, comments, ect.
*/

/************* INCLUDE NEEDED FILES ***************/

/*
1. library/bones.php
	- head cleanup (remove rsd, uri links, junk css, ect)
	- enqueueing scripts & styles
	- theme support functions
	- custom menu output & fallbacks
	- related post function
	- page-navi function
	- removing <p> from around images
	- customizing the post excerpt
	- custom google+ integration
	- adding custom fields to user profiles
*/
require_once( 'library/bones.php' ); // if you remove this, bones will break
/*
2. library/custom-post-type.php
	- an example custom post type
	- example custom taxonomy (like categories)
	- example custom taxonomy (like tags)
*/
require_once( 'library/custom-post-types.php' ); // you can disable this if you like
/*
3. library/admin.php
	- removing some default WordPress dashboard widgets
	- an example custom dashboard widget
	- adding custom login css
	- changing text in footer of admin
*/
// require_once( 'library/admin.php' ); // this comes turned off by default
/*
4. library/translation/translation.php
	- adding support for other languages
*/
// require_once( 'library/translation/translation.php' ); // this comes turned off by default

/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size( 'bones-thumb-600', 600, 150, true );
add_image_size( 'bones-thumb-300', 300, 100, true );
add_image_size( 'tout-thumb-528', 528, 297, true );
add_image_size( 'sidebar-thumb-300', 300, 200, true );
add_image_size( 'share-1200', 1200, 675, true );

/*
to add more sizes, simply copy a line from above
and change the dimensions & name. As long as you
upload a "featured image" as large as the biggest
set width or height, all the other sizes will be
auto-cropped.

To call a different size, simply change the text
inside the thumbnail function.

For example, to call the 300 x 300 sized image,
we would use the function:
<?php the_post_thumbnail( 'bones-thumb-300' ); ?>
for the 600 x 100 image:
<?php the_post_thumbnail( 'bones-thumb-600' ); ?>

You can change the names and dimensions to whatever
you like. Enjoy!
*/

add_filter( 'image_size_names_choose', 'bones_custom_image_sizes' );

function bones_custom_image_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'bones-thumb-600' => __('600px by 150px'),
        'bones-thumb-300' => __('300px by 100px'),
    ) );
}

/*
The function above adds the ability to use the dropdown menu to select 
the new images sizes you have just created from within the media manager 
when you add media to your content blocks. If you add more image sizes, 
duplicate one of the lines in the array and name it according to your 
new image size.
*/

/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function bones_register_sidebars() {

	register_sidebar(array(
		'id' => 'after_post',
		'name' => __( 'After Post Widgets', 'bonestheme' ),
		'description' => __( 'To be added after posts on single pages', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	/*
	to add more sidebars or widgetized areas, just copy
	and edit the above sidebar code. In order to call
	your new sidebar just use the following code:

	Just change the name to whatever your new
	sidebar's id is, for example:

	register_sidebar(array(
		'id' => 'sidebar2',
		'name' => __( 'Sidebar 2', 'bonestheme' ),
		'description' => __( 'The second (secondary) sidebar.', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	To call the sidebar in your template, you can just copy
	the sidebar.php file and rename it to your sidebar's name.
	So using the above example, it would be:
	sidebar-sidebar2.php

	*/
} // don't remove this bracket!

/************* COMMENT LAYOUT *********************/

// Comment Layout
function bones_comments( $comment, $args, $depth ) {
   $GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?>>
		<article id="comment-<?php comment_ID(); ?>" class="clearfix">
			<header class="comment-author vcard">
				<?php
				/*
					this is the new responsive optimized comment image. It used the new HTML5 data-attribute to display comment gravatars on larger screens only. What this means is that on larger posts, mobile sites don't have a ton of requests for comment images. This makes load time incredibly fast! If you'd like to change it back, just replace it with the regular wordpress gravatar call:
					echo get_avatar($comment,$size='32',$default='<path_to_url>' );
				*/
				?>
				<?php // custom gravatar call ?>
				<?php
					// create variable
					$bgauthemail = get_comment_author_email();
				?>
				<img data-gravatar="http://www.gravatar.com/avatar/<?php echo md5( $bgauthemail ); ?>?s=32" class="load-gravatar avatar avatar-48 photo" height="32" width="32" src="<?php echo get_template_directory_uri(); ?>/library/images/nothing.gif" />
				<?php // end custom gravatar call ?>
				<?php printf(__( '<cite class="fn">%s</cite>', 'bonestheme' ), get_comment_author_link()) ?>
				<time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time(__( 'F jS, Y', 'bonestheme' )); ?> </a></time>
				<?php edit_comment_link(__( '(Edit)', 'bonestheme' ),'  ','') ?>
			</header>
			<?php if ($comment->comment_approved == '0') : ?>
				<div class="alert alert-info">
					<p><?php _e( 'Your comment is awaiting moderation.', 'bonestheme' ) ?></p>
				</div>
			<?php endif; ?>
			<section class="comment_content clearfix">
				<?php comment_text() ?>
			</section>
			<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
		</article>
	<?php // </li> is added by WordPress automatically ?>
<?php
} // don't remove this bracket!

/************* SEARCH FORM LAYOUT *****************/

// Search Form
function bones_wpsearch($form) {
	$form = '<form role="search" method="get" class="search-form SEARCH_FORM" action="' . home_url( '/' ) . '" >
	<input type="search" value="' . get_search_query() . '" name="s" placeholder="' . esc_attr__( 'Search...', 'bonestheme' ) . '" />
	<span class="btn-container"><button class="btn" type="submit">Search</button></span>
	</form>';
	return $form;
} // don't remove this bracket!

function wpa_category_nav_class( $classes, $item ){
	if( 'category' == $item->object ){
		$category = get_category( $item->object_id );
		$classes[] = 'MENU_' . strtoupper($category->slug);
	}
	return $classes;
}
add_filter( 'nav_menu_css_class', 'wpa_category_nav_class', 10, 2 );

// wrap the_content in a div
function content_wrapper($content) {
	return '<div class="post-content-wrap">'.$content.'</div>';
}
add_filter( 'the_content', 'content_wrapper');

// limit number of words in excerpts
function rs_excerpt_length($length) {
	return 25;
}
add_filter('excerpt_length', 'rs_excerpt_length');

// Meta Box setup (works only with plugin)
include 'includes/meta-box.php';

// ad placement function
function ad_placement($slug) {
	$ad_args = array(
		'numberposts'	=> 1,
		'post_type'		=> 'module',
		'name'		=> $slug
	);
	$ads = get_posts($ad_args);
	if ( isset($ads[0]) ) { 
		foreach($ads as $key => $ad) { 
			echo $ad->post_content;
		}
	}
}

// shortcodes
function img_overlay_shortcode($atts) {
	extract( shortcode_atts( array(
		'src' => '',
		'align' => 'none',
		'width' => '200',
		'height' => '300',
		'title' => ''
	), $atts ) );
	
	$overlayActivator = '';
	$overlayActivator .= '<div class="overlay-activator align-'.$align.' OVERLAY_ACTIVATOR" style="width:'.$width.'px;height:'.$height.'px;">';
	$overlayActivator .= '<img src="'.$src.'" title="'.$title.'" />';
	$overlayActivator .= '<span>View full size</span><div class="fade"></div></div>';
	return $overlayActivator;
}
add_shortcode('img_overlay','img_overlay_shortcode');

// admin css
add_action('admin_head', 'custom_admin_css');
function custom_admin_css() {
	echo '<link rel="stylesheet" href="';
	echo get_stylesheet_directory_uri();
	echo'/library/css/admin.css" type="text/css" media="all" />';
}
/*
add_filter('language_attributes', 'add_og_xml_ns');
function add_og_xml_ns($content) {
	return ' xmlns:og="http://ogp.me/ns#" ' . $content;
}
add_filter('language_attributes', 'add_fb_xml_ns');
function add_fb_xml_ns($content) {
	return ' xmlns:fb="https://www.facebook.com/2008/fbml" ' . $content;
}
*/
?>
