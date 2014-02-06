						<div class="twt">
							<h2 class="twt-heading">The Washington Times</h2>
							<ul class="twt-posts">
							<?php 
							$twt_args = array(
								'numberposts'	=> 3,
								'post_type'		=> 'twt_article'
							);
							$twtPosts = get_posts($twt_args);
							if ( isset($twtPosts[0]) ) { 
								foreach($twtPosts as $key => $post) { 
								$theURLs = get_post_meta($post->ID,'right_stuff_twt_article'); ?>
								<li class="twt_<?php echo $key; ?>">
									<a target="_blank" href="<?php echo $theURLs[0]; ?>">
										<?php echo get_the_post_thumbnail($post->ID, 'thumbnail'); ?>
										<span class="title-wrap">
											<span class="title"><?php echo $post->post_title; ?></span>
											<span class="excerpt"><?php echo $post->post_content; ?></span>
										</span>
									</a>
								</li>
							<?php } } ?>
							
							</ul>
						</div>