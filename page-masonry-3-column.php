<?php
/*
Template Name: Blog - Masonry 3 Column
*/

global $catid;
$catid = '';
$catid = get_post_meta($post->ID, 'tb_cats', true); 
global $postclass;
$postclass = 'col-sm-4';
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

					<?php get_template_part( 'index-masonry' );

get_footer(); ?>