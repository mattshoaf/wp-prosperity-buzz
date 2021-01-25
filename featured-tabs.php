<div id="mytabs-widget" class="mytabs clearfix">

<?php
	global $show_recent;
	global $show_popular;
	global $show_archives;
	global $show_comments;
	global $numposts;
?>

	<ul class="nav nav-tabs nav-tabs-widget">
		<?php if ($show_recent) { ?>
			<li><a href="#tabs-recent" data-toggle="tab"><?php _e("Recent", "themebeagle"); ?></a></li>
		<?php } if ($show_popular) { ?>
			<li><a href="#tabs-popular" data-toggle="tab"><?php _e("Popular", "themebeagle"); ?></a></li>
		<?php } if ($show_comments) { ?>
			<li><a href="#tabs-comments" data-toggle="tab"><?php _e("Comments", "themebeagle"); ?></a></li>
		<?php } if ($show_archives) { ?>
			<li><a href="#tabs-archives" data-toggle="tab"><?php _e("Archives", "themebeagle"); ?></a></li>
		<?php } ?>
	</ul>


	<div class="tab-content tab-content-widget">

		<?php if ($show_recent) { ?>
			<!-- RECENT POSTS TAB -->
			<div id="tabs-recent" class="tab-pane fade">
				<?php
					$cats = '';
					$cats = tb_option('exclude_cats');
					$my_query = new WP_Query(array(
						'category__not_in' => $cats,
						'posts_per_page' => $numposts,
						'ignore_sticky_posts' => 1
					));
					while ($my_query->have_posts()) : $my_query->the_post(); 
				?>
					<div class="recent-excerpt-wrap">
						<div class="recent-excerpt clearfix">
							<?php themebeagle_post_thumbnail(); ?>
							<h3 class="entry-title"><a href="<?php echo esc_url( get_permalink()); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
							<?php the_excerpt(); ?>
						</div>
					</div>
				<?php endwhile; wp_reset_query(); ?>
			</div>

		<?php } if ($show_popular) { ?>
			<!-- POPULAR POSTS TAB -->
			<div id="tabs-popular" class="tab-pane fade">
				<?php
					$pop_query = new WP_Query(array(
						'meta_key' => 'tb_post_views',
						'orderby' => 'meta_value_num',
						'order' => 'DESC',
						'posts_per_page' => $numposts,
						'ignore_sticky_posts' => 1
					));
					while ($pop_query->have_posts()) : $pop_query->the_post(); 
				?>
					<div class="recent-excerpt-wrap">
						<div class="recent-excerpt clearfix">
							<?php themebeagle_post_thumbnail(); ?>
							<h3 class="entry-title"><a href="<?php echo esc_url( get_permalink()); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
							<?php the_excerpt(); ?>
						</div>
					</div>
				<?php endwhile; wp_reset_query(); ?>
			</div>

		<?php } if ($show_comments) { ?>
			<!-- RECENT COMMENTS SLIDE -->	
			<div id="tabs-comments" class="tab-pane fade">		
				<?php
					$comments = get_comments(array('status' => 'approve','number' => $numposts));
					$output = "\n<div>";
					foreach ($comments as $comment) {
						$comment_text = strip_tags($comment->comment_content);
						$num_words = 12;
						$blah = explode(' ', $comment_text);
						if (count($blah) > $num_words) {
							$k = $num_words;
							$use_dotdotdot = 1;
						} else {
							$k = count($blah);
							$use_dotdotdot = 0;
						}
						$excerpt = '';
						for ($i=0; $i<$k; $i++) { $excerpt .= $blah[$i] . ' '; }
						$excerpt .= ($use_dotdotdot) ? '[...]' : '';
						$output .= "\n<div class='recent-excerpt-wrap'><div class='recent-excerpt clearfix'>" . get_avatar($comment,'96') . "<span class='title'>" . strip_tags($comment->comment_author) . " - " . date('F j, Y', strtotime($comment->comment_date)) . ":</span><br /><a href=\"" . get_permalink($comment->comment_post_ID)."#comment-" . $comment->comment_ID . "\">" . strip_tags($excerpt)."</a></div></div>";
					}
					$output .= "\n</div>";
					if ( $comment ) { 
						echo $output; 
					} else { 
						echo "<p class='recent-excerpt'>" . __('No Comments Yet', 'themebeagle') . "</p>";
					}
				?>
			</div>

		<?php } if ($show_archives) { ?>
			<!-- ARCHIVES SLIDE -->
			<div id="tabs-archives" class="tab-pane fade">
				<div class='recent-excerpt-wrap'>
					<select name="archive-dropdown" onchange='document.location.href=this.options[this.selectedIndex].value;'>
						<option value=""><?php echo esc_attr(__('Select a Month', 'themebeagle')); ?></option>
						<?php wp_get_archives('type=monthly&format=option&show_post_count=1'); ?>
					</select>
					<noscript><input type="submit" value="<?php _e("Go", "themebeagle"); ?>" /></noscript>
				</div>
				<div class='recent-excerpt-wrap'>
					<form action="<?php echo home_url(); ?>/" method="get">
						<?php
							$exclude = '';
							$exclude_cats = '';
							$exclude_cats = tb_option('exclude_cats');
							if ($exclude_cats) 
								$exclude = implode(",", $exclude_cats);
							$select = wp_dropdown_categories('show_option_none=' . __('Select a Category', 'themebeagle') .'&show_count=1&orderby=name&exclude=' . $exclude . '&echo=0&hierarchical=1&id=catdrop');
							$select = preg_replace("#<select([^>]*)>#", "<select$1 onchange='return this.form.submit()'>", $select);
							echo $select;
						?>
						<noscript><input type="submit" value="<?php _e("Go", "themebeagle"); ?>" /></noscript>
					</form>
				</div>
				<?php $hastags = get_tags(); if ($hastags) { ?>
					<div class='recent-excerpt-wrap'>
						<select name="tag-dropdown" onchange='document.location.href=this.options[this.selectedIndex].value;'>
							<option value=""><?php echo esc_attr(__('Select a Tag', 'themebeagle')); ?></option>
							<?php $posttags = get_tags('orderby=count&order=DESC&number=50'); ?>
							<?php if ($posttags) {
								foreach($posttags as $tag) {
									echo "<option value='";
									echo get_tag_link($tag);
									echo "'>";
									echo $tag->name;
									echo " (";
									echo $tag->count;
									echo ")";
									echo "</option>"; }
								} 
							?>
						</select>
						<noscript><input type="submit" value="<?php _e("Go", "themebeagle"); ?>" /></noscript>
					</div>
				<?php } ?>
			</div>
		<?php } ?>

	</div>

</div>