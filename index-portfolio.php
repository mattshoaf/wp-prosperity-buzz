<?php
	global $hidefilter;
	global $hidenav;
	global $catid;
	global $postclass;

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

	if ( !$hidefilter ) { ?>
					<ul class="portfolio-option-set cat-filter clearfix">
						<?php
							$categories = get_categories(array(
								'include' => $catid
							));
							echo '<li class="all"><a data-filter="*" href="#" class="selected">' . __("All", "themebeagle") . '</a></li>';
							foreach ( $categories as $cat ) {
								echo '<li><a data-filter=".'.$cat->slug.'" href="#">'.$cat->name.'</a></li>';
							}
						?>
					</ul> <!-- .cat-filter -->

	<?php }

	query_posts(array(
		'post_type' => array('post', 'page'),
		'posts_per_page' => $postcount,
		'category__in' => $catid,
		'paged' => $paged,
		'post__not_in' =>  $do_not_duplicate
	));

	if (have_posts()) : 
					echo '<div class="article-container portfolio-container" itemscope="itemscope" itemtype="http://schema.org/Blog">';
	while (have_posts()) : the_post();
?>

						<article id="post-<?php the_ID(); ?>" <?php post_class($postclass); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">

							<div class="entry-block">
								<?php themebeagle_large_thumbnail(); ?>
								<div class="entry-hidden-block">
									<div class="entry-hidden-block-content">
										<div>
											<?php themebeagle_entry_title(); ?>
											<p class="port-cats"><?php the_category(', '); ?></p>
											<meta itemprop="datePublished" content="<?php echo esc_attr(get_the_date('c')); ?>">
										</div>
									</div>	
								</div>
							</div>

						</article> <!-- article.post -->

<?php 
	endwhile; 
					echo '</div> <!-- .article-container -->';
					if ( !$hidenav ) {
						echo '<span class="portnav-spacer"></span>'; 
						themebeagle_paging_nav(); 
					}
	endif; 
	wp_reset_query();  
?>