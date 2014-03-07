<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js rightstuff"><!--<![endif]-->

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

		<?php // Google Analytics ?>
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

			ga('create', 'UA-6626350-6', 'rightstuffdaily.com');
			ga('send', 'pageview');

		</script>
		<?php // end analytics ?>

		<script type='text/javascript'>
			var googletag = googletag || {};
			googletag.cmd = googletag.cmd || [];
			(function() {
			var gads = document.createElement('script');
			gads.async = true;
			gads.type = 'text/javascript';
			var useSSL = 'https:' == document.location.protocol;
			gads.src = (useSSL ? 'https:' : 'http:') + 
			'//www.googletagservices.com/tag/js/gpt.js';
			var node = document.getElementsByTagName('script')[0];
			node.parentNode.insertBefore(gads, node);
			})();
		</script>
		
		 <script type='text/javascript'>
			googletag.cmd.push(function() {
				var gtpHomeMapping = googletag.sizeMapping().
				addSize([768,576], [728,90]).
				addSize([480,320], [468,60]).
				addSize([240,180], [234,60]).
				addSize([0,0], [88,31]).
				build();
				
				googletag.defineSlot('/5856/Network/Rightstuff_Home', [728, 90], 'div-gpt-ad-1393442769970-0').
				defineSizeMapping(gtpHomeMapping).
				addService(googletag.pubads());
				googletag.enableServices();
			});
		</script>

		<?php /* <script type='text/javascript'>
			googletag.cmd.push(function() {
			googletag.defineSlot('/5856/Network/Rightstuff_Home', [728, 90], 'div-gpt-ad-1393442769970-0').addService(googletag.pubads());
			googletag.pubads().enableSingleRequest();
			googletag.enableServices();
			});
		</script> */ ?>

		<script type='text/javascript'>
			googletag.cmd.push(function() {
			googletag.defineSlot('/5856/Network/Rightstuff_Article', [300, 250], 'div-gpt-ad-1393442636050-0').addService(googletag.pubads());
			googletag.pubads().enableSingleRequest();
			googletag.enableServices();
			});
		</script>

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
