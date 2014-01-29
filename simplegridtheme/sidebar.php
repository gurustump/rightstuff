        <div id="sidebar">

<div id="load_posts_container">

        <?php

$headlinesData = get_posts(array( 'post_type' => 'post', 'category' => get_category_by_slug('sidebar')->term_id, 'numberposts' => 5 ));

foreach ($headlinesData as $item) { ?>
	<div class="home_post_box">
		<a href="<?php echo get_permalink($item->ID); ?>"><?php echo get_the_post_thumbnail($item->ID,'home-post',array('alt' => 'post image', 'class' => 'rounded')); ?></a>
		<div class="side_post_title_cont">
              		<h3><?php echo $item->post_title ?></h3>
                </div>    
	</div>
<?php } ?>
        


<div class="AdW300_global">
<img src="http://mikehammari.com/rightstuff/files/2014/01/Ad300x250.jpg">
</div>





        
     
        
        </div><!--//sidebar-->
