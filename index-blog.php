<?php
	global $thumbclass;
	global $catid;
	global $postclass;
	global $hidenav;

	global $do_not_duplicate;
	if ( ! tb_option('hide_dupes') ) { $do_not_duplicate = NULL; }

	global $postcount;
	if ( !$postcount ) {
		$postcount = get_option('posts_per_page');
	}

	if (is_front_page()) { 
		$paged = (get_query_var('page')) ? get_query_var('page') : 1;
	} else {
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	}

	$exclude = '';
	if (is_front_page()) {
		$exclude = tb_option('exclude_cats');
	} elseif (is_date() || is_author()) {
		$exclude = tb_option('exclude_cats_archive');
	}

	global $more; 
	$more = 0;

	query_posts(array(
		'posts_per_page' => $postcount,
		'category__in' => $catid,
		'category__not_in' => $exclude,
		'paged' => $paged,
		'post__not_in' =>  $do_not_duplicate,
		'ignore_sticky_posts' => 1
	));

	if (have_posts()) : 
					echo '<div class="article-container ' . $thumbclass . ' blog-container" itemscope="itemscope" itemtype="http://schema.org/Blog">';
	while (have_posts()) : the_post();

	$nothumb = '';
	$hasimg = '';
	if ( get_post_meta($post->ID, 'tb_hide_stuff', true) && in_array('hide_thumb', get_post_meta($post->ID, 'tb_hide_stuff', true)) ) {
		$nothumb = ' nothumb';
	}
	if ( function_exists('get_the_image') ) {
		$hasimg = get_the_image(array( 'default_image' => false, 'image_scan' => true, 'echo' => false ));
	}
	if ( !$hasimg && !has_post_thumbnail() && !tb_option('defthumb') ) {
		$nothumb = ' nothumb';
	}
	$do_not_duplicate[] = $post->ID;
?>

						<article id="post-<?php the_ID(); ?>" <?php post_class($postclass . $nothumb); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
							<?php if ( $postclass == 'col-sm-12' ) { 
								get_template_part( 'content', get_post_format() ); 
							} else {
								get_template_part( 'content-top-media', get_post_format() ); 
							} ?>
						</article><!-- article.post -->

<?php 
	endwhile;
					echo '</div> <!-- .article-container -->';
					if ( !$hidenav ) { themebeagle_paging_nav(); }
	endif; 
	wp_reset_query();
?>