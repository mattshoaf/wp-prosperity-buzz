<?php
	$postclass = '';
	if ( is_home() ) {
		if ( tb_option('post_layout') == 'posts_standard' ) { $postclass = 'col-sm-12'; }
		if ( tb_option('post_layout') == 'posts_by_two' ) { $postclass = 'col-sm-6'; }
		if ( tb_option('post_layout') == 'posts_by_three' ) { $postclass = 'col-sm-4'; }
		if ( tb_option('post_layout') == 'posts_by_four' ) { $postclass = 'col-sm-3'; }
	}
	if ( is_archive() ) {
		if ( tb_option('post_layout_archive') == 'posts_standard' ) { $postclass = 'col-sm-12'; }
		if ( tb_option('post_layout_archive') == 'posts_by_two' ) { $postclass = 'col-sm-6'; }
		if ( tb_option('post_layout_archive') == 'posts_by_three' ) { $postclass = 'col-sm-4'; }
		if ( tb_option('post_layout_archive') == 'posts_by_four' ) { $postclass = 'col-sm-3'; }
	}
	if ( is_search() ) { $postclass = 'col-sm-12'; }

	$thumbalign = '';
	$thumbalign = tb_option('thumb_align');

	$thumbclass = '';
	if (
		(is_home() && tb_option('thumbnails') &&  tb_option('post_layout') == 'posts_standard') || 
		(is_archive() && tb_option('thumbnails') && tb_option('post_layout_archive') == 'posts_standard')
	) {
		$thumbclass = 'thumbs-' . $thumbalign;
	}

	if ( have_posts() ) :
					echo '<div class="article-container ' . $thumbclass . ' blog-container" itemscope="itemscope" itemtype="http://schema.org/Blog">';
	while ( have_posts() ) : the_post(); 

	$nothumb = '';
	$hasimg = '';
	if ( get_post_meta($post->ID, 'tb_hide_stuff', true) && in_array('hide_thumb', get_post_meta($post->ID, 'tb_hide_stuff', true)) )
		$nothumb = ' nothumb';
	if ( function_exists('get_the_image') )
		$hasimg = get_the_image(array( 'default_image' => false, 'image_scan' => true, 'echo' => false ));
	if ( !$hasimg && !has_post_thumbnail() && !tb_option('defthumb') )
		$nothumb = ' nothumb';
?>
						<article id="post-<?php the_ID(); ?>" <?php post_class($postclass . $nothumb); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
							<?php if ( $postclass == 'col-sm-12' ) { 
								get_template_part( 'content', get_post_format() ); 
							} else {
								get_template_part( 'content-top-media', get_post_format() ); 
							} ?>
						</article> <!-- article.post -->

<?php endwhile;
					echo '</div> <!-- article-container -->';
					themebeagle_paging_nav();
endif; ?>