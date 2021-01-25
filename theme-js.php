<?php

/*-----------------------------------------------------------------------------------*/
// ENQUEUE SCRIPTS AND STYLES FOR THE FRONT END
// @since 1.0
/*-----------------------------------------------------------------------------------*/

add_action( 'wp_enqueue_scripts', 'themebeagle_scripts_styles' );
function themebeagle_scripts_styles() {

	$version = tb_version();

	// Adds JavaScript to pages with the comment form to support sites with threaded comments (when in use).
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	// Loads Bootstrap JavaScript file.
	if( !is_admin() ) 
		wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), '3.3.1', true );

	// Loads Javascript plugins needed to run the theme.
	if( !is_admin() )
		wp_deregister_script('hoverIntent'); // remove wordpress built-in hoverintent.js and replace it with our own so it works with Superfish.
		wp_enqueue_script('plugins', get_template_directory_uri() . '/js/plugins.js', array( 'jquery' ), $version, true);
		wp_enqueue_script('jquery-effects-core');
		wp_enqueue_script('isotope', get_template_directory_uri() . '/js/jquery.isotope.min.js', array( 'jquery' ), '5.26', true);
		wp_enqueue_script('infinitescroll', get_template_directory_uri() . '/js/jquery.infinitescroll.min.js', array( 'jquery' ), '2.0b2.120519', true);
		wp_enqueue_script('manual-trigger', get_template_directory_uri() . '/js/manual-trigger.js', array( 'jquery' ), '2.0b2.110617', true);
		wp_enqueue_script('sloppy-masonry', get_template_directory_uri() . '/js/jquery.isotope.sloppy-masonry.min.js', array( 'jquery' ), $version, true);
		wp_enqueue_script( 'themebeagle-functions', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), $version, true );
		wp_register_script( 'flexslider-functions', get_template_directory_uri() . '/js/flex-functions.js', array( 'jquery' ), $version, true );	
}

?>