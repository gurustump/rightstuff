<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">

		<?php // Google Chrome Frame for IE ?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title><?php bloginfo('name').wp_title(' - '); ?></title>

		<?php // mobile meta (hooray!) ?>
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		
		<?php // Facebook Open Graph tags ?>
		<meta property="og:title" content="<?php wp_title(''); ?>"/>
		<meta property="og:site_name" content="<?php bloginfo('name'); ?>"/>
		<meta property="og:description" content="<?php bloginfo('description'); ?>"/>
		<?php $shareURL = is_category() ? get_category_link(get_query_var('cat')) : get_permalink($post->ID); ?>
		<meta property="og:url" content="<?php echo $shareURL; ?>"/>
		<?php $shareImagePostThumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'share-1200' ); ?>
		<?php $shareImage = is_single() ? $shareImagePostThumb[0] : get_stylesheet_directory_uri().'/library/images/Logo-share-1200x675.png' ?>
		<meta property="og:image" content="<?php echo $shareImage; ?>"/>
	



		<?php // icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) ?>
		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-icon-touch.png">
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
		<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<![endif]-->
		<?php // or, set /favicon.ico for IE10 win ?>
		<meta name="msapplication-TileColor" content="#f01d4f">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php // wordpress head functions ?>
		<?php wp_head(); ?>
		<?php // end of wordpress head ?>

		<?php // drop Google Analytics Here ?>
		<?php // end analytics ?>

	</head>

	<body <?php body_class(); ?>>
		<div id="container">

			<header class="header" role="banner">

				<div id="inner-header" class="wrap">

					<?php // to use a image just replace the bloginfo('name') with your img src and remove the surrounding <p> ?>
					<p id="logo" class="h1"><a href="<?php echo home_url(); ?>" rel="nofollow"><?php bloginfo('name'); ?></a></p>

					<?php // if you'd like to use the site description you can un-comment it below ?>
					<?php // bloginfo('description'); ?>


					<a class="nav-activator">Navigation</a>
					<div class="nav-wrap NAV_WRAP">
						<nav role="navigation">
							<?php bones_main_nav(); ?>
						</nav>
						<a class="search-show SEARCH_SHOW">Show Search Form</a>
						<?php get_search_form(); ?>
					</div>
				</div>

			</header>
