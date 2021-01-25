<?php
	$count = 1;
	global $hidefilter;
	global $hidenav;
	global $catid;
	global $postclass;
	if ( is_home() ) { 
		if ( tb_option('post_layout') == 'masonry_2' ) { $postclass = 'col-sm-6'; }
		if ( tb_option('post_layout') == 'masonry_3' ) { $postclass = 'col-sm-4'; }
		if ( tb_option('post_layout') == 'masonry_4' ) { $postclass = 'col-sm-3'; }
	}
	if ( is_archive() ) {
		if ( tb_option('post_layout_archive' ) == 'masonry_2') { $postclass = 'col-sm-6'; }
		if ( tb_option('post_layout_archive' ) == 'masonry_3') { $postclass = 'col-sm-4'; }
		if ( tb_option('post_layout_archive' ) == 'masonry_4') { $postclass = 'col-sm-3'; }
	}

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
	if (is_front_page() || is_home()) {
		$exclude = tb_option('exclude_cats');
	} elseif (is_date() || is_author()) {
		$exclude = tb_option('exclude_cats_archive');
	}

	if ( !is_archive() && tb_option('cat_filter') && !$hidefilter ) {
?>
					<ul class="masonry-option-set cat-filter clearfix">						
						<?php
							$categories = get_categories(array(
								'exclude' => $exclude,
								'include' => $catid,
								'type' => 'post',
								'hierarchical' => 0 
							));
							echo '<li class="all"><a data-filter="*" href="#" class="selected">' . __("All", "themebeagle") . '</a></li>';
							foreach ( $categories as $cat ) {
								echo '<li><a data-filter=".'.$cat->slug.'" href="#">'.$cat->name.'</a></li>';
							}
						?>
					</ul> <!-- .cat-filter -->

<?php }

	// IF THIS IS A CATEGORY-SPECIFIC BLOG PAGE, GRAB THE 'catid' CUSTOM FIELD VALUE AND RUN THE PROPER QUERY
	if ( !is_archive() && !is_home() ) {
		query_posts(array(
			'posts_per_page' => $postcount,
			'category__in' => $catid,
			'category__not_in' => $exclude,
			'paged' => $paged,
			'post__not_in' =>  $do_not_duplicate
		));
	}

	if (have_posts()) : 
					echo '<div class="article-container masonry-container" itemscope="itemscope" itemtype="http://schema.org/Blog">';
	while (have_posts()) : the_post();
?>

						<article id="post-<?php the_ID(); ?>" <?php post_class($postclass); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
							<?php get_template_part( 'content-top-media', get_post_format() ); ?>
						</article> <!-- article.post -->

<?php 
	$count = $count + 1;
	endwhile; 
					echo '</div> <!-- .article-container -->';
					if ( !$hidenav ) { themebeagle_paging_nav(); }
	endif; 
	wp_reset_query();  
?>