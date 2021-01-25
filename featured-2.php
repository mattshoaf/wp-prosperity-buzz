<?php
	wp_enqueue_script( 'flexslider-functions' );
	$slideshowspeed = tb_option('slideshowspeed');
	$sliderid = 'slider-' . substr(md5(rand(0, 1000000)), 0, 4);
	$slideshow = 'false'; 
	if ( tb_option('post_autoslide') ) { $slideshow = 'true'; } 
	$controlnav = 'true'; 
	if ( tb_option('feat_thumbnav') ) { $controlnav = 'thumbnails'; } 
?>

<div class="mainslider narrowslider-2">

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

	// GRAB THE VIDEO EMBED CODE IS THERE IS ONE.
	$embed = '';
	$embed = do_shortcode(get_post_meta( $post->ID, 'tb_video_embed', true));

	if ($embed) {
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

			<li id="main-slide-<?php echo $count; ?>" data-thumb="<?php echo $thumb_url[0]; ?>">

				<div class="slide-container clearfix">
					<?php
						echo '<header class="entry-header-featured">';
							the_title( '<h2 class="entry-title" itemprop="headline"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
							if ( tb_option('feat_postmeta') ) {
								echo '<p class="entry-meta flex-meta">';
									echo __('By ', 'themebeagle');
									the_author_posts_link();
									echo __(' on ', 'themebeagle');
									themebeagle_entry_date();
									if ( comments_open() && 'post' == get_post_type() ) {
										echo __(' with ', 'themebeagle');
										comments_popup_link( __('0 Comments', 'themebeagle'), __('1 Comment', 'themebeagle'), __('% Comments', 'themebeagle') );
									}
								echo '</p>';
							}
						echo '</header><!-- .entry-header-featured -->';
					?>

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
					<?php } elseif ( $featimg_url ) { ?>
						<img class="feat-image" src="<?php echo $featimg_url[0]; ?>" alt="<?php the_title(); ?>" />
					<?php } ?>

					<div class="flex-excerpt">
						<div class="flex-excerpt-content">
							<?php the_excerpt(); ?>
						</div>
					</div>

					<p class="read-more">
						<a class="more-link button" href="<?php echo esc_url( get_permalink() ); ?>"><?php _e( 'Read More &raquo;', 'themebeagle' ); ?></a>
					</p>

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
			},   
		});
	});
//]]>
</script>