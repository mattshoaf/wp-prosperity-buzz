<?php
	$slideshowspeed = tb_option('slideshowspeed');
	$sliderid = 'slider-' . substr(md5(rand(0, 1000000)), 0, 4);  
	$slideshow = 'false'; 
	if ( tb_option('post_autoslide') ) { $slideshow = 'true'; }
	$controlnav = 'false';
	global $unboxedclass;
?>

<div class="wideslider-2">

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

	$imgsize = 'large-thumbnail'; 
	$featimg_url = wp_get_attachment_image_src( get_post_thumbnail_id(), $imgsize);
?>

			<li id="wide-slide-<?php echo $count; ?>">
				<div class="feat-container">
					<a href="<?php esc_url( the_permalink() ); ?>" title="<?php esc_attr( the_title() ); ?>">
						<img src="<?php echo $featimg_url[0]; ?>" alt="<?php the_title(); ?>" />
					</a>
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
	(function() {
		var $window = jQuery(window), flexslider;
		function getGridSize() {
<?php if ( $unboxedclass == 'unboxed' ) { ?>
			return	(window.innerWidth < 769) ? 1 :
				(window.innerWidth < 1281) ? 2 : 3;
<?php } else { ?>
			return	(window.innerWidth < 769) ? 1 : 2;
<?php } ?>
		};
		jQuery(document).ready(function() {
			jQuery('.flexslider<?php echo '.'.$sliderid; ?>').flexslider({
				animationLoop:true,
				animationSpeed:500,
				animation:'slide',
				pauseOnAction: true,
				pauseOnHover: true,
				slideshow:<?php echo $slideshow; ?>,
				slideshowSpeed: <?php echo $slideshowspeed; ?>,
				smoothHeight:false,
				controlNav: '<?php echo $controlnav; ?>',
				useCSS:false,
				itemWidth:210,
				itemMargin:0,
				minItems: getGridSize(),
				maxItems: getGridSize(),
				start: function(slider) {
					flexslider = slider;
				}
			});
		});
		$window.resize(function() {
			var gridSize = getGridSize();
			flexslider.vars.minItems = gridSize;
			flexslider.vars.maxItems = gridSize;
		});
	}());
//]]>
</script>