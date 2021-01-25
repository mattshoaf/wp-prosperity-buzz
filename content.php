<?php 
/**
 * content.php - the default template for displaying content.
 *
 * Used for both single and index/archive/search.
 *
 * @since 1.0
 */

$hidestuff = array();
if (is_single()) { 
	global $post;
	if ( get_post_meta($post->ID, 'tb_hide_stuff', true) ) { 
		$hidestuff = get_post_meta($post->ID, 'tb_hide_stuff', true); 
	}
} 
?>

							<div class="entry-wrap">

								<div class="entry-container">

									<?php if ( ! in_array('hide_title', $hidestuff) ) { ?> 
										<header class="entry-header">
											<?php
												themebeagle_entry_title();
												themebeagle_entry_meta(); 
											?>
										</header><!-- .entry-header -->
									<?php } ?>

									<?php themebeagle_entry_media(); ?>

									<div class="entry-content" itemprop="text">
										<?php themebeagle_excerpt(); ?>
									</div><!-- .entry-content -->

								</div> <!-- .entry-container -->

								<footer class="entry-footer">
									<?php
										if ( is_single() ) {
											get_template_part( 'share' );
											if ( is_active_sidebar('single-post-bottom') ) { ?>
												<!-- SINGLE POST BOTTOM (.single-post-bottom) -->
												<aside class="single-post-bottom">
													<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('single-post-bottom') ) : ?>
													<?php endif; ?>
												</aside><!-- SINGLE POST BOTTOM (.single-post-bottom) -->
											<?php }
											if ( get_the_author_meta( 'description' ) && tb_option('single_auth_bio') ) {
												get_template_part( 'author-bio' );
											}
											themebeagle_related_posts();
										}
										themebeagle_entry_meta_bottom();
									?>
								</footer><!-- .entry-footer -->

							</div> <!-- .entry-wrap -->