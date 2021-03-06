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
RS = {} // global namespace for rightstuff functions

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
	
	RS.getScrollbarWidth = function() {
		var div = $('<div style="width:50px;height:50px;overflow:hidden;position:absolute;top:-200px;left:-200px;"><div style="height:100px;"></div></div>'); 
		$('body').append(div); 
		var w1 = $('div', div).innerWidth(); 
		div.css('overflow-y', 'auto'); 
		var w2 = $('div', div).innerWidth(); 
		$(div).remove();
		return (w1 - w2);
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
				}
				$.each(data.posts, function(i,post) {
					var imageUrl = post.thumbnail_images && post.thumbnail_images.full?post.thumbnail_images.full.url:post.attachments[0] && post.attachments[0].images?post.attachments[0].images.full.url:''
					var postExcerpt = post.excerpt.replace(/<[^>]+>/ig,'')
					/*console.log(post)
					console.log(post.thumbnail_images)
					console.log(post.thumbnail_images && post.thumbnail_images.full?post.thumbnail_images.full:'full undefined')*/
					$('<li class="featured_'+(i+featuredOffset)+'">'+
						'<a href="'+post.url+'">'+
							'<span class="img-wrap">'+
								'<img src="'+imageUrl+'" alt="'+post.title+'" />'+
							'</span>'+
							'<span class="title-wrap">'+
								'<span class="title">'+post.title+'</span>'+
								'<span class="excerpt">'+postExcerpt+'</span>'+
							'</span>'+
						'</a>'+
					'</li>').appendTo('.FEATURED_POSTS')
				})
			}
		})
	})
	
	
	$('.nav-activator').click(function(e) {
		e.preventDefault()
		$(this).siblings('.NAV_WRAP').slideToggle(400,function() {
			$(this).children('nav').css('position','absolute').attr('style','')
		})
	})
	$('.SEARCH_SHOW').click(function(e) {
		e.preventDefault()
		$('.SEARCH_FORM').slideToggle()
	})
	// Hide wp admin bar
	var adminBarMove = $('#wpadminbar').outerHeight()-1
	$('#wpadminbar').animate({
		'top':'-='+adminBarMove
	}, 2000,function() {
	}).hover(
		function(){
			$('#wpadminbar').stop().css('top','0').toggleClass('wpadminbar-shown');
		},
		function(){
			$('#wpadminbar').animate({
				'top':'-='+adminBarMove
			}, 2000).toggleClass('wpadminbar-shown');
		}
	).append('<div class="wpadminbar-activator"></div>');
	
	$('.OVERLAY_ACTIVATOR').click(function(e) {
		e.preventDefault()
		var imgSrc = $(this).find('img').attr('src')
		var imgTitle = $(this).find('img').attr('title')
		var overlay = $('<div class="overlay OVERLAY">'+
			'<div class="title-bar TITLE_BAR">'+
				'<a class="close CLOSE">Close</a>'+
				'<h2>'+imgTitle+'</h2>'+
			'</div>'+
			'<div class="overlay-inner">'+
				'<img src="'+imgSrc+'" alt="" />'+
			'</div>'+
		'</div>').appendTo('body')
		$('body').addClass('no-scroll')
		overlay.find('.TITLE_BAR').width(overlay.width()-RS.getScrollbarWidth())
		$(window).resize(function() {
			overlay.find('.TITLE_BAR').width(overlay.width()-RS.getScrollbarWidth())
		})
		overlay.fadeIn()
	})
	$('body').on('click','.OVERLAY .CLOSE',function(e) {
		e.preventDefault()
		$('body').removeClass('no-scroll')
		$(this).parents('.OVERLAY').fadeOut('400',function() {
			$(this).remove()
		})
	})
	RS.resizeVideo = function(vidRatio) {
		jQuery('.VIDEO iframe').attr('height',jQuery('.VIDEO').width() * vidRatio)
	}
	if ($('.VIDEO').length > 0) {
		var vidHeight = $('.VIDEO iframe').attr('height')?$('.VIDEO iframe').attr('height'):$('.VIDEO iframe').height()
		var vidWidth = $('.VIDEO iframe').attr('width')?$('.VIDEO iframe').attr('width'):$('.VIDEO iframe').width()
		var vidRatio = vidHeight / vidWidth;
		RS.resizeVideo(vidRatio)
		$(window).resize(function() {
			RS.resizeVideo(vidRatio)
		})
	}
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