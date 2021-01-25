<?php
/*-----------------------------------------------------------------------------------*/
// Template Name: Wide Page
// @since 1.2
/*-----------------------------------------------------------------------------------*/ 

get_header();

					while ( have_posts() ) : the_post(); ?>

						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope="itemscope" itemtype="http://schema.org/CreativeWork">

							<div class="entry-content">
								<?php the_content(); ?>
							</div><!-- .entry-content -->

						</article><!-- .post -->

					<?php endwhile;

get_footer(); ?>
