<!-- HEADER NAVIGATION (.nav-secondary) -->
<nav class="nav-secondary" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">

	<div class="wrap">

		<span title="<?php _e( 'Display Menu', 'themebeagle' ); ?>" class="menu-toggle">
			<i class="fa fa-navicon"></i>
		</span>

		<?php 

			wp_nav_menu( array( 'theme_location' => 'catnav', 'container' => false, 'menu_class' => 'nav-menu', 'menu_id' => 'secnav' ) );

			if ( tb_option('search_secnav') ) { ?>
				<span title="<?php _e( 'Display Search Form', 'themebeagle' ); ?>" class="search-button">
					<i class="fa fa-search"></i>
				</span>
			<?php }

			$showicons = tb_option('show_icons');
			if ( $showicons && in_array('icons_secnav', $showicons) ) {
				get_template_part( 'icons-site' );
			}



		?>

	</div><!-- .wrap -->

</nav> 
<!-- END SECONDARY NAVIGATION (.nav-secondary) -->