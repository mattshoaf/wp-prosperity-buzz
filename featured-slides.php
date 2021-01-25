<?php
	global $post;
	$unboxed = get_post_meta($post->ID, 'tb_unboxed', true);
	$slideshowspeed = tb_option('slide_slideshowspeed');
	$sliderid = 'slider-' . substr(md5(rand(0, 1000000)), 0, 4);  
	if ( tb_option('slide_autoslide') ) 
		$slideshow = 'true';
	else
		$slideshow = 'false';
?>

<div class="mainslider wideslider slideslider">

	<div class="wrap">

		<div class="flexslider <?php echo $sliderid; ?>">

			<ul class="slides">

<?php
$count = 1;
$pageids = '';
$pageids = tb_option('feat_slides_ids');
if ( get_post_meta($post->ID, 'tb_featured_slides_ids', true) && get_post_meta($post->ID, 'tb_featured_slides', true) ) { 
	$pageids = get_post_meta($post->ID, 'tb_featured_slides_ids', true); 
}

foreach ( $pageids as $pageid ) {
	$my_query = new WP_Query(array(
		'post_type' => 'slides',
		'page_id' => $pageid
	));

	while ($my_query->have_posts()) : $my_query->the_post();

	$imgsize = '';
	$featimg_url = '';
	if ( tb_option('unboxed') || $unboxed ) { 
		$imgsize = 'extra-wide-featured-image'; 
	} else { 
		$imgsize = 'wide-featured-image'; 
	}
	$featimg_url = wp_get_attachment_image_src( get_post_thumbnail_id(), $imgsize);
	global $do_not_duplicate;
	$do_not_duplicate[] = $post->ID;
	$hidetitle = get_post_meta($post->ID, 'tb_hide_slide_title', true);
	$hidecontent = get_post_meta($post->ID, 'tb_hide_slide_content', true);
	$buttontext = get_post_meta($post->ID, 'tb_slide_button_text', true);
	$buttonlink = get_post_meta($post->ID, 'tb_slide_button_url', true); 
?>

				<li id="slide-slide-<?php echo $count; ?>">

					<div class="slide-container clearfix">

						<div class="feature-image"<?php if ( $featimg_url ) { ?> style="background-image:url('<?php echo $featimg_url[0]; ?>')"<?php } ?>></div>

						<?php if ( $buttontext && $hidetitle && $hidecontent ) { ?> 
							<p class="flex-read-more solo">
								<a href="<?php echo esc_url( $buttonlink ); ?>">
									<?php echo $buttontext; ?>
								</a>
							</p>
						<?php } ?>

						<?php if ( !$hidetitle && !$hidecontent ) { ?>
							<div class="flex-caption-wrap">

								<div class="flex-caption">

									<?php if ( !$hidetitle ) { ?>
										<h2 class="entry-title" itemprop="headline"><?php the_title(); ?></h2>
									<?php } ?>

									<?php if ( $buttontext ) { ?> 
										<p class="flex-read-more">
											<a href="<?php echo esc_url( $buttonlink ); ?>">
												<?php echo $buttontext; ?>
											</a>
										</p>
									<?php } ?>

									<?php if (!$hidecontent) { ?> 					
										<div class="flex-excerpt">
											<div class="flex-excerpt-content">
												<?php the_content(); ?>
											</div>
										</div>
									<?php } ?>

								</div>

							</div>
						<?php } ?>


					</div>
				</li>


<?php 
	$count = $count + 1;
	endwhile; 
	wp_reset_query(); 
} ?>


			</ul>

		</div>

	</div>

</div>

<script type="text/javascript">
//<![CDATA[
	jQuery(document).ready(function() {
		jQuery('.flexslider<?php echo '.'.$sliderid; ?>').flexslider({
			animationSpeed:800,
			animation:'fade',
			animationLoop: true,
			slideshow:<?php echo $slideshow; ?>,
			slideshowSpeed: <?php echo $slideshowspeed; ?>,
			smoothHeight:true,
			useCSS:false,
			controlNav:true,
			pauseOnAction: true,
			pauseOnHover: true
		});
	});
//]]>
</script>