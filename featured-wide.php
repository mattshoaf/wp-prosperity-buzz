<?php
	global $post;
	$unboxed = get_post_meta($post->ID, 'tb_unboxed', true);
	$slideshowspeed = tb_option('slideshowspeed');
	$sliderid = 'slider-' . substr(md5(rand(0, 1000000)), 0, 4);  
	$slideshow = 'false'; 
	if ( tb_option('post_autoslide') ) { $slideshow = 'true'; }
	$controlnav = 'true'; 
?>

<div class="mainslider wideslider">

	<div class="wrap">

		<div class="flexslider <?php echo $sliderid; ?>">

			<ul class="slides">

<?php
	$count = 1;
	$postids = '';
	$postids = tb_featuredposts();
	$featurecount = tb_option('featurecount');
	$my_query = new WP_Query(array(
		'post_type' => array('post', 'page'),
		'ignore_sticky_posts' => 1,
		'post__in' => $postids,
		'posts_per_page' => $featurecount
	));

	while ($my_query->have_posts()) : $my_query->the_post();
	global $do_not_duplicate;
	$do_not_duplicate[] = $post->ID;

	$imgsize = '';
	$featimg_url = '';
	$thumb_url = '';
	if ( tb_option('unboxed') || $unboxed ) { 
		$imgsize = 'extra-wide-featured-image'; 
	} else { 
		$imgsize = 'wide-featured-image'; 
	}
	$featimg_url = wp_get_attachment_image_src( get_post_thumbnail_id(), $imgsize);
	$thumb_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'medium-thumbnail');
	$captionstyle = 'caption-normal';

?>

				<li id="wide-slide-<?php echo $count; ?>" data-thumb="<?php echo $thumb_url[0]; ?>" class="<?php echo $captionstyle; ?>">

					<div class="slide-container clearfix">

						<div class="slide-overlay"></div>

						<!--[if lte IE 8]><div class="feature-image" style="background-image:url('<?php echo $featimg_url[0]; ?>');filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $featimg_url[0]; ?>', sizingMethod='scale');-ms-filter: "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $featimg_url[0]; ?>', sizingMethod='scale')";"></div><![endif]-->
						<!--[if (gt IE 8)|!(IE)]><!--><div class="feature-image" style="background-image:url('<?php echo $featimg_url[0]; ?>');"></div><!--<![endif]-->

						<div class="flex-caption">

							<?php themebeagle_entry_title(); ?>
					
							<div class="flex-excerpt">
								<div class="flex-excerpt-content">
									<?php the_excerpt(); ?>
								</div>
							</div>

							<?php if ( tb_option('feat_postmeta') ) { ?>
								<p class="flex-meta">
									<?php _e('By', 'themebeagle'); ?> <?php the_author_posts_link(); ?> <?php _e('on', 'themebeagle'); ?> <?php themebeagle_entry_date(); ?>
								</p>
							<?php } ?>

							<p class="flex-read-more">
								<a href="<?php echo esc_url( get_permalink() ); ?>">
									<?php _e( 'Read More', 'themebeagle' ); ?>
								</a>
							</p>

						</div>


					</div>
				</li>


<?php 
	$count = $count + 1; 
	endwhile; 
	wp_reset_query(); 
?>

			</ul>

		</div>

	</div>

</div>


<script type="text/javascript">
//<![CDATA[
	jQuery(document).ready(function() {
		jQuery('.flexslider<?php echo '.'.$sliderid; ?>').flexslider({
			animationSpeed:300,
			animation:'slide',
			animationLoop: true,
			slideshow:<?php echo $slideshow; ?>,
			slideshowSpeed: <?php echo $slideshowspeed; ?>,
			smoothHeight:true,
			useCSS:false,
			controlNav: '<?php echo $controlnav; ?>',
			pauseOnAction: true,
			pauseOnHover: true,
			before: function(slider) {         
				if (slider.slides.eq(slider.currentSlide).find('iframe').length !== 0)
					$f(slider.slides.eq(slider.currentSlide).find('iframe').attr('id') ).api('pause');
				if (slider.slides.eq(slider.currentSlide).find('iframe[src*="youtube"]').length !== 0)
					callPlayer(slider.slides.eq(slider.currentSlide).find('iframe[src*="youtube"]').attr('id'), 'pauseVideo');
<?php if ( tb_option('post_animate') ) { ?>
				var $titleContainer = jQuery("<?php echo '.'.$sliderid; ?> .caption-normal .entry-title"); 
				$titleContainer.css("opacity", "0"); 
				var $marginLefty = jQuery("<?php echo '.'.$sliderid; ?> .caption-normal .flex-excerpt"); 
				$marginLefty.css("opacity", "0");
				var $readMore = jQuery("<?php echo '.'.$sliderid; ?> .caption-normal .flex-read-more"); 
				$readMore.css("opacity", "0");
				var $flexmeta = jQuery("<?php echo '.'.$sliderid; ?> .caption-normal .flex-meta"); 
				$flexmeta.css("opacity", "0");
<?php } ?>
			},
<?php if ( tb_option('post_animate') ) { ?>
           		after: function(slider) { 
				var $titleContainer = jQuery("<?php echo '.'.$sliderid; ?> .caption-normal .entry-title"); 
				$titleContainer.css("marginTop", "0"); 
				$titleContainer.animate({ marginTop: 0, opacity: 1 }, 750);
				var $marginLefty = jQuery("<?php echo '.'.$sliderid; ?> .caption-normal .flex-excerpt"); 
				$marginLefty.css("marginBottom", "-350px"); 
				$marginLefty.animate({ marginBottom: 0, opacity: 1 }, 700); 
				var $readMore = jQuery("<?php echo '.'.$sliderid; ?> .caption-normal .flex-read-more"); 
				$readMore.css("marginBottom", "-550px"); 
				$readMore.animate({ marginBottom: 0, opacity: 1 }, 1000);
				var $flexmeta = jQuery("<?php echo '.'.$sliderid; ?> .caption-normal .flex-meta"); 
				$flexmeta.css("opacity", "0"); 
				$flexmeta.animate({ opacity: 1 }, 1500); 
			},
           		start: function(slider) { 
				var $titleContainer = jQuery("<?php echo '.'.$sliderid; ?> .caption-normal .entry-title"); 
				$titleContainer.css("marginTop", "0"); 
				$titleContainer.animate({ marginTop: 0, opacity: 1 }, 750);  
				var $marginLefty = jQuery("<?php echo '.'.$sliderid; ?> .caption-normal .flex-excerpt"); 
				$marginLefty.css("marginBottom", "-350px"); 
				$marginLefty.animate({ marginBottom: 0, opacity: 1 }, 700);
				var $readMore = jQuery("<?php echo '.'.$sliderid; ?> .caption-normal .flex-read-more"); 
				$readMore.css("marginBottom", "-550px"); 
				$readMore.animate({ marginBottom: 0, opacity: 1 }, 1000);
				var $flexmeta = jQuery("<?php echo '.'.$sliderid; ?> .caption-normal .flex-meta"); 
				$flexmeta.css("opacity", "0"); 
				$flexmeta.animate({ opacity: 1 }, 1500);
			}
<?php } ?>   
		});
	});
//]]>
</script>