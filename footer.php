<?php
/*-----------------------------------------------------------------------------------*/
// Theme Footer - The template for displaying the footer. Contains footer content and
// the closing of the .site-main and .site-container div elements.
//
// @since 1.0
/*-----------------------------------------------------------------------------------*/ 
?>

					<?php themebeagle_site_content_bottom(); // action hook ?>

				</main><!-- END CONTENT AREA (.site-content) -->

				<?php get_template_part( 'sidebar', 'narrow' ); ?>

			</div><!-- END PRIMARY CONTENT AREA (#primary) -->

<?php get_sidebar(); ?>

		</div><!-- .site-inner-wrap -->

		</div><!-- END INNER SITE CONTAINER (.site-inner) -->

		<?php themebeagle_above_footer(); // action hook ?>

		<?php get_template_part( 'footer-widgets' ); ?>

		<!-- SITE FOOTER (.site-footer) -->
		<footer class="site-footer" itemscope="itemscope" itemtype="http://schema.org/WPFooter">

			<div class="wrap">

				<?php 
					$showicons = tb_option('show_icons');
					if ( $showicons && in_array('icons_footer', $showicons) ) {
						get_template_part( 'icons-site' );
					}

					if ( has_nav_menu('footernav') ) {
						wp_nav_menu( array( 'theme_location' => 'footernav', 'container' => false, 'menu_class' => 'footer-nav-menu', 'menu_id' => 'footernav' ) ); 
					}

					if ( tb_option('footer_credits') ) { ?> 
						<div class="site-info<?php if (has_nav_menu('footernav')) { echo ' hasnav'; } ?>">
							<?php echo stripslashes( tb_option('footer_credits') ); ?>
						</div>
					<?php }
				?>

			</div><!-- .wrap -->

		</footer><!-- END SITE FOOTER (.site-footer) -->

	</div><!-- END OUTER SITE CONTAINER (.site-container) -->

	<?php wp_footer(); ?>

	<div id="backtotop"><i class="fa fa-angle-up fa-lg"></i></div>

</body>

</html>