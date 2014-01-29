<?php get_header(); ?>
        
        <div class="blog_left">
        
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
          
                <h1><?php the_title(); ?></h1>
                
                <div class="left_content">
                
                <?php the_content(); ?>



<div class="facebook-share-RS rounded" data-href="<?php the_permalink(); ?>" data-type="link"></div>


<a href="https://twitter.com/share" class="twitter-share-RS rounded"  data-count="none">Share on Twitter</a>

<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>

		<div class="blah">
		<?php $custom_meta = get_post_custom_values('meta', get_the_ID()) ?>
                <?php print_r($custom_meta[0]); ?> 
		</div>



<div class="e-mail-collection-global rounded">
<h2>Want more of the Right Stuff?</h2>
<p>Put your e-mail in the box</p>

<div class="sendy">
<form action="http://christmasbarrel.com/sendy/subscribe" method="POST" accept-charset="utf-8">
	
<input type="text" name="email" id="email"  class="rounded"   onfocus="if(this.value == ‘E-mail Address’) { this.value = ”; }” onblur="this.value=!this.value?’E-mail Address’:this.value;” value="E-mail Address"/>
	
	<input type="hidden" name="list" value="Y763rhFDawWba4FV0FGVVYqA"/>
	<input type="submit" name="submit" id="submit" value="Sign Up!" class="rounded orange"  />
</form></div>


</div>

<div class="SocialMedia-global rounded">
<img src="http://mikehammari.com/rightstuff/files/2014/01/fb.png">
<img src="http://mikehammari.com/rightstuff/files/2014/01/youtube.png">
<img src="http://mikehammari.com/rightstuff/files/2014/01/pinterest.png">
<img src="http://mikehammari.com/rightstuff/files/2014/01/twitter.png"></div>

	
                </div><!--//left_content-->
                
                <br /><br />
                
               
            
            <?php endwhile; else: ?>
            
                <h3>Sorry, no posts matched your criteria.</h3>
            
            <?php endif; ?>    
            
        </div><!--//blog_left-->
        
        <?php get_sidebar(); ?>
        
        <div class="clear"></div>


<div class="e-mail-collection-mobile">
<h2>Want more of the Right Stuff?</h2>
<p>Put your e-mail in the box</p>


</div>

<div class="SocialMedia-mobile">
<img src="http://mikehammari.com/rightstuff/files/2014/01/fb.png">
<img src="http://mikehammari.com/rightstuff/files/2014/01/youtube.png">
<img src="http://mikehammari.com/rightstuff/files/2014/01/pinterest.png">
<img src="http://mikehammari.com/rightstuff/files/2014/01/twitter.png"></div>
        
<?php get_footer(); ?>            