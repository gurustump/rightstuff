				<div id="sidebar" class="sidebar" role="complementary">
					<?php if (is_category('news')) { 
						include 'includes/twt-articles.php'; 
					} ?>
					<ul class="posts-list">
					<?php 
					$featured_args = array(
						'numberposts'		=> 3,
						'category_name'		=> 'sidebar',
						'order'				=> 'ASC',
						'orderby'			=> 'meta_value',
						'meta_key'			=> 'right_stuff_rank'
					);
					$featuredPosts = get_posts($featured_args);
					shuffle($featuredPosts);
					$maxIterations = 2;
					if ( isset($featuredPosts[0]) ) { 
						foreach($featuredPosts as $key => $post) {
							if ($key < $maxIterations) {
								$imageCount = count(get_post_meta($post->ID,'right_stuff_test_image'));
								$randomNum = $imageCount > 1 ? rand(0, $imageCount-1) : 0;
								$imageArray = get_post_meta($post->ID,'right_stuff_test_image');
								$image = $imageCount > 0 ? wp_get_attachment_image($imageArray[$randomNum],'sidebar-thumb-300') : get_the_post_thumbnail($post->ID,'sidebar-thumb-300');
							?>
							<li class="post_<?php echo $key; ?>">
								<a href="<?php echo get_permalink($post->ID); ?>">
									<span class="img-wrap"><?php echo $image; ?></span>
									<span class="title-wrap">
										<span class="title"><?php echo $post->post_title; ?></span>
										<?php /* <span class="excerpt"><?php echo $post->post_excerpt; ?></span> */ ?>
									</span>
								</a>
							</li>
							<?php } else {
								break;
							}
						}
					} ?>
					</ul>
					<div class="banner">
						<?php ad_placement('ad_300x250'); ?>
					</div>
				</div>