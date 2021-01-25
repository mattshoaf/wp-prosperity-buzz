<!-- TOPBAR NAVIGATION (.nav-primary) -->
<nav class="nav-primary" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">

	<div class="wrap">

		<span title="<?php _e( 'Display Menu', 'themebeagle' ); ?>" class="menu-toggle">
			<i class="fa fa-navicon"></i>
		</span>

		<?php 
			if ( tb_option('search_topnav') ) { ?>
				<span title="<?php _e( 'Display Search Form', 'themebeagle' ); ?>" class="search-button">
					<i class="fa fa-search"></i>
				</span>
			<?php }

			$showicons = tb_option('show_icons');
			if ( $showicons && in_array('icons_topnav', $showicons) ) {
				get_template_part( 'icons-site' );
			}

			wp_nav_menu( array( 'theme_location' => 'topnav', 'container' => false, 'menu_class' => 'nav-menu', 'menu_id' => 'topnav' ) ); 
		?>

	</div><!-- .wrap -->

</nav>
<!-- END PRIMARY NAVIGATION (.nav-primary) -->