<?php
	wp_enqueue_script( 'flexslider-functions' );
	$slideshowspeed = tb_option('slideshowspeed');
	$sliderid = 'slider-' . substr(md5(rand(0, 1000000)), 0, 4);
	$slideshow = 'false'; 
	if ( tb_option('post_autoslide') ) { $slideshow = 'true'; } 
	$controlnav = 'true'; 
	if ( tb_option('feat_thumbnav') ) { $controlnav = 'thumbnails'; } 
	if ( tb_option('feature_title') ) { ?>
		<h2 class="feat-title slider"><span>
			<?php 
				if ( tb_option('feature_title_icon') ) { 
					echo '<i class="fa ' . tb_option('feature_title_icon') . '"></i>'; 
				}
				echo stripslashes( tb_option('feature_title') ); 
			?>
		</span></h2>
	<?php } 
?>

<div class="mainslider narrowslider">

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

	$featimg_url = '';
	$thumb_url = '';
	$featimg_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large-thumbnail');
	$thumb_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'medium-thumbnail');

	$captionstyle = 'caption-normal';
	$captionstyle = tb_option('home_featured_caption');

	// GRAB THE VIDEO EMBED CODE IS THERE IS ONE.
	$embed = '';
	$embed = do_shortcode(get_post_meta( $post->ID, 'tb_video_embed', true));

	if ($embed) {
		$captionstyle = 'caption-alt embed';
		$vidurl = '';
		$vimid = '';
		$ytid = '';
		// EXTRACT VIMEO VIDEO ID FROM VIDEO EMBED CODE, AND CREATE VIMEO URL.
		if ( preg_match('/player\.vimeo\.com\/video\/([0-9]{1,10})/', $embed, $vimid) ) { 
			$vidurl = 'http://player.vimeo.com/video/' . $vimid[1] . '?api=1&amp;player_id=narrow_player_' . $count . '&amp;byline=0&amp;title=0&amp;portait=0&amp;wmode=transparent'; 
		}
		// EXTRACT YOUTUBE VIDEO ID FROM VIDEO EMBED CODE, AND CREATE YOUTUBE URL.
		elseif ( preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $embed, $ytid) ) {
			$vidurl = 'http://www.youtube.com/embed/' . $ytid[1] . '?autohide=1&amp;rel=0&amp;enablejsapi=1&amp;showinfo=0&amp;wmode=transparent';
		}
	}
?>

			<li id="main-slide-<?php echo $count; ?>" data-thumb="<?php echo $thumb_url[0]; ?>" class="<?php echo $captionstyle; ?>">

				<div class="slide-container clearfix">

					<?php if ($embed) { ?>
						<div class="feature-video-wrap">
							<div class="feature-video">
								<?php if ( $vidurl ) { ?>
									<iframe id="narrow_player_<?php echo $count; ?>" src="<?php echo $vidurl; ?>" width="1280" height="720" allowFullScreen></iframe>
								<?php } else { ?>
									<?php
										if (preg_match_all('/(<iframe)/', $embed, $matches)) {
											echo preg_replace('/(<iframe)/', '<iframe id="narrow_player_' . $count . '" ', $embed);
										} else {
											echo $embed;
										}
									?>
								<?php } ?>
							</div>
						</div>
					<?php } else { ?>
						<div class="slide-overlay"></div>
						<!--[if lte IE 8]><div class="feature-image" style="background-image:url('<?php echo $featimg_url[0]; ?>');filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $featimg_url[0]; ?>', sizingMethod='scale');-ms-filter: "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $featimg_url[0]; ?>', sizingMethod='scale')";"></div><![endif]-->
						<!--[if (gt IE 8)|!(IE)]><!--><div class="feature-image" style="background-image:url('<?php echo $featimg_url[0]; ?>');"></div><!--<![endif]-->
					<?php } ?>

					<div class="flex-caption">

						<?php if ( tb_option('feat_postmeta') ) { ?>
							<p class="flex-meta">
								<?php _e('By', 'themebeagle'); ?> <?php the_author_posts_link(); ?> <?php _e('on', 'themebeagle'); ?> <?php themebeagle_entry_date(); ?>
							</p>
						<?php } ?>

						<?php the_title( '<h2 class="entry-title" itemprop="headline"><span><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></span></h2>' ); ?>

						<p class="flex-read-more">
							<a href="<?php echo esc_url( get_permalink() ); ?>">
								<?php _e( 'Read More', 'themebeagle' ); ?>
							</a>
						</p>
						
						<div class="flex-excerpt">
							<div class="flex-excerpt-content">
								<?php the_excerpt(); ?>
							</div>
						</div>

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