<?php
/*
Template Name: Home Page
*/
?>

<?php get_header(); ?>
			<div id="content">
				<div id="inner-content" class="wrap">
					<div id="main" role="main">
						<ul id="mainTouts">
						<?php 
						$highlight_args = array(
							'numberposts'		=> 3,
							'category_name'		=> 'highlighted',
							'order'				=> 'ASC',
							'orderby'			=> 'meta_value',
							'meta_key'			=> 'right_stuff_rank'
						);
						$mainTouts = get_posts($highlight_args);
						if ( isset($mainTouts[0]) ) { 
							foreach($mainTouts as $key => $tout) {
								$imageCount = count(get_post_meta($tout->ID,'right_stuff_test_image'));
								$randomNum = $imageCount > 1 ? rand(0, $imageCount-1) : 0;
								$imageArray = get_post_meta($tout->ID,'right_stuff_test_image');
								$image = $imageCount > 0 ? wp_get_attachment_image($imageArray[$randomNum],'tout-thumb-528') : get_the_post_thumbnail($tout->ID,'tout-thumb-528');
							?>
							<li class="mainTout_<?php echo $key; ?>">
								<a href="<?php echo get_permalink($tout->ID); ?>">
									<span class="img-wrap"><?php echo $image; ?></span>
									<span class="title-wrap">
										<span class="title"><?php echo $tout->post_title; ?></span>
										<span class="excerpt"><?php echo $tout->post_excerpt; ?></span>
									</span>
								</a>
							</li>
						<?php } } ?>
						</ul>
						<div class="wrap banner-wrap">
							<div class="banner">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/library/images/banners/C011_FII_SitCash_InvestOut_Article_728x90_0511_001.gif" alt="ad" />
								<div class="email-collection">
									<form method="POST" action="http://www.rightstuffdaily.com/sendy/subscribe">
										<fieldset>
											<h3>Want more of the Right Stuff?</h3>
											<p>Put your e-mail in the box</p>
											<input id="sendy_email" type="text" placeholder="E-mail Address" name="email" />
											<input type="hidden" value="Y763rhFDawWba4FV0FGVVYqA" name="list" />
											<span class="btn-container">
												<button class="btn" type="submit">Sign Up</button>
											</span>
										</fieldset>
									</form>
								</div>
							</div>
						</div>
						<div class="featured-posts">
							<ul class="FEATURED_POSTS">
							<?php 
							$featured_posts_per_page = 6;
							$featured_total = count(get_posts(array('category_name'=>'featured','numberposts'=>-1)));
							$featured_args = array(
								'posts_per_page'	=> $featured_posts_per_page,
								'category_name'		=> 'featured'
							);
							$featured_posts = get_posts($featured_args);
							if (isset($featured_posts[0])) {
								foreach($featured_posts as $key => $post) { 
									$imageCount = count(get_post_meta($post->ID,'right_stuff_test_image'));
									$randomNum = $imageCount > 1 ? rand(0, $imageCount-1) : 0;
									$imageArray = get_post_meta($post->ID,'right_stuff_test_image');
									$image = $imageCount > 0 ? wp_get_attachment_image($imageArray[$randomNum], 'tout-thumb-528') : get_the_post_thumbnail($post->ID,'tout-thumb-528');
								?>
								<li class="featured_<?php echo $key; ?>">
									<a href="<?php echo get_permalink($post->ID); ?>">
										<span class="img-wrap"><?php echo $image; ?></span>
										<span class="title-wrap">
											<span class="title"><?php echo $post->post_title; ?></span>
											<span class="excerpt"><?php echo $post->post_excerpt; ?></span>
										</span>
									</a>
								</li>
							<?php } } ?>
							</ul>
							<?php if ($featured_total > $featured_posts_per_page) { ?>
							<div class="featured-pagination">
								<input id="featured_total" type="hidden" value="<?php echo $featured_total; ?>" />
								<a class="show-more SHOW_MORE" href="<?php echo get_bloginfo('url'); ?>/api/get_posts/?category_name=featured&count=6">Load More</a> 
							</div>
							<?php } ?>
						</div>
					</div>
					<div class="content-secondary">
						<?php include 'includes/twt-articles.php'; ?>
						<div class="banner banner300x600">
							<div style="width:100%;height:100%;background:#ccc;">banner ad placeholder</div>
						</div>
					</div>
				</div>
			</div>

<?php get_footer(); ?>
