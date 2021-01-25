<?php

/*-----------------------------------------------------------------------------------*/
// This starts the Tabs widget.
/*-----------------------------------------------------------------------------------*/

add_action( 'widgets_init', 'tabs_load_widgets' );
function tabs_load_widgets() {
	register_widget( 'Tabs_Widget' );
}

class Tabs_Widget extends WP_Widget {

	function Tabs_Widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'tabs', 'description' => __('Adds the Tabs box for popular posts, archives, categories and tags.', "themebeagle") );
		/* Widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'tabs-widget' );
		/* Create the widget. */
		parent::__construct( 'tabs-widget', __('WP-Prosperity Tabs', "themebeagle"), $widget_ops, $control_ops );
	}

	function widget( $args, $instance ) {
		extract( $args );

		$instance = wp_parse_args( (array)$instance, array(
			'show_recent' => '',
			'show_popular' => '',
			'show_archives' => '',
			'show_comments' => '',
			'numposts' => ''
		));

		global $show_recent;
		global $show_popular;
		global $show_archives;
		global $show_comments;
		global $numposts;

		$show_recent = $instance['show_recent'];
		$show_popular = $instance['show_popular'];
		$show_archives = $instance['show_archives'];
		$show_comments = $instance['show_comments'];
		$numposts = $instance['numposts'];

		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Call the featured-tabs file. */
		get_template_part( 'featured-tabs' );

		/* After widget (defined by themes). */
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['show_recent'] = $new_instance['show_recent'];
		$instance['show_popular'] = $new_instance['show_popular'];
		$instance['show_archives'] = $new_instance['show_archives'];
		$instance['show_comments'] = $new_instance['show_comments'];
		$instance['numposts'] = strip_tags( $new_instance['numposts'] );
		return $instance;
	}

	function form($instance) {

		$defaults = array(
			'show_recent' => '1',
			'show_popular' => '1',
			'show_archives' => 1,
			'show_comments' => '1',
			'numposts' => '5'
		);

		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<p><input id="<?php echo $this->get_field_id('show_recent'); ?>" type="checkbox" name="<?php echo $this->get_field_name('show_recent'); ?>" value="1" <?php checked(1, $instance['show_recent']); ?>/> <label for="<?php echo $this->get_field_id('show_recent'); ?>"><?php _e('Show Recent Posts', 'themebeagle'); ?></label></p>

		<p><input id="<?php echo $this->get_field_id('show_popular'); ?>" type="checkbox" name="<?php echo $this->get_field_name('show_popular'); ?>" value="1" <?php checked(1, $instance['show_popular']); ?>/> <label for="<?php echo $this->get_field_id('show_popular'); ?>"><?php _e('Show Most Viewed Posts', 'themebeagle'); ?></label></p>

		<p><input id="<?php echo $this->get_field_id('show_archives'); ?>" type="checkbox" name="<?php echo $this->get_field_name('show_archives'); ?>" value="1" <?php checked(1, $instance['show_archives']); ?>/> <label for="<?php echo $this->get_field_id('show_archives'); ?>"><?php _e('Show Archives', 'themebeagle'); ?></label></p>

		<p><input id="<?php echo $this->get_field_id('show_comments'); ?>" type="checkbox" name="<?php echo $this->get_field_name('show_comments'); ?>" value="1" <?php checked(1, $instance['show_comments']); ?>/> <label for="<?php echo $this->get_field_id('show_comments'); ?>"><?php _e('Show Recent Comments', 'themebeagle'); ?></label></p>

		<p><label for="<?php echo $this->get_field_id( 'numposts' ); ?>"><?php _e('Number of Posts in Each Section:', 'themebeagle'); ?>&nbsp;</label> 
		<input id="<?php echo $this->get_field_id("numposts"); ?>" name="<?php echo $this->get_field_name("numposts"); ?>" type="text" value="<?php echo esc_attr($instance["numposts"]); ?>" /></p>

	<?php }

}

/*-----------------------------------------------------------------------------------*/
// Social Media Icons widget
// @since 1.0
/*-----------------------------------------------------------------------------------*/

add_action( 'widgets_init', 'socialicons_load_widgets' );
function socialicons_load_widgets() {
	register_widget( 'Socialicons_Widget' );
}

class Socialicons_Widget extends WP_Widget {

	function Socialicons_Widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'socialicons', 'description' => __('Adds the Social Media Icons.', "themebeagle") );
		/* Widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'socialicons-widget' );
		/* Create the widget. */
		parent::__construct( 'socialicons-widget', __('WP-Prosperity Social Media Icons', "themebeagle"), $widget_ops, $control_ops );
	}

	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$intro = $instance['intro'];
		$style = $instance['style'];
		$shape = $instance['shape'];

		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $title )
			echo $before_title . $title . $after_title; 
		?>

		<div class="textwidget <?php echo $style; ?> <?php echo $shape; ?>">

		<?php /* Display intro from widget settings if one was input. */
		if ( $intro )
			printf( '<p>' . __('%1$s', "themebeagle") . '</p>', $intro );

		get_template_part('icons-site');

		printf( '</div>' );

		/* After widget (defined by themes). */
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and intro to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['intro'] = strip_tags( $new_instance['intro'] );
		$instance['style'] = $new_instance['style'];
		$instance['shape'] = $new_instance['shape'];

		return $instance;
	}

	function form( $instance ) {

		/* Set up some default widget settings. */

		$defaults = array(
			'title' => __('Lets Connect', 'themebeagle'),
			'intro' => __("We'd love to connect with you on any of the following social media platforms.", "themebeagle"),
			'style' => 'grayscale',
			'shape' => 'square'
		);

		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'themebeagle'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id("title"); ?>" name="<?php echo $this->get_field_name("title"); ?>" type="text" value="<?php echo esc_attr($instance["title"]); ?>" /></p>

		<!-- Intro: Text Input -->
		<p><label for="<?php echo $this->get_field_id( 'intro' ); ?>"><?php _e('Introduction:', 'themebeagle'); ?></label>
		<textarea style="width:100%;" rows="3" id="<?php echo $this->get_field_id( 'intro' ); ?>" name="<?php echo $this->get_field_name( 'intro' ); ?>"><?php echo $instance['intro']; ?></textarea></p>

		<!-- Icon Style  -->
		<p><label for="<?php echo $this->get_field_id('style'); ?>"><?php _e('Icon Style', 'themebeagle'); ?>:<br /></label>
		<select id="<?php echo $this->get_field_id('style'); ?>" name="<?php echo $this->get_field_name('style'); ?>">
			<option style="padding-right:10px;" value="grayscale" <?php selected('grayscale', $instance['style']); ?>>- <?php _e('Grayscale', 'themebeagle'); ?> -</option>
			<option style="padding-right:10px;" value="color" <?php selected('color', $instance['style']); ?>>- <?php _e('Color', 'themebeagle'); ?> -</option>
			<option style="padding-right:10px;" value="dark" <?php selected('dark', $instance['style']); ?>>- <?php _e('Dark', 'themebeagle'); ?> -</option>
			<option style="padding-right:10px;" value="clear" <?php selected('clear', $instance['style']); ?>>- <?php _e('Clear', 'themebeagle'); ?> -</option>
		</select></p>

		<!-- Icon Style  -->
		<p><label for="<?php echo $this->get_field_id('shape'); ?>"><?php _e('Icon Shape', 'themebeagle'); ?>:<br /></label>
		<select id="<?php echo $this->get_field_id('shape'); ?>" name="<?php echo $this->get_field_name('shape'); ?>">
			<option style="padding-right:10px;" value="square" <?php selected('square', $instance['shape']); ?>>- <?php _e('Square', 'themebeagle'); ?> -</option>
			<option style="padding-right:10px;" value="round" <?php selected('round', $instance['shape']); ?>>- <?php _e('Round', 'themebeagle'); ?> -</option>
		</select></p>

	<?php }
}

/*-----------------------------------------------------------------------------------*/
// This starts the Category Posts widget.
/*-----------------------------------------------------------------------------------*/

add_action( 'widgets_init', 'catposts_load_widgets' );
function catposts_load_widgets() {
	register_widget( 'Catposts_Widget' );
}

class Catposts_Widget extends WP_Widget {

	function Catposts_Widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'catposts', 'description' => __('Adds posts from a specific category .', "themebeagle") );
		/* Widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'catposts-widget' );
		/* Create the widget. */
		parent::__construct( 'catposts-widget', __('WP-Prosperity Category Posts', "themebeagle"), $widget_ops, $control_ops );
	}

	function widget( $args, $instance ) {
		extract( $args );

		$instance = wp_parse_args( (array)$instance, array(
			'title' => '',
			'cat' => '',
			'num' => '',
			'title_link' => ''
		));

		global $post;
		$post_old = $post; // Save the post object.

		// If no title, use the name of the category.
		if( !$instance["title"] ) {
			$category_info = get_category($instance["cat"]);
			$instance["title"] = $category_info->name;
		}

		// Get array of post info.
		$cat_posts = new WP_Query(array(
			'posts_per_page' => $instance["num"], 
			'cat' => $instance["cat"]
		));

		/* Before widget (defined by themes). */
		echo $before_widget;

		// Widget title
		echo $before_title;
		if( $instance["title_link"] )
			echo '<a href="' . get_category_link($instance["cat"]) . '">' . $instance["title"] . '</a>';
		else
			echo $instance["title"];
		echo $after_title;

		// Post list
		echo "<div class='cat-posts-widget textwidget'>\n";

		while ( $cat_posts->have_posts() ) {
			$cat_posts->the_post();
		?>
				<div class="recent-excerpt-wrap">
					<div class="recent-excerpt clearfix">
						<?php themebeagle_post_thumbnail(); ?>
						<h3 class="entry-title"><a href="<?php echo esc_url( get_permalink()); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
						<?php the_excerpt(); ?>
					</div>
				</div>
		<?php }

		echo "</div>\n";

		echo $after_widget;

		$post = $post_old; // Restore the post object.
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		//Strip tags from title and name to remove HTML
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['cat'] = $new_instance['cat'];
		$instance['num'] = $new_instance['num'];
		$instance['title_link'] = $new_instance['title_link'];

		return $instance;
	}

	function form($instance) {

		$defaults = array(
			'title' => '',
			'cat' => '',
			'num' => 3,
			'title_link' => '',
		);

		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<p>
			<label for="<?php echo $this->get_field_id("title"); ?>">
				<?php _e( 'Title', 'themebeagle' ); ?>:
				<input class="widefat" id="<?php echo $this->get_field_id("title"); ?>" name="<?php echo $this->get_field_name("title"); ?>" type="text" value="<?php echo esc_attr($instance["title"]); ?>" />
			</label>
		</p>

		<p>
			<label>
				<?php _e( 'Category', 'themebeagle' ); ?>:
				<?php wp_dropdown_categories( array( 'name' => $this->get_field_name("cat"), 'selected' => $instance["cat"] ) ); ?>
			</label>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id("num"); ?>">
				<?php _e('Number of Posts to Show', 'themebeagle'); ?>:
				<input style="text-align: center;" id="<?php echo $this->get_field_id("num"); ?>" name="<?php echo $this->get_field_name("num"); ?>" type="text" value="<?php echo absint($instance["num"]); ?>" size='3' />
			</label>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id("title_link"); ?>">
				<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("title_link"); ?>" name="<?php echo $this->get_field_name("title_link"); ?>"<?php checked( (bool) $instance["title_link"], true ); ?> />
				<?php _e( 'Make widget title link', 'themebeagle' ); ?>
			</label>
		</p>

	<?php }
}

/*-----------------------------------------------------------------------------------*/
// This starts the Featured Page Widget.
/*-----------------------------------------------------------------------------------*/

add_action('widgets_init', create_function('', "register_widget('Featured_Page');"));

class Featured_Page extends WP_Widget {

	function Featured_Page() {
		$widget_ops = array( 'classname' => 'featuredpage', 'description' => __('Displays a featured page with thumbnail and excerpt.', 'themebeagle') );
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'featured-page' );
		parent::__construct( 'featured-page', __('WP-Prosperity Featured Page', 'themebeagle'), $widget_ops, $control_ops );
	}

	function widget($args, $instance) {
		extract($args);

		$instance = wp_parse_args( (array)$instance, array(
			'title' => '',
			'page_id' => '',
			'show_image' => 0,
			'image_alignment' => '',
			'image_valignment' => '',
			'image_size' => '',
			'show_title' => 0,
			'show_content' => 0,
			'content_limit' => '',
			'custom_excerpt' => '',
			'more_text' => ''
		));

		global $post;
		// DON'T DISPLAY THE WIDGET IF WE'RE VIEWING THE PAGE THAT MATCHES THE FEATURED PAGE
		if ( $post->ID != $instance['page_id'] ) {

			echo $before_widget;

			$featured_page = new WP_Query(array(
				'page_id' => $instance['page_id']
			));

			if ( $featured_page->have_posts() ) : while( $featured_page->have_posts() ) : $featured_page->the_post(); ?>

				<div class="featpage-widget">

					<?php if ( !empty($instance['show_image']) && empty($instance['image_alignment']) && $instance['image_valignment'] == "above" ) { ?>
						<div class="featpage-image">
							<?php themebeagle_medium_thumbnail(); ?>
						</div>
					<?php } ?>

					<?php if (!empty($instance['show_title'])) : ?>
						<?php echo $before_title . '<a href="' . get_permalink() . '">' . apply_filters('widget_title', get_the_title()) . '</a>' . $after_title; ?>
					<?php elseif (!empty($instance['title'])) : ?>
						<?php echo $before_title . '<a href="' . get_permalink() . '">' . apply_filters('widget_title', $instance['title']) . '</a>' . $after_title; ?>
					<?php endif; ?>

					<?php if ( !empty($instance['show_image']) && empty($instance['image_alignment']) && $instance['image_valignment'] == "below" ) { ?>
						<div class="featpage-image">
							<?php themebeagle_medium_thumbnail(); ?>
						</div>
					<?php } ?>

					<?php if ( !empty($instance['show_image']) && !empty($instance['image_alignment']) ) { ?>
						<div class="featpage-image <?php echo $instance['image_alignment']; ?>">
							<?php themebeagle_post_thumbnail(); ?>
						</div>
					<?php } ?>

					<?php if(!empty($instance['show_content']) && empty($instance['custom_excerpt'])) : ?>
						<span class="featpage-excerpt">
							<?php 
								$excerpt = get_the_excerpt(); 
								echo string_limit_words($excerpt,$instance['content_limit']) . ' ... '; 
							?>
						</span>
					<?php endif; ?>

					<?php if(!empty($instance['custom_excerpt'])) : ?>
						 <span class="featpage-excerpt">
							<?php echo $instance['custom_excerpt']; ?>
						</span>
					<?php endif; ?>

					<?php if(!empty($instance['more_text'])) : ?>
						<span class="featpage-more">
							<a href="<?php the_permalink() ?>" rel="nofollow"><?php echo esc_html( $instance['more_text'] ); ?></a>
						</span>
					<?php endif; ?>

				</div>

			<?php endwhile; endif; wp_reset_query();

			echo $after_widget;

		}
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		//Strip tags from title and name to remove HTML
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['page_id'] = $new_instance['page_id'];
		$instance['show_image'] = $new_instance['show_image'];
		$instance['image_alignment'] = $new_instance['image_alignment'];
		$instance['image_valignment'] = $new_instance['image_valignment'];
		$instance['image_size'] = $new_instance['image_size'];
		$instance['show_title'] = $new_instance['show_title'];
		$instance['show_content'] = $new_instance['show_content'];
		$instance['content_limit'] = $new_instance['content_limit'];
		$instance['custom_excerpt'] = $new_instance['custom_excerpt'];
		$instance['more_text'] = strip_tags( $new_instance['more_text'] );

		return $instance;
	}

	function form($instance) {

		$defaults = array(
			'title' => '',
			'page_id' => '',
			'show_image' => 0,
			'image_alignment' => '',
			'image_valignment' => 'above',
			'image_size' => '',
			'show_title' => 0,
			'show_content' => 0,
			'content_limit' => '30',
			'custom_excerpt' => '',
			'more_text' => 'Read More &raquo;'
		);

		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'themebeagle'); ?>:</label>
		<input type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" style="width:95%;" /></p>

		<p><label for="<?php echo $this->get_field_id('page_id'); ?>"><?php _e('Page', 'themebeagle'); ?>:<br /></label>
		<?php wp_dropdown_pages(array('name' => $this->get_field_name('page_id'), 'selected' => $instance['page_id'])); ?></p>

		<p><input id="<?php echo $this->get_field_id('show_image'); ?>" type="checkbox" name="<?php echo $this->get_field_name('show_image'); ?>" value="1" <?php checked(1, $instance['show_image']); ?>/> <label for="<?php echo $this->get_field_id('show_image'); ?>"><?php _e('Show Page Image', 'themebeagle'); ?></label></p>

		<p><label for="<?php echo $this->get_field_id('image_alignment'); ?>"><?php _e('Image Alignment', 'themebeagle'); ?>:<br /></label>
		<select id="<?php echo $this->get_field_id('image_alignment'); ?>" name="<?php echo $this->get_field_name('image_alignment'); ?>">
			<option style="padding-right:10px;" value="">- <?php _e('Top', 'themebeagle'); ?> -</option>
			<option style="padding-right:10px;" value="left" <?php selected('left', $instance['image_alignment']); ?>>- <?php _e('Left', 'themebeagle'); ?> -</option>
			<option style="padding-right:10px;" value="right" <?php selected('right', $instance['image_alignment']); ?>>- <?php _e('Right', 'themebeagle'); ?> -</option>
		</select></p>

		<p><label for="<?php echo $this->get_field_id('image_valignment'); ?>"><?php _e('Image Above Title or Below (for "Top" alignment only)', 'themebeagle'); ?>:<br /></label>
		<select id="<?php echo $this->get_field_id('image_valignment'); ?>" name="<?php echo $this->get_field_name('image_valignment'); ?>">
			<option style="padding-right:10px;" value="above" <?php selected('above', $instance['image_valignment']); ?>>- <?php _e('Above Title', 'themebeagle'); ?> -</option>
			<option style="padding-right:10px;" value="below" <?php selected('below', $instance['image_valignment']); ?>>- <?php _e('Below Title', 'themebeagle'); ?> -</option>
		</select></p>

		<p><input id="<?php echo $this->get_field_id('show_title'); ?>" type="checkbox" name="<?php echo $this->get_field_name('show_title'); ?>" value="1" <?php checked(1, $instance['show_title']); ?>/> <label for="<?php echo $this->get_field_id('show_title'); ?>"><?php _e('Show Page Title in Place of Widget Title', 'themebeagle'); ?></label></p>

		<p><input id="<?php echo $this->get_field_id('show_content'); ?>" type="checkbox" name="<?php echo $this->get_field_name('show_content'); ?>" value="1" <?php checked(1, $instance['show_content']); ?>/> <label for="<?php echo $this->get_field_id('show_content'); ?>"><?php _e('Show Page Content', 'themebeagle'); ?></label></p>

		<p><label for="<?php echo $this->get_field_id('content_limit'); ?>"><?php _e('Word Limit', 'themebeagle'); ?>:</label>
		<input type="text" id="<?php echo $this->get_field_id('content_limit'); ?>" name="<?php echo $this->get_field_name('content_limit'); ?>" value="<?php echo esc_attr( $instance['content_limit'] ); ?>" size="3" /></p>

		<p><label for="<?php echo $this->get_field_id( 'custom_excerpt' ); ?>"><?php _e('Custom Excerpt (leave blank to use Page content as Excerpt):', "themebeagle"); ?></label>
		<textarea rows="16" id="<?php echo $this->get_field_id( 'custom_excerpt' ); ?>" name="<?php echo $this->get_field_name( 'custom_excerpt' ); ?>" style="width:100%;"><?php echo $instance['custom_excerpt']; ?></textarea></p>

		<p><label for="<?php echo $this->get_field_id('more_text'); ?>"><?php _e('Read More Text', 'themebeagle'); ?>:</label>
		<input type="text" id="<?php echo $this->get_field_id('more_text'); ?>" name="<?php echo $this->get_field_name('more_text'); ?>" value="<?php echo esc_attr( $instance['more_text'] ); ?>" /></p>

	<?php
	}
}

/*-----------------------------------------------------------------------------------*/
// This starts the Featured Post Widget.
/*-----------------------------------------------------------------------------------*/

add_action('widgets_init', create_function('', "register_widget('Featured_Post');"));

class Featured_Post extends WP_Widget {

	function Featured_Post() {
		$widget_ops = array( 'classname' => 'featuredpage', 'description' => __('Displays a featured post with thumbnail and excerpt.', 'themebeagle') );
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'featured-post' );
		parent::__construct( 'featured-post', __('WP-Prosperity Featured Post', 'themebeagle'), $widget_ops, $control_ops );
	}

	function widget($args, $instance) {
		extract($args);

		$instance = wp_parse_args( (array)$instance, array(
			'title' => '',
			'post_id' => '',
			'show_image' => 0,
			'image_alignment' => '',
			'image_valignment' => '',
			'image_size' => '',
			'show_title' => 0,
			'show_content' => 0,
			'content_limit' => '',
			'custom_excerpt' => '',
			'more_text' => ''
		));

		global $post;
		// DON'T DISPLAY THE WIDGET IF WE'RE VIEWING THE PAGE THAT MATCHES THE FEATURED PAGE
		if ( is_single() && $post->ID == $instance['post_id'] ) { } else {

			echo $before_widget;

			global $do_not_duplicate;
			$featured_post = new WP_Query(array(
				'p' => $instance['post_id']
			));

			if ( $featured_post->have_posts() ) : while( $featured_post->have_posts() ) : $featured_post->the_post(); ?>

				<div class="featpage-widget clearfix">

					<?php if ( !empty($instance['show_image']) && empty($instance['image_alignment']) && $instance['image_valignment'] == "above" ) { ?>
						<div class="featpage-image">
							<?php themebeagle_medium_thumbnail(); ?>
						</div>
					<?php } ?>

					<?php if (!empty($instance['show_title'])) : ?>
						<?php echo $before_title . '<a href="' . get_permalink() . '">' . apply_filters('widget_title', get_the_title()) . '</a>' . $after_title; ?>
					<?php elseif (!empty($instance['title'])) : ?>
						<?php echo $before_title . '<a href="' . get_permalink() . '">' . apply_filters('widget_title', $instance['title']) . '</a>' . $after_title; ?>
					<?php endif; ?>

					<?php if ( !empty($instance['show_image']) && empty($instance['image_alignment']) && $instance['image_valignment'] == "below" ) { ?>
						<div class="featpage-image">
							<?php themebeagle_medium_thumbnail(); ?>
						</div>
					<?php } ?>

					<?php if ( !empty($instance['show_image']) && !empty($instance['image_alignment']) ) { ?>
						<div class="featpage-image <?php echo $instance['image_alignment']; ?>">
							<?php themebeagle_post_thumbnail(); ?>
						</div>
					<?php } ?>

					<?php if(!empty($instance['show_content']) && empty($instance['custom_excerpt'])) : ?>
						<span class="featpage-excerpt">
							<?php 
								$excerpt = get_the_excerpt(); 
								echo string_limit_words($excerpt,$instance['content_limit']) . ' ... '; 
							?>
						</span>
					<?php endif; ?>

					<?php if(!empty($instance['custom_excerpt'])) : ?>
						 <span class="featpage-excerpt">
							<?php echo $instance['custom_excerpt']; ?>
						</span>
					<?php endif; ?>

					<?php if(!empty($instance['more_text'])) : ?>
						<span class="featpage-more">
							<a href="<?php the_permalink() ?>" rel="nofollow"><?php echo esc_html( $instance['more_text'] ); ?></a>
						</span>
					<?php endif; ?>

				</div>

			<?php endwhile; endif; wp_reset_query();

			echo $after_widget;

		}
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		//Strip tags from title and name to remove HTML
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['post_id'] = $new_instance['post_id'];
		$instance['show_image'] = $new_instance['show_image'];
		$instance['image_alignment'] = $new_instance['image_alignment'];
		$instance['image_valignment'] = $new_instance['image_valignment'];
		$instance['image_size'] = $new_instance['image_size'];
		$instance['show_title'] = $new_instance['show_title'];
		$instance['show_content'] = $new_instance['show_content'];
		$instance['content_limit'] = $new_instance['content_limit'];
		$instance['custom_excerpt'] = $new_instance['custom_excerpt'];
		$instance['more_text'] = strip_tags( $new_instance['more_text'] );

		return $instance;
	}

	function form($instance) {

		$defaults = array(
			'title' => '',
			'post_id' => '',
			'show_image' => 0,
			'image_alignment' => '',
			'image_valignment' => 'above',
			'image_size' => '',
			'show_title' => 0,
			'show_content' => 0,
			'content_limit' => '30',
			'custom_excerpt' => '',
			'more_text' => 'Read More &raquo;'
		);

		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'themebeagle'); ?>:</label>
		<input type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" style="width:95%;" /></p>

		<p><label for="<?php echo $this->get_field_id('post_id'); ?>"><?php _e('Post ID', 'themebeagle'); ?>:<br /></label>
		<input type="text" id="<?php echo $this->get_field_id('post_id'); ?>" name="<?php echo $this->get_field_name('post_id'); ?>" value="<?php echo esc_attr( $instance['post_id'] ); ?>" /></p>

		<p><input id="<?php echo $this->get_field_id('show_image'); ?>" type="checkbox" name="<?php echo $this->get_field_name('show_image'); ?>" value="1" <?php checked(1, $instance['show_image']); ?>/> <label for="<?php echo $this->get_field_id('show_image'); ?>"><?php _e('Show Post Image', 'themebeagle'); ?></label></p>

		<p><label for="<?php echo $this->get_field_id('image_alignment'); ?>"><?php _e('Image Alignment', 'themebeagle'); ?>:<br /></label>
		<select id="<?php echo $this->get_field_id('image_alignment'); ?>" name="<?php echo $this->get_field_name('image_alignment'); ?>">
			<option style="padding-right:10px;" value="">- <?php _e('Top', 'themebeagle'); ?> -</option>
			<option style="padding-right:10px;" value="left" <?php selected('left', $instance['image_alignment']); ?>>- <?php _e('Left', 'themebeagle'); ?> -</option>
			<option style="padding-right:10px;" value="right" <?php selected('right', $instance['image_alignment']); ?>>- <?php _e('Right', 'themebeagle'); ?> -</option>
		</select></p>

		<p><label for="<?php echo $this->get_field_id('image_valignment'); ?>"><?php _e('Image Above Title or Below (for "Top" alignment only)', 'themebeagle'); ?>:<br /></label>
		<select id="<?php echo $this->get_field_id('image_valignment'); ?>" name="<?php echo $this->get_field_name('image_valignment'); ?>">
			<option style="padding-right:10px;" value="above" <?php selected('above', $instance['image_valignment']); ?>>- <?php _e('Above Title', 'themebeagle'); ?> -</option>
			<option style="padding-right:10px;" value="below" <?php selected('below', $instance['image_valignment']); ?>>- <?php _e('Below Title', 'themebeagle'); ?> -</option>
		</select></p>

		<p><input id="<?php echo $this->get_field_id('show_title'); ?>" type="checkbox" name="<?php echo $this->get_field_name('show_title'); ?>" value="1" <?php checked(1, $instance['show_title']); ?>/> <label for="<?php echo $this->get_field_id('show_title'); ?>"><?php _e('Show Post Title in Place of Widget Title', 'themebeagle'); ?></label></p>

		<p><input id="<?php echo $this->get_field_id('show_content'); ?>" type="checkbox" name="<?php echo $this->get_field_name('show_content'); ?>" value="1" <?php checked(1, $instance['show_content']); ?>/> <label for="<?php echo $this->get_field_id('show_content'); ?>"><?php _e('Show Post Content', 'themebeagle'); ?></label></p>

		<p><label for="<?php echo $this->get_field_id('content_limit'); ?>"><?php _e('Word Limit', 'themebeagle'); ?>:</label>
		<input type="text" id="<?php echo $this->get_field_id('content_limit'); ?>" name="<?php echo $this->get_field_name('content_limit'); ?>" value="<?php echo esc_attr( $instance['content_limit'] ); ?>" size="3" /></p>

		<p><label for="<?php echo $this->get_field_id( 'custom_excerpt' ); ?>"><?php _e('Custom Excerpt (leave blank to use Post content as Excerpt):', "themebeagle"); ?></label>
		<textarea rows="16" id="<?php echo $this->get_field_id( 'custom_excerpt' ); ?>" name="<?php echo $this->get_field_name( 'custom_excerpt' ); ?>" style="width:100%;"><?php echo $instance['custom_excerpt']; ?></textarea></p>

		<p><label for="<?php echo $this->get_field_id('more_text'); ?>"><?php _e('Read More Text', 'themebeagle'); ?>:</label>
		<input type="text" id="<?php echo $this->get_field_id('more_text'); ?>" name="<?php echo $this->get_field_name('more_text'); ?>" value="<?php echo esc_attr( $instance['more_text'] ); ?>" /></p>

	<?php
	}
}

/*-----------------------------------------------------------------------------------*/
// This starts the Subscribe Box widget.
/*-----------------------------------------------------------------------------------*/

add_action( 'widgets_init', 'subscribebox_load_widgets' );

function subscribebox_load_widgets() {
	register_widget( 'SubscribeBox_Widget' );
}

class SubscribeBox_Widget extends WP_Widget {

	function SubscribeBox_Widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'subscribebox', 'description' => __('Adds an email subscription form and/or Social Media Icons.', "themebeagle") );
		/* Widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'subscribebox-widget' );
		/* Create the widget. */
		parent::__construct( 'subscribebox-widget', __('WP-Prosperity Subscribe Box', "themebeagle"), $widget_ops, $control_ops );
	}

	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$showform = $instance['showform'];
		$intro = $instance['intro'];
		$boxed = $instance['boxed'];
		$showicons = $instance['showicons'];
		$style = $instance['style'];
		$shape = $instance['shape'];

		/* Before widget (defined by themes). */
		echo $before_widget; ?>

		<div class="clearfix <?php echo $boxed; ?>">

		<?php /* Display the widget title if one was input (before and after defined by themes). */
		if ( $title )
			echo $before_title . $title . $after_title; 
		?>

		<div class="textwidget <?php echo $style; ?> <?php echo $shape; ?>">

		<?php /* Display intro from widget settings if one was input. */
		if ( $intro )
			printf( '<p class="email-intro">' . __('%1$s', "themebeagle") . '</p>', $intro );

			if ( $showform && tb_option('email_form') == 'feedburner' && tb_option('fb_feed_uri') ) { ?>

				<div class="email-form">
					<form action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=<?php echo tb_option('fb_feed_uri'); ?>', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
						<input type="hidden" value="<?php echo tb_option('fb_feed_uri'); ?>" name="uri"/>
						<input type="hidden" name="loc" value="en_US"/>
						<input type="email" class="email-field" name="email" placeholder="enter email address" /><input type="submit" value="<?php _e("Submit", "themebeagle"); ?>" class="email-submit" />
						<p class="privacy-line"><?php _e("Privacy guaranteed. We never share your info.", "themebeagle"); ?></p>
					</form>
				</div>

			<?php } elseif ( $showform && tb_option('email_form') == 'alt_email_form' && tb_option('alt_email_form_code') ) { ?>

				<div class="email-form">
					<?php echo stripslashes(tb_option('alt_email_form_code')); ?>

				</div>

			<?php }

			if ( $showicons )
				get_template_part('icons-site');

		printf( '</div></div>' );

		/* After widget (defined by themes). */
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and intro to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['showform'] = $new_instance['showform'];
		$instance['intro'] = strip_tags( $new_instance['intro'] );
		$instance['boxed'] = $new_instance['boxed'];
		$instance['showicons'] = $new_instance['showicons'];
		$instance['style'] = $new_instance['style'];
		$instance['shape'] = $new_instance['shape'];

		return $instance;
	}

	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array(
			'title' => __('Subscribe', "themebeagle"),
			'showform' => '1',
			'intro' => __('Enter your email address below to receive updates whenever we publish new content.', "themebeagle"),
			'boxed' => 'boxed',
			'showicons' => '',
			'style' => 'grayscale',
			'shape' => 'square'
		);

		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', "themebeagle"); ?></label>
		<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" /></p>

		<!-- Show Subscription Form Checkbox  -->
		<p><input id="<?php echo $this->get_field_id('showform'); ?>" type="checkbox" name="<?php echo $this->get_field_name('showform'); ?>" value="1" <?php checked(1, $instance['showform']); ?>/> <label for="<?php echo $this->get_field_id('showform'); ?>"><?php _e('Show Email Subscription Form', 'themebeagle'); ?></label></p>

		<p style="padding:15px 20px;background:#f8f8f8;border:1px solid #eee;"><?php _e('If not already completed, Email Subscription Form settings should be entered on Theme Settings page.', 'themebeagle'); ?></label></p>

		<!-- Intro: Text Input -->
		<p><label for="<?php echo $this->get_field_id( 'intro' ); ?>"><?php _e('Introduction:', "themebeagle"); ?></label>
		<textarea rows="3" id="<?php echo $this->get_field_id( 'intro' ); ?>" name="<?php echo $this->get_field_name( 'intro' ); ?>" style="width:100%;"><?php echo $instance['intro']; ?></textarea></p>

		<!-- Boxed or Unboxed Select  -->
		<p><label for="<?php echo $this->get_field_id('boxed'); ?>"><?php _e('Boxed or Unboxed', 'themebeagle'); ?>:<br /></label>
		<select id="<?php echo $this->get_field_id('boxed'); ?>" name="<?php echo $this->get_field_name('boxed'); ?>">
			<option style="padding-right:10px;" value="unboxed" <?php selected('unboxed', $instance['boxed']); ?>>- <?php _e('Unboxed', 'themebeagle'); ?> -</option>
			<option style="padding-right:10px;" value="boxed" <?php selected('boxed', $instance['boxed']); ?>>- <?php _e('Boxed', 'themebeagle'); ?> -</option>
		</select></p>

		<div style="padding:10px 20px;background:#f8f8f8;border:1px solid #eee;margin:30px auto;">

			<!-- Show Icons Checkbox  -->
			<p><input id="<?php echo $this->get_field_id('showicons'); ?>" type="checkbox" name="<?php echo $this->get_field_name('showicons'); ?>" value="1" <?php checked(1, $instance['showicons']); ?>/> <label for="<?php echo $this->get_field_id('showicons'); ?>"><?php _e('Show Social Media Icons', 'themebeagle'); ?></label></p>

			<!-- Icon Style  -->
			<p><label for="<?php echo $this->get_field_id('style'); ?>"><?php _e('Icon Style', 'themebeagle'); ?>:<br /></label>
			<select id="<?php echo $this->get_field_id('style'); ?>" name="<?php echo $this->get_field_name('style'); ?>">
				<option style="padding-right:10px;" value="grayscale" <?php selected('grayscale', $instance['style']); ?>>- <?php _e('Grayscale', 'themebeagle'); ?> -</option>
				<option style="padding-right:10px;" value="color" <?php selected('color', $instance['style']); ?>>- <?php _e('Color', 'themebeagle'); ?> -</option>
				<option style="padding-right:10px;" value="dark" <?php selected('dark', $instance['style']); ?>>- <?php _e('Dark', 'themebeagle'); ?> -</option>
				<option style="padding-right:10px;" value="clear" <?php selected('clear', $instance['style']); ?>>- <?php _e('Clear', 'themebeagle'); ?> -</option>
			</select></p>

			<!-- Icon Style  -->
			<p><label for="<?php echo $this->get_field_id('shape'); ?>"><?php _e('Icon Shape', 'themebeagle'); ?>:<br /></label>
			<select id="<?php echo $this->get_field_id('shape'); ?>" name="<?php echo $this->get_field_name('shape'); ?>">
				<option style="padding-right:10px;" value="square" <?php selected('square', $instance['shape']); ?>>- <?php _e('Square', 'themebeagle'); ?> -</option>
				<option style="padding-right:10px;" value="round" <?php selected('round', $instance['shape']); ?>>- <?php _e('Round', 'themebeagle'); ?> -</option>
			</select></p>

		</div>

	<?php
	}
}

/*-----------------------------------------------------------------------------------*/
// This starts the WP-Prosperity Text Widget.
/*-----------------------------------------------------------------------------------*/

add_action( 'widgets_init', 'prosperitytext_load_widgets' );

function prosperitytext_load_widgets() {
	register_widget( 'ProsperityText_Widget' );
}

class ProsperityText_Widget extends WP_Widget {

	function ProsperityText_Widget() {

		/* Widget settings. */
		$widget_ops = array( 'classname' => 'prosperitytext', 'description' => __('Adds the WP-Prosperity text widget.', 'themebeagle') );
		/* Widget control settings. */
		$control_ops = array( 'width' => 400, 'height' => 700, 'id_base' => 'prosperitytext-widget' );
		/* Create the widget. */
		parent::__construct( 'prosperitytext-widget', __('WP-Prosperity Text Widget', 'themebeagle'), $widget_ops, $control_ops );

		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_action( 'admin_footer-widgets.php', array( $this, 'print_scripts' ), 9999 );

	}

	function enqueue_scripts( $hook_suffix ) {
		if ( 'widgets.php' !== $hook_suffix ) {
			return;
		}

		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'wp-color-picker' );
		wp_enqueue_script( 'underscore' );
	}

	// Color Picker reference: https://core.trac.wordpress.org/ticket/25809 
	function print_scripts() {
		?>
		<script>
			( function( $ ){
				function initColorPicker( widget ) {
					widget.find( '.color-picker' ).wpColorPicker( {
						change: _.throttle( function() { // For Customizer
							$(this).trigger( 'change' );
						}, 3000 )
					});
				}

				function onFormUpdate( event, widget ) {
					initColorPicker( widget );
				}

				$( document ).on( 'widget-added widget-updated', onFormUpdate );

				$( document ).ready( function() {
					$( '#widgets-right .widget:has(.color-picker)' ).each( function () {
						initColorPicker( $( this ) );
					} );
				} );
			}( jQuery ) );
		</script>
		<?php
	}

	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$background_color = $instance['background_color'];
		$background_img = $instance['background_img'];
		$font_color = $instance['font_color'];
		$centered = $instance['centered'];
		$do_wide = $instance['do_wide'];
		$unwrap = $instance['unwrap'];
		$message = $instance['message'];
		$paddingtop = $instance['paddingtop'];
		$paddingbottom = $instance['paddingbottom'];
		$fontsize = $instance['fontsize'];

		/* Before widget (defined by themes). */
		echo $before_widget;


		if ( !empty($background_img) && $background_img != 'none' ) {
			$bg_img = $background_img;
		} else {
			$bg_img = get_template_directory_uri() . '/images/blank.gif';
		}

		$align = 'left';
		if ( !empty($centered) )
			$align = 'center';

		$wrap = 'wrap';
		if ( !empty($unwrap) )
			$wrap = 'unwrap';

		if ( !empty($do_wide) )
			printf('<div class="prosperity-text wide" style="font-size:'.$fontsize.'px;padding-top:'.$paddingtop.'px;padding-bottom:'.$paddingbottom.'px;background-image:url('.$bg_img.');text-align:'.$align.';background-color:'.$background_color.';color:'.$font_color.'!important;"><div class="'.$wrap.'">');
		else
			printf('<div class="wrap"><div class="prosperity-text" style="font-size:'.$fontsize.'px;padding-top:'.$paddingtop.'px;padding-bottom:'.$paddingbottom.'px;background-image:url('.$bg_img.');text-align:'.$align.';background-color:'.$background_color.';color:'.$font_color.'!important;">');

		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $title )
			echo $before_title . $title . $after_title;

		/* Display message from widget settings if one was input. */
		if ( $message )
			echo do_shortcode($message); 

		printf('</div>');
		printf('</div>');

		/* After widget (defined by themes). */
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['background_color'] = $new_instance['background_color'];
		$instance['background_img'] = $new_instance['background_img'];
		$instance['font_color'] = $new_instance['font_color'];
		$instance['message'] = $new_instance['message'];
		$instance['centered'] = $new_instance['centered'];
		$instance['do_wide'] = $new_instance['do_wide'];
		$instance['unwrap'] = $new_instance['unwrap'];
		$instance['paddingtop'] = $new_instance['paddingtop'];
		$instance['paddingbottom'] = $new_instance['paddingbottom'];
		$instance['fontsize'] = $new_instance['fontsize'];

		return $instance;
	}

	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array(
			'title' => __('', 'themebeagle'),
			'message' => __('', 'themebeagle'),
			'background_color' => '#f8f8f8',
			'background_img' => '',
			'font_color' => '#444444',
			'centered' => '',
			'do_wide' => '',
			'unwrap' => '',
			'paddingtop' => '50',
			'paddingbottom' => '50',
			'fontsize' => '18',
		);

		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title: ', 'themebeagle'); ?></label>
		<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" /></p>

		<!-- Background Image: Textarea Input -->
		<p><label for="<?php echo $this->get_field_id( 'background_img' ); ?>"><?php _e( 'Background Image URL: ', 'themebeagle' ); ?></label>
		<textarea rows="3" id="<?php echo $this->get_field_id( 'background_img' ); ?>" name="<?php echo $this->get_field_name( 'background_img' ); ?>" style="width:100%;"><?php echo $instance['background_img']; ?></textarea></p>

		<!-- Background Color -->
		<p><label style="display:block;clear:both;float:none;width:100%;margin-bottom:5px;" for="<?php echo $this->get_field_id( 'background_color' ); ?>"><?php _e( 'Select Background Color: ', 'themebeagle' ); ?></label>
		<input class="color-picker" type="text" id="<?php echo $this->get_field_id( 'background_color' ); ?>" name="<?php echo $this->get_field_name( 'background_color' ); ?>" value="<?php echo esc_attr( $instance['background_color'] ); ?>" /></p>

		<!-- Font Color -->
		<p><label style="display:block;clear:both;float:none;width:100%;margin-bottom:5px;" for="<?php echo $this->get_field_id( 'font_color' ); ?>"><?php _e( 'Select Font Color: ', 'themebeagle' ); ?></label>
		<input class="color-picker" type="text" id="<?php echo $this->get_field_id( 'font_color' ); ?>" name="<?php echo $this->get_field_name( 'font_color' ); ?>" value="<?php echo esc_attr( $instance['font_color'] ); ?>" /></p>

		<!-- Padding Top: Number Input -->
		<p><label for="<?php echo $this->get_field_id( 'paddingtop' ); ?>"><?php _e('Top Padding (px): ', 'themebeagle'); ?></label>
		<input type="number" id="<?php echo $this->get_field_id( 'paddingtop' ); ?>" name="<?php echo $this->get_field_name( 'paddingtop' ); ?>" value="<?php echo $instance['paddingtop']; ?>" /></p>

		<!-- Padding Bottom: Number Input -->
		<p><label for="<?php echo $this->get_field_id( 'paddingbottom' ); ?>"><?php _e('Bottom Padding (px): ', 'themebeagle'); ?></label>
		<input type="number" id="<?php echo $this->get_field_id( 'paddingbottom' ); ?>" name="<?php echo $this->get_field_name( 'paddingbottom' ); ?>" value="<?php echo $instance['paddingbottom']; ?>" /></p>

		<!-- Font Size: Number Input -->
		<p><label for="<?php echo $this->get_field_id( 'fontsize' ); ?>"><?php _e('Font Size (px): ', 'themebeagle'); ?></label>
		<input type="number" id="<?php echo $this->get_field_id( 'fontsize' ); ?>" name="<?php echo $this->get_field_name( 'fontsize' ); ?>" value="<?php echo $instance['fontsize']; ?>" /></p>

		<!-- Text Centered -->
		<p><input id="<?php echo $this->get_field_id('centered'); ?>" type="checkbox" class="checkbox" name="<?php echo $this->get_field_name('centered'); ?>"<?php checked( (bool) $instance['centered'], true ); ?> />
		<label for="<?php echo $this->get_field_id('centered'); ?>"><?php _e('Center the Text', 'themebeagle'); ?></label></p>

		<!-- Full-Width Widget -->
		<p><input id="<?php echo $this->get_field_id('do_wide'); ?>" type="checkbox" class="checkbox" name="<?php echo $this->get_field_name('do_wide'); ?>"<?php checked( (bool) $instance['do_wide'], true ); ?> />
		<label for="<?php echo $this->get_field_id('do_wide'); ?>"><?php _e('Full-Width (use only in Full-Width widgetized areas).', 'themebeagle'); ?></label></p>

		<!-- Remove Side Padding -->
		<p><input id="<?php echo $this->get_field_id('unwrap'); ?>" type="checkbox" class="checkbox" name="<?php echo $this->get_field_name('unwrap'); ?>"<?php checked( (bool) $instance['unwrap'], true ); ?> />
		<label for="<?php echo $this->get_field_id('unwrap'); ?>"><?php _e('Remove Side Padding', 'themebeagle'); ?></label></p>

		<!-- Message: Textarea Input -->
		<p><label for="<?php echo $this->get_field_id( 'message' ); ?>"><?php _e( 'Content: ', 'themebeagle' ); ?></label>
		<textarea rows="8" id="<?php echo $this->get_field_id( 'message' ); ?>" name="<?php echo $this->get_field_name( 'message' ); ?>" style="width:100%;"><?php echo $instance['message']; ?></textarea></p>

	<?php
	}
}

/*-----------------------------------------------------------------------------------*/
// This starts the WP-Prosperity Author Widget.
/*-----------------------------------------------------------------------------------*/

add_action( 'widgets_init', 'tbauthor_load_widgets' );

function tbauthor_load_widgets() {
	register_widget( 'Tbauthor_Widget' );
}

class Tbauthor_Widget extends WP_Widget {

	function Tbauthor_Widget() {

		/* Widget settings. */
		$widget_ops = array( 'classname' => 'tbauthor', 'description' => __('Adds the WP-Prosperity Author widget.', 'themebeagle') );
		/* Widget control settings. */
		$control_ops = array( 'width' => 400, 'height' => 700, 'id_base' => 'tbauthor-widget' );
		/* Create the widget. */
		parent::__construct( 'tbauthor-widget', __('WP-Prosperity Author Widget', 'themebeagle'), $widget_ops, $control_ops );
	}

	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$author = $instance['author'];
		$main_img = $instance['main_img'];
		$showgravatar = $instance['showgravatar'];
		$authorname = $instance['authorname'];
		$message = $instance['message'];
		$readmore_text = $instance['readmore_text'];
		$readmore_url = $instance['readmore_url'];
		$readmore_button = $instance['readmore_button'];
		$showicons = $instance['showicons'];
		$style = $instance['style'];
		$shape = $instance['shape'];

		/* Before widget (defined by themes). */
		echo $before_widget;

		$position = '';
		if ( $main_img && !empty($showgravatar) )
			$position = 'rel';

		$button = '';
		if ( !empty($readmore_button) )
			$button = ' button';

		printf('<div class="aboutme ' . $style . ' ' . $shape . '">');

			printf('<div class="aboutme-images ' . $position . '">');

				if ( !empty($main_img) )
					printf('<img class="mainimg" src="' . $main_img . '" alt="' . esc_attr($authorname) . '" title="' . esc_attr($authorname) . '" />');

				if ( !empty($showgravatar) )
					echo get_avatar($author, 150);

			printf('</div>');

			printf('<div class="aboutme-excerpt">');

				/* Display Name from widget settings if one was input. */
				if ( $name )
					printf('<h4>' . $authorname . '</h4>');

				/* Display Message from widget settings if one was input. */
				if ( $message )
					printf('<p>' . $message . '</p>');

				/* Display Read More link and text if input. */
				if ( $readmore_text && $readmore_url )
					printf('<p><a class="more-link' . $button . '" rel="nofollow" href="' . $readmore_url . '">' . $readmore_text . '</a></p>');

			printf('</div>');

			if ( !empty($showicons) )
				get_template_part('icons-site');

		printf('</div>');

		/* After widget (defined by themes). */
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['author'] = $new_instance['author'];
		$instance['main_img'] = $new_instance['main_img'];
		$instance['showgravatar'] = $new_instance['showgravatar'];
		$instance['authorname'] = $new_instance['authorname'];
		$instance['message'] = $new_instance['message'];
		$instance['readmore_text'] = $new_instance['readmore_text'];
		$instance['readmore_url'] = $new_instance['readmore_url'];
		$instance['readmore_button'] = $new_instance['readmore_button'];
		$instance['showicons'] = $new_instance['showicons'];
		$instance['style'] = $new_instance['style'];
		$instance['shape'] = $new_instance['shape'];

		return $instance;
	}

	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array(
			'title' => __('', 'themebeagle'),
			'author' => '',
			'main_img' => '',
			'showgravatar' => '',
			'authorname' => '',
			'message' =>  __('Use this space to write a short bio about the author, or simply leave the field blank for no bio.', 'themebeagle'),
			'readmore_text' => __('Read More &raquo;', 'themebeagle'),
			'readmore_url' => '',
			'readmore_button' => '',
			'showicons' => '',
			'style' => 'grayscale',
			'shape' => 'square',
		);

		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Author: Select Box  -->
		<p><label for="<?php echo $this->get_field_id('author'); ?>"><?php _e('Select Author', 'themebeagle'); ?>:<br /></label>
		<select id="<?php echo $this->get_field_id('author'); ?>" name="<?php echo $this->get_field_name('author'); ?>">
			<?php
				$users = get_users();
				foreach ($users as $user) {
					echo '<option value="' . $user->ID . '" ' . selected($user->ID, $instance['author']) . '>' .$user->user_nicename .'</option>';
				} 
			?>
		</select></p>

		<!-- Main Image: Textarea Input -->
		<p><label for="<?php echo $this->get_field_id( 'main_img' ); ?>"><?php _e( 'Enter URL for Main Image: ', 'themebeagle' ); ?></label>
		<textarea rows="3" id="<?php echo $this->get_field_id( 'main_img' ); ?>" name="<?php echo $this->get_field_name( 'main_img' ); ?>" style="width:100%;"><?php echo $instance['main_img']; ?></textarea></p>

		<!-- Show Author Gravatar: Checkbox Input -->
		<p><input id="<?php echo $this->get_field_id('showgravatar'); ?>" type="checkbox" name="<?php echo $this->get_field_name('showgravatar'); ?>" value="1" <?php checked(1, $instance['showgravatar']); ?>/> <label for="<?php echo $this->get_field_id('showgravatar'); ?>"><?php _e('Show Author Gravatar', 'themebeagle'); ?></label></p>

		<!-- Author Name: Text Input -->
		<p><label for="<?php echo $this->get_field_id( 'authorname' ); ?>"><?php _e('Author Name: ', 'themebeagle'); ?></label>
		<input id="<?php echo $this->get_field_id( 'authorname' ); ?>" name="<?php echo $this->get_field_name( 'authorname' ); ?>" value="<?php echo $instance['authorname']; ?>" style="width:100%;" /></p>

		<!-- Message: Textarea Input -->
		<p><label for="<?php echo $this->get_field_id( 'message' ); ?>"><?php _e( 'Author Bio: ', 'themebeagle' ); ?></label>
		<textarea rows="8" id="<?php echo $this->get_field_id( 'message' ); ?>" name="<?php echo $this->get_field_name( 'message' ); ?>" style="width:100%;"><?php echo $instance['message']; ?></textarea></p>

		<!-- Read More Text: Text Input -->
		<p><label for="<?php echo $this->get_field_id( 'readmore_text' ); ?>"><?php _e('Read More Text (leave blank for no "Read More" link): ', 'themebeagle'); ?></label>
		<input id="<?php echo $this->get_field_id( 'readmore_text' ); ?>" name="<?php echo $this->get_field_name( 'readmore_text' ); ?>" value="<?php echo $instance['readmore_text']; ?>" style="width:100%;" /></p>

		<!-- Read More URL: Text Input -->
		<p><label for="<?php echo $this->get_field_id( 'readmore_url' ); ?>"><?php _e('Read More URL: ', 'themebeagle'); ?></label>
		<input id="<?php echo $this->get_field_id( 'readmore_url' ); ?>" name="<?php echo $this->get_field_name( 'readmore_url' ); ?>" value="<?php echo $instance['readmore_url']; ?>" style="width:100%;" /></p>

		<!-- Read More Button Checkbox  -->
		<p><input id="<?php echo $this->get_field_id('readmore_button'); ?>" type="checkbox" name="<?php echo $this->get_field_name('readmore_button'); ?>" value="1" <?php checked(1, $instance['readmore_button']); ?>/> <label for="<?php echo $this->get_field_id('readmore_button'); ?>"><?php _e('Use Read More Button', 'themebeagle'); ?></label></p>

		<!-- Show Icons Checkbox  -->
		<p><input id="<?php echo $this->get_field_id('showicons'); ?>" type="checkbox" name="<?php echo $this->get_field_name('showicons'); ?>" value="1" <?php checked(1, $instance['showicons']); ?>/> <label for="<?php echo $this->get_field_id('showicons'); ?>"><?php _e('Show Social Media Icons', 'themebeagle'); ?></label></p>

		<!-- Icon Style  -->
		<p><label for="<?php echo $this->get_field_id('style'); ?>"><?php _e('Icon Style', 'themebeagle'); ?>:<br /></label>
		<select id="<?php echo $this->get_field_id('style'); ?>" name="<?php echo $this->get_field_name('style'); ?>">
			<option style="padding-right:10px;" value="grayscale" <?php selected('grayscale', $instance['style']); ?>>- <?php _e('Grayscale', 'themebeagle'); ?> -</option>
			<option style="padding-right:10px;" value="color" <?php selected('color', $instance['style']); ?>>- <?php _e('Color', 'themebeagle'); ?> -</option>
			<option style="padding-right:10px;" value="dark" <?php selected('dark', $instance['style']); ?>>- <?php _e('Dark', 'themebeagle'); ?> -</option>
			<option style="padding-right:10px;" value="clear" <?php selected('clear', $instance['style']); ?>>- <?php _e('Clear', 'themebeagle'); ?> -</option>
		</select></p>

		<!-- Icon Style  -->
		<p><label for="<?php echo $this->get_field_id('shape'); ?>"><?php _e('Icon Shape', 'themebeagle'); ?>:<br /></label>
		<select id="<?php echo $this->get_field_id('shape'); ?>" name="<?php echo $this->get_field_name('shape'); ?>">
			<option style="padding-right:10px;" value="square" <?php selected('square', $instance['shape']); ?>>- <?php _e('Square', 'themebeagle'); ?> -</option>
			<option style="padding-right:10px;" value="round" <?php selected('round', $instance['shape']); ?>>- <?php _e('Round', 'themebeagle'); ?> -</option>
		</select></p>

	<?php
	}
}

?>