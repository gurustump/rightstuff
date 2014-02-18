<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap clearfix">

					<div id="main" class="eightcol first clearfix" role="main">

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<header class="article-header">
									<h1 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h1>
									<!--<p class="byline vcard"><?php
										printf( __( 'Posted <time class="updated" datetime="%1$s" pubdate>%2$s</time> by <span class="author">%3$s</span> <span class="amp">&amp;</span> filed under %4$s.', 'bonestheme' ), get_the_time( 'Y-m-j' ), get_the_time( get_option('date_format')), bones_get_the_author_posts_link(), get_the_category_list(', ') );
									?></p>-->

								</header>

								<section class="entry-content clearfix" itemprop="articleBody">
									<div class="section-primary">
										<div class="post-meta"><?php the_date(); ?></div>
										<?php the_content(); ?>
									</div>
									
									<?php 
										$videoEmbeds = get_post_meta(get_the_ID(),'right_stuff_video-embed',true); if ( isset($videoEmbeds[0]) ) { 
											foreach($videoEmbeds as $key => $video) { ?>
											<div class="video-wrap VIDEO">
												<?php echo $video; ?>
											</div>
										<?php } } ?>
									
									<div class="section-secondary">
										<div class="addthis_toolbox addthis_default_style addthis_32x32_style">
											<a class="btn btn-fb large addthis_button_facebook"><span class="spirte">Share on Facebook</span></a>
											<a class="btn btn-twit large addthis_button_twitter"><span class="sprite">Share on Twitter</span></a>
										</div>
										<div class="post-secondary-wrap">
											<?php 
											$secondaryContent = get_post_meta(get_the_ID(),'right_stuff_secondary',true); 
											echo $secondaryContent;
											?>
										</div>
									</div>
								</section>

								<footer class="article-footer">
									<?php the_tags( '<div class="tags"><strong class="title">' . __( 'Tags:', 'bonestheme' ) . '</strong> ', ', ', '</div>' ); ?>
									<?php include 'includes/email-collection.php'; ?>
								</footer>
								
								
								<?php /* comments_template(); */ ?>

							</article>

						<?php endwhile; ?>

						<?php else : ?>

							<article id="post-not-found" class="hentry clearfix">
									<header class="article-header">
										<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
									</header>
									<section class="entry-content">
										<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
									</section>
									<footer class="article-footer">
											<p><?php _e( 'This is the error message in the single.php template.', 'bonestheme' ); ?></p>
									</footer>
							</article>

						<?php endif; ?>

					</div>

					<?php get_sidebar(); ?>

				</div>

			</div>

<?php get_footer(); ?>
