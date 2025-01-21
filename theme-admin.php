<?php

/*-----------------------------------------------------------------------------------*/
// FUNCTIONS FOR VAFPRESS THEME FRAMEWORK
// @since 1.0
/*-----------------------------------------------------------------------------------*/

// require VafPress
require_once('vafpress-framework/bootstrap.php');

// Make WP-Prosperity available for translation.
// Translations can be added to the /languages/ directory.
//load_theme_textdomain( 'themebeagle', get_template_directory() . '/languages' );

// require theme options data sources file
locate_template('theme-sources.php', true, true );

define('TB_ADMIN', get_template_directory() . '/admin');
define('TB_ADMIN_URI', get_template_directory_uri() . '/admin');

// Path to theme-options template array file
$theme_options_array = locate_template('theme-options.php', true, true);

// Initialize the Theme Options object
$theme_options = new VP_Option(array(
	'is_dev_mode' 	=> false,
	'option_key' 	=> 'tb_options',
	'page_slug'	=> 'theme_settings',
	'template'	=> $theme_options_array,
	'menu_page' 	=> array(
		'position' => '59.9'
	),
	'minimum_role'	=> 'edit_theme_options',
	'layout'	=> 'fluid',
	'page_title'	=> __( 'Theme Settings Page', 'themebeagle' ),
	'menu_label'	=> __( 'Theme Settings', 'themebeagle' ),
));

if ( tb_option('allow_recipe_manage') ) {
	// Path to theme-metaboxes template array file for recipes
	$theme_metabox_recipe_array  = locate_template('theme-metaboxes-recipes.php', true, true);
	// Initialize Recipe Management Metabox object
	$theme_metaboxes_recipes = new VP_Metabox(array(
		'id'		=> 'themebeagle_meta_boxes_recipes',
		'types'		=> array('post','page'),
		'title'		=> __('WP-Prosperity Recipe Management Options', 'themebeagle'),
		'priority'	=> 'high',
		'template'	=> $theme_metabox_recipe_array,
		'mode'		=> WPALCHEMY_MODE_EXTRACT,
		'prefix'	=> 'tb_'
	));
}

if ( tb_option('allow_ad_manage') ) {
	// Path to theme-metaboxes template array file
	$theme_metabox_ads_array  = locate_template('theme-metaboxes-ads.php', true, true);
	// Initialize Ad Management Metabox object
	$theme_metaboxes_ads = new VP_Metabox(array(
		'id'		=> 'themebeagle_meta_boxes_ads',
		'types'		=> array('post','page'),
		'title'		=> __('WP-Prosperity Ad Management Options', 'themebeagle'),
		'priority'	=> 'high',
		'template'	=> $theme_metabox_ads_array,
		'mode'		=> WPALCHEMY_MODE_EXTRACT,
		'prefix'	=> 'tb_'
	));
}

// Path to theme-metaboxes template array file for Posts
$theme_metabox_array  = locate_template('theme-metaboxes.php', true, true);

// Initialize Main Theme Metabox object
$theme_metaboxes = new VP_Metabox(array(
	'id'		=> 'themebeagle_meta_boxes',
	'types'		=> array('post'),
	'title'		=> __('WP-Prosperity Post Options', 'themebeagle'),
	'priority'	=> 'high',
	'template'	=> $theme_metabox_array,
	'mode'		=> WPALCHEMY_MODE_EXTRACT,
	'prefix'	=> 'tb_'
));

// Path to theme-metaboxes template array file for Pages
$theme_metabox_array_page  = locate_template('theme-metaboxes-page.php', true, true);

// Initialize Main Theme Metabox object
$theme_metaboxes_page = new VP_Metabox(array(
	'id'		=> 'themebeagle_meta_boxes_page',
	'types'		=> array('page'),
	'title'		=> __('WP-Prosperity Page Options', 'themebeagle'),
	'priority'	=> 'high',
	'template'	=> $theme_metabox_array_page,
	'mode'		=> WPALCHEMY_MODE_EXTRACT,
	'prefix'	=> 'tb_'
));

global $tb_options;
$tb_options = get_option('tb_options');

// function to retrieve theme option values via tb_option("option_name").
function tb_option($key) {
	return vp_option( 'tb_options.' . $key );
}

// Load custom CSS for Theme Settings page
add_action( 'admin_enqueue_scripts', 'tb_settings_css' );
function tb_settings_css() {
	if (strpos($_SERVER['REQUEST_URI'], 'admin.php?page=theme_settings') !== false) {
		wp_enqueue_style( 'theme_settings', TB_ADMIN_URI . '/theme-settings.css', array(), '1.0' );
	}
}

// Path to theme-metaboxes-slides template array file
$theme_metabox_slides_array  = locate_template('theme-metaboxes-slides.php', true, true);

// Initialize Slide Management Metabox object
$theme_metaboxes_slides = new VP_Metabox(array(
	'id'		=> 'themebeagle_meta_boxes_slides',
	'types'		=> array('slides'),
	'title'		=> __('WP-Prosperity Slide Management Options', 'themebeagle'),
	'priority'	=> 'high',
	'template'	=> $theme_metabox_slides_array,
	'mode'		=> WPALCHEMY_MODE_EXTRACT,
	'prefix'	=> 'tb_'
));

// Path to shortcode generator template array file
$theme_scgen_array  = locate_template('theme-scgen.php', true, true);

// Shortcode Generator object
$theme_scgen = array(
	'name'		=> 'themebeagle_scgen', 
	'template'	=> $theme_scgen_array, 
	'modal_title'	=> __( 'WP-Prosperity Shortcode Generator', 'themebeagle'),
	'button_title'	=> __( 'WP-Prosperity Shortcode Generator', 'themebeagle'),
	'types'		=> array( 'post', 'page'),
	'main_image'	=> get_template_directory_uri() . '/images/scgen1.png',
	'sprite_image'	=> get_template_directory_uri() . '/images/scgen.png',
);

// Initialize Shortcode Generator object
$theme_scgen_init = new VP_ShortcodeGenerator($theme_scgen);

/*
 * EOF
 */