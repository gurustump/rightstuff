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
						$touts_args = array(
							'numberposts'		=> 3,
							'category_name'		=> 'main-touts',
							'order'				=> 'ASC',
							'orderby'			=> 'meta_value',
							'meta_key'			=> 'right_stuff_rank'
						);
						$mainTouts = get_posts($touts_args);
						if ( isset($mainTouts[0]) ) { 
							foreach($mainTouts as $key => $tout) {
								$imageCount = count(get_post_meta($tout->ID,'right_stuff_test_image'));
								$randomNum = $imageCount > 1 ? rand(0, $imageCount-1) : 0;
								$imageArray = get_post_meta($tout->ID,'right_stuff_test_image');
								$image = $imageCount > 0 ? wp_get_attachment_image($imageArray[$randomNum], array(525,380)) : get_the_post_thumbnail($tout->ID, array(525,380));
							?>
							<li class="mainTout_<?php echo $key; ?>">
								<a href="<?php echo get_permalink($tout->ID); ?>">
									<?php echo $image; ?>
									<span class="title-wrap">
										<span class="title"><?php echo $tout->post_title; ?></span>
										<span class="excerpt"><?php echo $tout->post_excerpt; ?></span>
									</span>
								</a>
							</li>
						<?php } } ?>
						</ul>
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
									$randomNum = (count(get_post_meta($post->ID,'right_stuff_test_image') > 1)) ? rand(0, count(get_post_meta($post->ID,'right_stuff_test_image'))-1) : 0;
									$imageArray = get_post_meta($post->ID,'right_stuff_test_image');
									$image = $imageCount > 0 ? wp_get_attachment_image($imageArray[$randomNum], array(525,380)) : get_the_post_thumbnail($post->ID, array(525,380));
								?>
								<li class="featured_<?php echo $key; ?>">
									<a href="<?php echo get_permalink($post->ID); ?>">
										<?php echo $image; ?>
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
								<a class="show-more SHOW_MORE" href="<?php echo get_bloginfo('url'); ?>/api/get_posts/?category_name=featured&count=6">Show More</a> 
							</div>
							<?php } ?>
						</div>
					</div>
					<div class="content-secondary">
						<h2>The Washington Times</h2>
						<ul class="twt-posts">
						<?php 
						$twt_args = array(
							'numberposts'	=> 3,
							'post_type'		=> 'twt_article'
						);
						$twtPosts = get_posts($twt_args);
						if ( isset($twtPosts[0]) ) { 
							foreach($twtPosts as $key => $post) { ?>
							<li class="twt_<?php echo $key; ?>">
								<a href="<?php echo get_permalink($post->ID); ?>">
									<?php echo get_the_post_thumbnail($post->ID, array(200,150)); ?>
									<span class="title-wrap">
										<span class="title"><?php echo $post->post_title; ?></span>
										<span class="excerpt"><?php echo $post->post_content; ?></span>
									</span>
								</a>
							</li>
						<?php } } ?>
						
						</ul>
					</div>
				</div>
			</div>

<?php get_footer(); ?>
