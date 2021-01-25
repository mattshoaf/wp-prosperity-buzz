<?php
/*
Template Name: Widgetized Page
 *
 * @since 1.2
*/

get_header(); ?>

					<!-- WIDGETIZED PAGE TOP (#widgetized-page-top) -->
					<div id="widgetized-page-top">
						<div class="wp-fw-top">
							<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('wp-fw-top') ) : ?>
							<?php endif; ?>
						</div><!-- end .wp-fw-top -->
					</div><!-- END WIDGETIZED PAGE TOP (#widgetized-page-top) -->

					<!-- WIDGETIZED PAGE MIDDLE (#widgetized-page-middle) -->
					<div id="widgetized-page-middle" class="wrap">
						<div class="row">
						<div class="wp-middle-left col-sm-4">
							<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('wp-left') ) : ?>
							<?php endif; ?>
						</div><!-- end .wp-middle-left -->
						<div class="wp-middle-center col-sm-4">
							<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('wp-center') ) : ?>
							<?php endif; ?>
						</div><!-- end .wp-middle-center -->
						<div class="wp-middle-right col-sm-4">
							<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('wp-right') ) : ?>
							<?php endif; ?>
						</div><!-- end .wp-middle-right -->
						</div>
					</div><!-- END WIDGETIZED PAGE MIDDLE (#widgetized-page-middle) -->

					<!-- WIDGETIZED PAGE BOTTOM (#widgetized-page-bottom) -->
					<div id="widgetized-page-bottom">
						<div class="wp-fw-bottom">
							<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('wp-fw-bottom') ) : ?>
							<?php endif; ?>
						</div><!-- end .wp-fw-bottom -->
					</div><!-- END WIDGETIZED PAGE BOTTOM (#widgetized-page-bottom) -->

<?php get_footer(); ?>