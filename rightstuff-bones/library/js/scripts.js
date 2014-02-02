/*
Bones Scripts File
Author: Eddie Machado

This file should contain any js scripts you want to add to the site.
Instead of calling it in the header or throwing it inside wp_head()
this file will be called automatically in the footer so as not to
slow the page load.

*/

// IE8 ployfill for GetComputed Style (for Responsive Script below)
if (!window.getComputedStyle) {
	window.getComputedStyle = function(el, pseudo) {
		this.el = el;
		this.getPropertyValue = function(prop) {
			var re = /(\-([a-z]){1})/g;
			if (prop == 'float') prop = 'styleFloat';
			if (re.test(prop)) {
				prop = prop.replace(re, function () {
					return arguments[2].toUpperCase();
				});
			}
			return el.currentStyle[prop] ? el.currentStyle[prop] : null;
		}
		return this;
	}
}

// as the page loads, call these scripts
jQuery(document).ready(function($) {
	/*
	Responsive jQuery is a tricky thing.
	There's a bunch of different ways to handle
	it, so be sure to research and find the one
	that works for you best.
	*/
	
	/* getting viewport width */
	var responsive_viewport = $(window).width();
	
	/* if is below 481px */
	if (responsive_viewport < 481) {
	
	} /* end smallest screen */
	
	/* if is larger than 481px */
	if (responsive_viewport > 481) {
	
	} /* end larger than 481px */
	
	/* if is above or equal to 768px */
	if (responsive_viewport >= 768) {
	
		/* load gravatars */
		$('.comment img[data-gravatar]').each(function(){
			$(this).attr('src',$(this).attr('data-gravatar'));
		});
		
	}
	
	/* off the bat large screen actions */
	if (responsive_viewport > 1030) {
	
	}
	
	$('.SHOW_MORE').click(function(e) {
		e.preventDefault()
		var activator = $(this)
		var featuredOffset = $('.FEATURED_POSTS li').length;
		$.ajax({
			type:'GET',
			url:activator.attr('href')+'&offset='+featuredOffset,
			success:function(data) {
				if (data.count_total - featuredOffset < 6) {
					activator.fadeOut();
					console.log($(this))
				}
				$.each(data.posts, function(i,post) {
					$('<li class="featured_'+(i+featuredOffset)+'">'+
						'<a href="'+post.url+'">'+
							'<img src="'+post.thumbnail_images.full.url+'" alt="'+post.title+'" />'+
							'<span class="title-wrap">'+
								'<span class="title">'+post.title+'</span>'+
								'<span class="excerpt">'+post.excerpt+'</span>'+
							'</span>'+
						'</a>'+
					'</li>').appendTo('.FEATURED_POSTS')
				})
			}
		})
	})
	
	
	$('.nav-activator').click(function() {
		$(this).siblings('.nav').slideToggle()
	})
	// Hide wp admin bar
	$('html').css('cssText','margin-top:0 !important;')
	$('#wpadminbar').slideUp(2000, function() {
		$(this).wrap('<div id="wpadminbar_wrap"></div>').after('<a class="show-wp-admin SHOW_WP_ADMIN">Show WP Admin Bar</a>')
	})
	$('body').on('click','#wpadminbar_wrap .SHOW_WP_ADMIN',function() {
		$(this).parent('#wpadminbar_wrap').toggleClass('showing').find('#wpadminbar').slideToggle(250)
	})
}); /* end of as page load scripts */


/*! A fix for the iOS orientationchange zoom bug.
 Script by @scottjehl, rebound by @wilto.
 MIT License.
*/
(function(w){
	// This fix addresses an iOS bug, so return early if the UA claims it's something else.
	if( !( /iPhone|iPad|iPod/.test( navigator.platform ) && navigator.userAgent.indexOf( "AppleWebKit" ) > -1 ) ){ return; }
	var doc = w.document;
	if( !doc.querySelector ){ return; }
	var meta = doc.querySelector( "meta[name=viewport]" ),
		initialContent = meta && meta.getAttribute( "content" ),
		disabledZoom = initialContent + ",maximum-scale=1",
		enabledZoom = initialContent + ",maximum-scale=10",
		enabled = true,
		x, y, z, aig;
	if( !meta ){ return; }
	function restoreZoom(){
		meta.setAttribute( "content", enabledZoom );
		enabled = true; }
	function disableZoom(){
		meta.setAttribute( "content", disabledZoom );
		enabled = false; }
	function checkTilt( e ){
		aig = e.accelerationIncludingGravity;
		x = Math.abs( aig.x );
		y = Math.abs( aig.y );
		z = Math.abs( aig.z );
		// If portrait orientation and in one of the danger zones
		if( !w.orientation && ( x > 7 || ( ( z > 6 && y < 8 || z < 8 && y > 6 ) && x > 5 ) ) ){
			if( enabled ){ disableZoom(); } }
		else if( !enabled ){ restoreZoom(); } }
	w.addEventListener( "orientationchange", restoreZoom, false );
	w.addEventListener( "devicemotion", checkTilt, false );
})( this );