<?php 
/*-----------------------------------------------------------------------------------*/
// site-header.php - Displays site header and navigation bars.
// @since 1.2
/*-----------------------------------------------------------------------------------*/

global $post;
$hideheadstuff = array();
if ( is_singular() && get_post_meta($post->ID, 'tb_hide_head_stuff', true) ) { $hideheadstuff = get_post_meta($post->ID, 'tb_hide_head_stuff', true); }
?>

		<?php if (tb_option('show_topnav') && !in_array('hide_topnav', $hideheadstuff)) { get_template_part( 'nav-topbar' ); } ?>

		<?php if (!in_array('hide_site_header', $hideheadstuff)) { ?>
		<!-- SITE HEADER (.site-header) -->
		<header class="site-header" itemscope="itemscope" itemtype="http://schema.org/WPHeader">

			<div class="wrap">

				<div class="site-branding">
					<a href="<?php echo esc_url(home_url( '/' )); ?>" title="<?php echo esc_attr(get_bloginfo('name','display')); ?>" rel="home">
						<<?php if (is_home()) { echo 'h1'; } else { echo 'div'; } ?> class="site-title" itemprop="headline">
							<?php 
								if ( tb_option('header_logo') ) { ?>
									<span class="site-logo">
										<img src="<?php echo tb_option('logo_url'); ?>" alt="<?php echo esc_attr(get_bloginfo('name','display')); ?>" />
									</span>
								<?php }							
								if ( tb_option('site_title') ) {
									if ( tb_option('site_title_icon') ) { ?>
										<i class="fa <?php echo tb_option('site_title_icon'); ?>"></i>
									<?php }
									bloginfo( 'name' );
								} 
							?>
						<<?php if (is_home()) { echo '/h1'; } else { echo '/div'; } ?>>
						<?php if ( tb_option('tagline') ) { ?>
							<div class="site-description" itemprop="description">
								<?php bloginfo( 'description' ); ?>
							</div>
						<?php } ?>
					</a>
				</div><!-- .site-branding -->

				<?php
					themebeagle_after_branding(); // action hook;
					if ( tb_option('show_secnav') && !in_array('hide_secnav', $hideheadstuff) ) {
						if ( tb_option('secnav_align') == 'below' || tb_option('ad_header') || (is_singular() && get_post_meta($post->ID, 'tb_ad_header_code', true)) ) {
							null;
					 	} else {
							get_template_part( 'nav-header' );
						}
					}
				?>

			</div><!-- .wrap -->

		</header>
		<!-- END SITE HEADER (.site-header) -->
		<?php } ?>

		<?php if (tb_option('show_secnav') && !in_array('hide_secnav', $hideheadstuff)) {
			if ( tb_option('secnav_align') == 'below' || tb_option('ad_header') || (is_singular() && get_post_meta($post->ID, 'tb_ad_header_code', true)) ) { ?>
				<div class="nav-below-header">
					<?php get_template_part( 'nav-header' ); ?>
				</div>
			<?php }
		} ?>

		<?php if ( tb_option('search_topnav') || tb_option('search_secnav') ) { ?>
			<!-- TOPBAR SEARCH FORM (.topnav-search) -->
			<div class="topnav-search">
				<div class="wrap">
					<?php get_search_form(); ?>
				</div>
			</div><!-- .topnav-search) -->
			<!-- END SEARCH FORM (.topnav-search) -->
		<?php } ?>