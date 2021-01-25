<?php
/*-----------------------------------------------------------------------------------*/
// Single Page (page.php)
// @since 1.0
/*-----------------------------------------------------------------------------------*/ 

get_header();

					while ( have_posts() ) : the_post(); ?>

						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope="itemscope" itemtype="http://schema.org/CreativeWork">

							<?php 
								themebeagle_page_title();
								themebeagle_entry_media(); 
							?>

							<div class="entry-content">
								<?php 
									the_content();
									wp_link_pages( array( 'before' => '<p class="page-links"><span class="page-links-title">' . __( 'Pages: ', 'themebeagle' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</p>' ) );
								?>
							</div><!-- .entry-content -->

						</article><!-- .post -->

						<?php comments_template();

					endwhile;

get_footer(); ?>