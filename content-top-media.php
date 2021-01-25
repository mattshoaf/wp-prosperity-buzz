<?php 
/**
 * content-top-media.php - the template for displaying content with entry media at the top.
 *
 * Used for both single and index/archive/search.
 *
 * @since 1.0
 */
?>

							<div class="entry-wrap">

								<?php themebeagle_entry_media(); ?>

								<div class="entry-container">

									<header class="entry-header">
										<?php 
											themebeagle_entry_title();
											themebeagle_entry_meta(); 
										?>
									</header><!-- .entry-header -->

									<div class="entry-content" itemprop="text">
										<?php themebeagle_excerpt(); ?>
									</div><!-- .entry-content -->

								</div> <!-- .entry-container -->

								<footer class="entry-footer">
									<?php

										themebeagle_entry_meta_bottom();

										if ( is_single() ) {
											get_template_part( 'share' );

											if ( is_active_sidebar('single-post-bottom') ) { ?>
												<!-- SINGLE POST BOTTOM (.single-post-bottom) -->
												<aside class="single-post-bottom">
													<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('single-post-bottom') ) : ?>
													<?php endif; ?>
												</aside><!-- SINGLE POST BOTTOM (.single-post-bottom) -->
											<?php }
										}

										if ( is_single() && get_the_author_meta( 'description' ) && tb_option('single_auth_bio') ) {
											get_template_part( 'author-bio' );
										}

									?>
								</footer><!-- .entry-footer -->

							</div> <!-- .entry-wrap -->