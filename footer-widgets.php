<?php 
/**
 * footer-widgets.php - template for displaying footer widgets.
 *
 * @since 1.0
 */

global $post;
$hidestuff = array();
if ( is_singular() && get_post_meta($post->ID, 'tb_hide_stuff', true) ) { $hidestuff = get_post_meta($post->ID, 'tb_hide_stuff', true); }
if ( ! in_array('hide_footer_widgets', $hidestuff) ) {

		if ( tb_option('footer_widgets') ) { 
?>

			<!-- FOOTER WIDGETS (#footer-widgets) -->
			<div id="footer-widgets">
				<div class="wrap">
					<div class="row">
						<!-- FOOTER WIDGETS LEFT (.footer-widgets-left) -->
						<aside class="sidebar col-md-4 footer-widgets-left">
							<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-widgets-left') ) : ?>
							<?php endif; ?>
						</aside><!-- END FOOTER WIDGETS LEFT (.footer-widgets-left) -->

						<!-- FOOTER WIDGETS CENTER (.footer-widgets-center) -->
						<aside class="sidebar col-md-4 footer-widgets-center">
							<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-widgets-center') ) : ?>
							<?php endif; ?>
						</aside><!-- END FOOTER WIDGET CENTER (.footer-widgets-center) -->

						<!-- FOOTER WIDGETS RIGHT (.footer-widgets-right) -->
						<aside class="sidebar col-md-4 footer-widgets-right">
							<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-widgets-right') ) : ?>
							<?php endif; ?>
						</aside><!-- END FOOTER WIDGETS LEFT (.footer-widgets-right) -->
					</div><!-- .row -->
				</div><!-- END .wrap -->
			</div><!-- END FOOTER WIDGETS (#footer-widgets) -->
		<?php } 
	}
?>