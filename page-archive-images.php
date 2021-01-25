<?php
/*
Template Name: Archive - Image Gallery
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

					</article><!-- article -->

<?php
	global $hidefilter;
	global $hidenav;
	global $tb_options;
	$postclass = 'col-sm-6';
	if ( $tb_options['layout'] == 'fw' ) {
		$postclass = 'col-sm-4';
	}
	if (is_front_page()) { 
		$paged = (get_query_var('page')) ? get_query_var('page') : 1;
	} else {
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	}

	$postcount = get_option('posts_per_page');

	$exclude = '';
	$exclude = tb_option('exclude_cats');

	query_posts(array(
		'category__not_in' => $exclude,
		'posts_per_page' => $postcount,
		'paged' => $paged,
	));


	if (have_posts()) : 

					echo '<div class="article-container masonry-container">';

	while (have_posts()) : the_post(); 
	if ( has_post_thumbnail() ) {
?>
						<article id="post-<?php the_ID(); ?>" <?php post_class($postclass); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">

							<div class="entry-block">
								<?php themebeagle_large_thumbnail(); ?>
								<div class="entry-hidden-block">
									<div class="entry-hidden-block-content">
										<div>
											<?php themebeagle_entry_title(); ?>
											<p class="port-cats"><?php the_category(', '); ?></p>
										</div>
									</div>	
								</div>
							</div>

						</article>
<?php } 
endwhile;
					echo '</div> <!-- .article-container -->';
					if ( !$hidenav ) {
						echo '<span class="portnav-spacer"></span>'; 
						themebeagle_paging_nav(); 
					}
endif; 
wp_reset_query();  
get_footer(); ?>