<?php
/*
Template Name: Archives by Category
 *
 * @since 1.0
*/

get_header(); 
the_post(); 
$content = get_the_content(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope="itemscope" itemtype="http://schema.org/CreativeWork">

						<?php 
							themebeagle_page_title();
							themebeagle_entry_media(); 
							if ( ! empty( $content ) ) { ?>
								<div class="entry-content">
									<?php the_content(); ?>
								</div>
							<?php }
						?>

<?php
global $do_not_duplicate;
$cats = get_categories('hierarchical=0');
foreach ($cats as $cat) {
	query_posts(array(
		'post__not_in' => $do_not_duplicate,
		'cat' => $cat->cat_ID,
		'posts_per_page' => -1,
	)); 
if (have_posts()) :

						echo '<div class="archives-by-cat">';
						echo '<h3>' . $cat->cat_name . '</h3>';

while (have_posts()) : the_post(); $do_not_duplicate[] = $post->ID; ?>

							<p>
								<span class="archive-entry-date"><?php themebeagle_entry_date(); ?>:</span>
								<a href="<?php echo esc_url( get_permalink()); ?>" rel="bookmark"><?php the_title(); ?></a>
							</p>

<?php endwhile; 
		
						echo '</div>';

endif; } ?>

					</article><!-- article -->

<?php get_footer(); ?>