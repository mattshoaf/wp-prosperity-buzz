<?php
/*
Template Name: Landing Page
* @since 1.0
*/

get_header();

					while ( have_posts() ) : the_post(); ?>

						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope="itemscope" itemtype="http://schema.org/CreativeWork">

							<?php themebeagle_page_title(); ?>

							<div class="entry-content">
								<?php 
									the_content();
									wp_link_pages( array( 'before' => '<p class="page-links"><span class="page-links-title">' . __( 'Pages: ', 'themebeagle' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</p>' ) );
								?>
							</div><!-- .entry-content -->

						</article><!-- .post -->

					<?php endwhile; ?>

				</main><!-- END CONTENT AREA (.site-content) -->

			</div><!-- END PRIMARY CONTENT AREA (#primary) -->

		</div><!-- .site-inner-wrap -->

		</div><!-- END INNER SITE CONTAINER (.site-inner) -->

		<!-- SITE FOOTER (.site-footer) -->
		<footer class="site-footer" role="contentinfo" itemscope="itemscope" itemtype="http://schema.org/WPFooter">
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

	<div id="backtotop"><span class="genericon genericon-collapse"></span></div>

</body>

</html>