<?php 
/**
 * Single Post (single.php)
 *
 * @since 1.0
 */

get_header();

while ( have_posts() ) : the_post(); ?>

						<div itemscope="itemscope" itemtype="http://schema.org/Blog">
							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
								<?php get_template_part( 'content', get_post_format() ); ?>
							</article><!-- .post -->

<?php themebeagle_before_comments(); // action hook

							tb_post_views(get_the_ID());
							comments_template();
							themebeagle_post_nav();
						echo '</div>';
endwhile;
get_footer(); ?>