<?php

/*-----------------------------------------------------------------------------------*/
// Add Theme Stylesheets to Page head
// @since 1.0
/*-----------------------------------------------------------------------------------*/

add_action( 'wp_enqueue_scripts', 'themebeagle_enqueue_styles' );
function themebeagle_enqueue_styles() {

	$version = tb_version();

	// Load FontAwesome font.
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/fonts/font-awesome/css/font-awesome.min.css', array(), '4.4.0' );

	// Load Bootstrap stylesheet.
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/bootstrap.min.css', array(), '3.3.1' );

	// Load Flexslider stylesheet.
	wp_enqueue_style( 'flexslider', get_template_directory_uri() . '/flexslider.css', array(), $version );

	// Load Shortcodes stylesheet.
	wp_enqueue_style( 'theme-shortcodes', get_template_directory_uri() . '/shortcodes.css', array(), $version );

	// Load bbPress stylesheet.
	if ( function_exists( 'is_bbpress' ) ) {
		wp_enqueue_style( 'theme-bbpress', get_template_directory_uri() . '/bbpress.css', array(), $version );
	}

	// Load WooCommerce stylesheet.
	if (is_woocommerce_activated()) { 
		wp_enqueue_style( 'theme-woocommerce', get_template_directory_uri(). '/woocommerce.css', array(), $version );
	}

	// Load Default Google Fonts stylesheet.
	wp_enqueue_style( 'default-google-fonts', '//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic,700italic|PT+Serif:400,700,400italic,700italic', array(), $version );

	// Loads Dashicons font.
	wp_enqueue_style('dashicons');

	// Load Print stylesheet.
	wp_enqueue_style( 'theme-print_styles', get_template_directory_uri() . '/style-print.css', array(), $version, 'print' );

	// Loads main stylesheet.
	wp_enqueue_style( 'theme-main-styles', get_stylesheet_uri(), array(), $version );

	// Load Custom Styles stylesheet.
	wp_enqueue_style( 'theme-custom_styles', get_template_directory_uri() . '/style-custom.css', array(), $version );
}



/*-----------------------------------------------------------------------------------*/
// Add Viewport Meta Tag
// @since 1.0
/*-----------------------------------------------------------------------------------*/

add_action('wp_head','themebeagle_viewport_meta');
function themebeagle_viewport_meta() {
	echo '<meta name="viewport" content="width=device-width, initial-scale=1" />';
}



/*-----------------------------------------------------------------------------------*/
// Add Favicon Tag to Page Head
// @since 1.0
/*-----------------------------------------------------------------------------------*/

add_action('wp_head','themebeagle_favicon', 99);
function themebeagle_favicon() {
	$favicon = tb_option('favicon_url');
	if ( $favicon ) {
		echo '<link rel="Shortcut Icon" href="'.$favicon. '" type="image/x-icon" />';
	}
}



/*-----------------------------------------------------------------------------------*/
// Add layout to body_class output based on theme settings
// @since 1.0
/*-----------------------------------------------------------------------------------*/

add_filter('body_class','themebeagle_layout_body_class');
function themebeagle_layout_body_class($classes) {

	$layout = '';
	$layout = tb_option('default_layout');
	global $tb_options;
	$tb_options['layout'] = $layout;


	if ( is_home() || is_front_page()  ) {
		$layout = tb_option('home_layout');
		if ( ! $layout || $layout == "default" ) {
			$layout = tb_option('default_layout');
		}

		global $tb_options;
		$tb_options['layout'] = $layout;

	}

	if ( is_single() ) {
		global $post;
		$layout = get_post_meta($post->ID, 'tb_page_layout', true);

		if ( ! $layout || $layout == "default" )
			$layout = tb_option('single_layout');

		if ( ! $layout || $layout == "default" ) 
			$layout = tb_option('default_layout');

		global $tb_options;
		$tb_options['layout'] = $layout;
	}

	if ( is_page() ) {
		global $post;
		$layout = get_post_meta($post->ID, 'tb_page_layout', true);

		if ( ! $layout || $layout == "default" )
			$layout = tb_option('page_layout');

		if ( ! $layout || $layout == "default" ) 
			$layout = tb_option('default_layout');

		global $tb_options;
		$tb_options['layout'] = $layout;
	}



	if ( is_archive() ) {
		$layout = tb_option('archive_layout');
		if ( ! $layout || $layout == "default" ) {
			$layout = tb_option('default_layout');
		}

		global $tb_options;
		$tb_options['layout'] = $layout;
	}

	if ( is_404() ) {
		$layout = tb_option('404_layout');
		if ( ! $layout || $layout == "default" ) {
			$layout = tb_option('default_layout');
		}

		global $tb_options;
		$tb_options['layout'] = $layout;
	}


	if ( function_exists('is_bbpress') && is_bbpress() ) {
		$layout = tb_option('bbpress_layout');
		if ( ! $layout || $layout == "default" ) {
			$layout = tb_option('default_layout');
		}

		global $tb_options;
		$tb_options['layout'] = $layout;
	}

	if ( is_page_template('page-landing.php') || is_page_template('page-widgetized.php') || is_page_template('page-wide.php') ) {
		$layout = 'fw';

		global $tb_options;
		$tb_options['layout'] = $layout;
	}

	if ( is_woocommerce_activated() && is_woocommerce() ) {
		$layout = tb_option('woo_shop_layout');
		if ( ! $layout || $layout == "default" ) {
			$layout = tb_option('default_layout');
		}

		global $tb_options;
		$tb_options['layout'] = $layout;
	}

	if ( is_woocommerce_activated() && is_product() ) {
		$layout = tb_option('woo_product_layout');
		if ( ! $layout || $layout == "default" ) {
			$layout = tb_option('default_layout');
		}

		global $tb_options;
		$tb_options['layout'] = $layout;
	}

	if ( is_woocommerce_activated() && is_cart() ) {
		$layout = tb_option('woo_cart_layout');
		if ( ! $layout || $layout == "default" ) {
			$layout = tb_option('default_layout');
		}

		global $tb_options;
		$tb_options['layout'] = $layout;
	}

	if ( is_woocommerce_activated() && is_checkout() ) {
		$layout = tb_option('woo_checkout_layout');
		if ( ! $layout || $layout == "default" ) {
			$layout = tb_option('default_layout');
		}

		global $tb_options;
		$tb_options['layout'] = $layout;
	}

	if ( is_woocommerce_activated() && is_account_page() ) {
		$layout = tb_option('woo_account_layout');
		if ( ! $layout || $layout == "default" ) {
			$layout = tb_option('default_layout');
		}

		global $tb_options;
		$tb_options['layout'] = $layout;
	}


	if ( $layout == 'c-sw' || $layout == 'sw-c' || $layout == 'fw' || $layout == 'sn-c' || $layout == 'c-sn' ) {
		$layout = $layout . " two-column";
	} else {
		$layout = $layout;
	}

	// Add classes to body_class() output
	$classes[] = $layout;
	return $classes;
}



/*-----------------------------------------------------------------------------------*/
// Add unboxed to body_class output
// @since 1.0
/*-----------------------------------------------------------------------------------*/

add_filter('body_class','themebeagle_unboxed_body_class');
function themebeagle_unboxed_body_class($classes) {

	global $post;
	global $unboxedclass;
	$unboxedclass = '';

	if ( tb_option('unboxed') ) {
		$unboxedclass = 'unboxed';
	}

	if (  is_singular() && get_post_meta($post->ID, 'tb_unboxed', true) ) {
		$unboxedclass = 'unboxed';
	}

	if ( $unboxedclass ) {
		$classes[] = $unboxedclass;
	}

	return $classes;

}



/*-----------------------------------------------------------------------------------*/
// Add full-header to body_class output
// @since 1.1
/*-----------------------------------------------------------------------------------*/

add_filter('body_class','themebeagle_full_header_body_class');
function themebeagle_full_header_body_class($classes) {

	$fullheader = '';

	if ( tb_option('full_header') && tb_option('header_logo') ) {
		$fullheader = 'full-header';
	}

	if ( $fullheader ) {
		$classes[] = $fullheader;
	}

	return $classes;

}



/*-----------------------------------------------------------------------------------*/
// Add darkheader to body_class output
// @since 1.0
/*-----------------------------------------------------------------------------------*/

add_filter('body_class','themebeagle_dark_header_body_class');
function themebeagle_dark_header_body_class($classes) {

	$darkheaderclass = '';

	if ( tb_option('header_color') == 'dark' ) {
		$darkheaderclass = 'darkheader';
	}

	if ( $darkheaderclass ) {
		$classes[] = $darkheaderclass;
	}

	return $classes;

}



/*-----------------------------------------------------------------------------------*/
// Add nav-arrows to body_class output
// @since 1.0
/*-----------------------------------------------------------------------------------*/

add_filter('body_class','themebeagle_navarrows_body_class');
function themebeagle_navarrows_body_class($classes) {

	$navarrowsclass = '';

	if ( tb_option('navarrows') ) {
		$navarrowsclass = 'nav-arrows';
	}

	if ( $navarrowsclass ) {
		$classes[] = $navarrowsclass;
	}

	return $classes;

}



/*-----------------------------------------------------------------------------------*/
// Add standard-blog classes to body_class output
// @since 1.0
/*-----------------------------------------------------------------------------------*/

add_filter('body_class','themebeagle_standard_blog_body_class');
function themebeagle_standard_blog_body_class($classes) {

	$blogclass = '';

	if ( (is_home() && tb_option('post_layout') == 'posts_standard') || (is_archive() && tb_option('post_layout_archive') == 'posts_standard' ) || (is_page_template('page-blog-1-column.php')) ) {
		$blogclass = 'standard-blog';
	}

	if ( $blogclass ) {
		$classes[] = $blogclass;
	}

	return $classes;
}

/*-----------------------------------------------------------------------------------*/
// Add body-background pattern class to body_class output
// @since 1.0
/*-----------------------------------------------------------------------------------*/

add_filter('body_class','themebeagle_body_bg_pattern_body_class');
function themebeagle_body_bg_pattern_body_class($classes) {

	$bgpattern = '';
	$bgcustom_options = '';
	$bgpattern = tb_option('body_bg_pattern');
	$bgcustom_options = tb_option('custom_bg_on');

	if ( $bgpattern != 'none' && !$bgcustom_options ) {
		$classes[] = $bgpattern;
	}

	return $classes;
}



/*-----------------------------------------------------------------------------------*/
// Custom Styling from Theme Settings
// @since 1.0
/*-----------------------------------------------------------------------------------*/

add_action('wp_head','themebeagle_custom_styling');
function themebeagle_custom_styling() {

	global $post;
	$output = '';

// Site Container Width

	$site_width = tb_option('site_width');

	if ( $site_width ) 
		$output .= '.site-container, .unboxed .site-inner, .unboxed .wrap { max-width:'.$site_width.'px; }' . "\n" . 
		'.unboxed .slideslider .flex-caption-wrap { max-width:'.$site_width.'px !important; }' . "\n";

// Header, Site Title & Logo

	$header_height = tb_option('header_height');
	$header_logo = tb_option('header_logo');
	$title_align = tb_option('header_title_align');
	$logo_align = tb_option('logo_align');

	if ( $header_height ) 
		$output .= '.site-header .wrap { height:'.$header_height.'px;}' . "\n";
	if ( $title_align != 'default' ) 
		$output .= '.site-title, .site-description { text-align:'.$title_align.';} .site-branding { width:100%;  }' . "\n";
	if ( $logo_align != 'default' && $header_logo ) 
		$output .= '.site-title, .site-logo { text-align:'.$logo_align.';} .site-branding { width:100%;  }' . "\n";

// Hide Post Meta Border

	$top_postmeta_hide_border = tb_option('top_postmeta_hide_border');
	$bottom_postmeta_hide_border = tb_option('bottom_postmeta_hide_border');

	if ($top_postmeta_hide_border ) 
		$output .= '.entry-header .entry-meta { padding:0; background:transparent; }' . "\n";
	if ($bottom_postmeta_hide_border ) 
		$output .= '.entry-footer .entry-meta { padding:0; background:transparent; }' . "\n";

// Body Background Options

	$bgcolor = tb_option('body_bg_color');
	$bgcustom_options = tb_option('custom_bg_on');

	if ( $bgcolor ) 
		$output .= 'body { background-color:'.$bgcolor.'; }' . "\n";

// Custom Body Background Image

	$bgcustom_url = tb_option('custom_body_bg_image');
	$bgbackstretch = tb_option('backstretch_on');
	$bgposition = tb_option('bg_position');
	$bgrepeat = tb_option('bg_repeat');
	$bgattach = tb_option('bg_attach');
	$bg_custom_image = '';

	if ( $bgcustom_url )
		$bg_custom_image .= 'background-image:url("' . $bgcustom_url . '");';
	if ( $bgposition )
		$bg_custom_image .= 'background-position:' . $bgposition . ';';
	if ( $bgrepeat )
		$bg_custom_image .= 'background-repeat:' . $bgrepeat . ';';
	if ( $bgattach )
		$bg_custom_image .= 'background-attachment:' . $bgattach . ';';

	if ( $bg_custom_image != '' && $bgcustom_options == 1 && $bgbackstretch != 1 )
		$output .= 'body { ' . $bg_custom_image . ' }'. "\n";

// Header Font Styles

	$headerfont = '';
	$header_font = tb_option('header_font');
	$header_style = tb_option('header_style');
	$header_weight = tb_option('header_weight');
	$header_size = tb_option('header_size');
	$header_transform = tb_option('header_transform');
	$header_spacing = tb_option('header_spacing');


	if ( $header_font )
		$headerfont .= 'font-family:' . $header_font . ';';
	if ( $header_style )
		$headerfont .= 'font-style:' . $header_style . ';';
	if ( $header_weight )
		$headerfont .= 'font-weight:' . $header_weight . ';';
	if ( $header_size )
		$headerfont .= 'font-size:' . $header_size . 'px;';
	if ( $header_transform )
		$headerfont .= 'text-transform:' . $header_transform . ';';
	if ( $header_spacing )
		$headerfont .= 'letter-spacing:' . $header_spacing . 'px;';

	if ( $headerfont )
		$output .= 'h1.site-title, .site-title { ' . $headerfont . ' }'. "\n";

// Headings Font Styles

	$headingsfont = '';
	$headings_font = tb_option('headings_font');
	$headings_style = tb_option('headings_style');
	$headings_weight = tb_option('headings_weight');
	$headings_transform = tb_option('headings_transform');
	$headings_widget_title_size = tb_option('headings_widget_title_size');
	$headings_widget_title_spacing = tb_option('headings_widget_title_spacing');
	$headings_h1_size = tb_option('headings_h1_size');
	$headings_h2_size = tb_option('headings_h2_size');
	$headings_h3_size = tb_option('headings_h3_size');
	$headings_h4_size = tb_option('headings_h4_size');
	$headings_h5_size = tb_option('headings_h5_size');
	$headings_h6_size = tb_option('headings_h6_size');
	$headings_h1_spacing = tb_option('headings_h1_spacing');
	$headings_h2_spacing = tb_option('headings_h2_spacing');
	$headings_h3_spacing = tb_option('headings_h3_spacing');
	$headings_h4_spacing = tb_option('headings_h4_spacing');
	$headings_h5_spacing = tb_option('headings_h5_spacing');
	$headings_h6_spacing = tb_option('headings_h6_spacing');


	if ( $headings_font )
		$headingsfont .= 'font-family:' . $headings_font . ';';
	if ( $headings_style )
		$headingsfont .= 'font-style:' . $headings_style . ';';
	if ( $headings_weight )
		$headingsfont .= 'font-weight:' . $headings_weight . ';';
	if ( $headings_transform )
		$headingsfont .= 'text-transform:' . $headings_transform . ';';

	if ( $headingsfont )
		$output .= 'h1,h2,h3,h4,h5,h6 { ' . $headingsfont . ' }'. "\n";

	if ( $headings_widget_title_size )
		$output .= 'h2.widgettitle, h2.widget-title {font-size:' . $headings_widget_title_size . 'px;}'. "\n";
	if ( $headings_h1_size )
		$output .= 'h1 {font-size:' . $headings_h1_size . 'px;}'. "\n";
	if ( $headings_h2_size )
		$output .= 'h2 {font-size:' . $headings_h2_size . 'px;}'. "\n";
	if ( $headings_h3_size )
		$output .= 'h3 {font-size:' . $headings_h3_size . 'px;}'. "\n";
	if ( $headings_h4_size )
		$output .= 'h4 {font-size:' . $headings_h4_size . 'px;}'. "\n";
	if ( $headings_h5_size )
		$output .= 'h5 {font-size:' . $headings_h5_size . 'px;}'. "\n";
	if ( $headings_h6_size )
		$output .= 'h6 {font-size:' . $headings_h6_size . 'px;}'. "\n";
	if ( $headings_widget_title_spacing )
		$output .= 'h2.widgettitle, h2.widget-title {letter-spacing:' . $headings_widget_title_spacing . 'px;}'. "\n";
	if ( $headings_h1_spacing )
		$output .= 'h1 {letter-spacing:' . $headings_h1_spacing . 'px;}'. "\n";
	if ( $headings_h2_spacing )
		$output .= 'h2 {letter-spacing:' . $headings_h2_spacing . 'px;}'. "\n";
	if ( $headings_h3_spacing )
		$output .= 'h3 {letter-spacing:' . $headings_h3_spacing . 'px;}'. "\n";
	if ( $headings_h4_spacing )
		$output .= 'h4 {letter-spacing:' . $headings_h4_spacing . 'px;}'. "\n";
	if ( $headings_h5_spacing )
		$output .= 'h5 {letter-spacing:' . $headings_h5_spacing . 'px;}'. "\n";
	if ( $headings_h6_spacing )
		$output .= 'h6 {letter-spacing:' . $headings_h6_spacing . 'px;}'. "\n";

// Body Font Styles

	$bodyfont = '';
	$body_font = tb_option('body_font');
	$body_style = tb_option('body_style');
	$body_weight = tb_option('body_weight');
	$body_transform = tb_option('body_transform');
	$body_size = tb_option('body_size');
	$body_line_height = tb_option('body_line_height');

	if ( $body_font )
		$bodyfont .= 'font-family:' . $body_font . ';';
	if ( $body_style )
		$bodyfont .= 'font-style:' . $body_style . ';';
	if ( $body_weight )
		$bodyfont .= 'font-weight:' . $body_weight . ';';
	if ( $body_size )
		$bodyfont .= 'font-size:' . $body_size . 'px;';
	if ( $body_line_height )
		$bodyfont .= 'line-height:' . $body_line_height . ';';
	if ( $body_transform )
		$bodyfont .= 'text-transform:' . $body_transform . ';';

	if ( $bodyfont )
		$output .= 'body { ' . $bodyfont . ' }'. "\n";

// Sidebar Font Styles

	$sidebarfont = '';
	$sidebar_font = tb_option('sidebar_font');
	$sidebar_style = tb_option('sidebar_style');
	$sidebar_weight = tb_option('sidebar_weight');
	$sidebar_transform = tb_option('sidebar_transform');
	$sidebar_size = tb_option('sidebar_size');
	$sidebar_line_height = tb_option('sidebar_line_height');

	if ( $sidebar_font )
		$sidebarfont .= 'font-family:' . $sidebar_font . ';';
	if ( $sidebar_style )
		$sidebarfont .= 'font-style:' . $sidebar_style . ';';
	if ( $sidebar_weight )
		$sidebarfont .= 'font-weight:' . $sidebar_weight . ';';
	if ( $sidebar_size )
		$sidebarfont .= 'font-size:' . $sidebar_size . 'px;';
	if ( $sidebar_line_height )
		$sidebarfont .= 'line-height:' . $sidebar_line_height . ';';
	if ( $sidebar_transform )
		$sidebarfont .= 'text-transform:' . $sidebar_transform . ';';

	if ( $sidebarfont )
		$output .= '.site-inner .sidebar { ' . $sidebarfont . ' }'. "\n";

// Top Nav Font Styles

	$topnavfont = '';
	$topnav_font = tb_option('topnav_font');
	$topnav_style = tb_option('topnav_style');
	$topnav_weight = tb_option('topnav_weight');
	$topnav_transform = tb_option('topnav_transform');
	$topnav_size = tb_option('topnav_size');
	$topnav_spacing = tb_option('topnav_spacing');

	if ( $topnav_font )
		$topnavfont .= 'font-family:' . $topnav_font . ';';
	if ( $topnav_style )
		$topnavfont .= 'font-style:' . $topnav_style . ';';
	if ( $topnav_weight )
		$topnavfont .= 'font-weight:' . $topnav_weight . ';';
	if ( $topnav_size )
		$topnavfont .= 'font-size:' . $topnav_size . 'px;';
	if ( $topnav_spacing )
		$topnavfont .= 'letter-spacing:' . $topnav_spacing . 'px;';
	if ( $topnav_transform )
		$topnavfont .= 'text-transform:' . $topnav_transform . ';';

	if ( $topnavfont )
		$output .= '.nav-primary { ' . $topnavfont . ' }'. "\n";

// Heaader Nav Font Styles

	$headernavfont = '';
	$headernav_font = tb_option('headernav_font');
	$headernav_style = tb_option('headernav_style');
	$headernav_weight = tb_option('headernav_weight');
	$headernav_transform = tb_option('headernav_transform');
	$headernav_size = tb_option('headernav_size');
	$headernav_spacing = tb_option('headernav_spacing');

	if ( $headernav_font )
		$headernavfont .= 'font-family:' . $headernav_font . ';';
	if ( $headernav_style )
		$headernavfont .= 'font-style:' . $headernav_style . ';';
	if ( $headernav_weight )
		$headernavfont .= 'font-weight:' . $headernav_weight . ';';
	if ( $headernav_size )
		$headernavfont .= 'font-size:' . $headernav_size . 'px;';
	if ( $headernav_spacing )
		$headernavfont .= 'letter-spacing:' . $headernav_spacing . 'px;';
	if ( $headernav_transform )
		$headernavfont .= 'text-transform:' . $headernav_transform . ';';

	if ( $headernavfont )
		$output .= '.nav-secondary { ' . $headernavfont . ' }'. "\n";

// Fixed Nav Font Styles

	$fixednavfont = '';
	$fixednav_font = tb_option('fixednav_font');
	$fixednav_style = tb_option('fixednav_style');
	$fixednav_weight = tb_option('fixednav_weight');
	$fixednav_transform = tb_option('fixednav_transform');
	$fixednav_size = tb_option('fixednav_size');
	$fixednav_spacing = tb_option('fixednav_spacing');

	if ( $fixednav_font )
		$fixednavfont .= 'font-family:' . $fixednav_font . ';';
	if ( $fixednav_style )
		$fixednavfont .= 'font-style:' . $fixednav_style . ';';
	if ( $fixednav_weight )
		$fixednavfont .= 'font-weight:' . $fixednav_weight . ';';
	if ( $fixednav_size )
		$fixednavfont .= 'font-size:' . $fixednav_size . 'px;';
	if ( $fixednav_spacing )
		$fixednavfont .= 'letter-spacing:' . $fixednav_spacing . 'px;';
	if ( $fixednav_transform )
		$fixednavfont .= 'text-transform:' . $fixednav_transform . ';';

	if ( $fixednavfont )
		$output .= '.nav-fixed { ' . $fixednavfont . ' }'. "\n";

// Post Meta Font Styles

	$postmetafont = '';
	$postmeta_font = tb_option('postmeta_font');
	$postmeta_style = tb_option('postmeta_style');
	$postmeta_weight = tb_option('postmeta_weight');
	$postmeta_transform = tb_option('postmeta_transform');
	$postmeta_size = tb_option('postmeta_size');
	$postmeta_spacing = tb_option('postmeta_spacing');

	if ( $postmeta_font )
		$postmetafont .= 'font-family:' . $postmeta_font . ';';
	if ( $postmeta_style )
		$postmetafont .= 'font-style:' . $postmeta_style . ';';
	if ( $postmeta_weight )
		$postmetafont .= 'font-weight:' . $postmeta_weight . ';';
	if ( $postmeta_size )
		$postmetafont .= 'font-size:' . $postmeta_size . 'px;';
	if ( $postmeta_spacing )
		$postmetafont .= 'letter-spacing:' . $postmeta_spacing . 'px;';
	if ( $postmeta_transform )
		$postmetafont .= 'text-transform:' . $postmeta_transform . ';';

	if ( $postmetafont )
		$output .= '.comment-metadata,.wp-caption,.wp-caption-text,.entry-caption,.gallery-caption,.entry-media .thumb-caption,.sitemap-entry-meta,.entry-meta { ' . $postmetafont . ' }'. "\n";

// Top Page Border Color Settings

	$pageborder_on = tb_option('page_border_on');
	$pageborder_color = tb_option('page_border_color'); 

	if ( !$pageborder_on ) 
		$output .= '.site-container { border: 0; }' . "\n";
	if ( $pageborder_color ) 
		$output .= '.site-container { border-color:'.$pageborder_color.'; }' . "\n";

// Top Nav Colors

	$topnav_bg = tb_option('topnav_bg_color');
	$topnav_link = tb_option('topnav_link_color'); 
	$topnav_link_hover = tb_option('topnav_link_hover_color');
	$topnav_link_bg_hover = tb_option('topnav_link_hover_bg_color');
	$topnav_link_current = tb_option('topnav_link_current_color');
	$topnav_icon = tb_option('topnav_icon_color');
	$topnav_drop_border = tb_option('topnav_drop_border_color');

	if ( $topnav_bg ) 
		$output .= '.nav-primary, .nav-primary .nav-menu ul, .nav-primary .nav-menu ul a, .nav-primary .nav-menu ul a:hover, .darkheader .nav-primary, .darkheader .nav-primary .nav-menu ul, .darkheader .nav-primary .nav-menu ul a, .darkheader .nav-primary .nav-menu ul a:hover { background-color:'.$topnav_bg.'; }' . "\n";
	if ( $topnav_drop_border ) 
		$output .= '.nav-primary, .nav-primary .nav-menu a, .nav-primary .nav-menu ul, .nav-primary .nav-menu ul a, .darkheader .nav-primary, .darkheader .nav-primary .nav-menu a, .darkheader .nav-primary .nav-menu ul, .darkheader .nav-primary .nav-menu ul a { border-color:'.$topnav_drop_border.'; }' . "\n";
	if ( $topnav_link ) 
		$output .= '.nav-primary .nav-menu a, .darkheader .nav-primary .nav-menu a { color:'.$topnav_link.' !important; }' . "\n";
	if ( $topnav_link_hover ) 
		$output .= '.nav-primary .nav-menu a:hover, .darkheader .nav-primary .nav-menu a:hover { color:'.$topnav_link_hover.' !important; }' . "\n";
	if ( $topnav_link_bg_hover ) 
		$output .= '.nav-primary .nav-menu a:hover, .darkheader .nav-primary .nav-menu a:hover { background-color:'.$topnav_link_bg_hover.' !important; }' . "\n";
	if ( $topnav_icon ) 
		$output .= '.nav-primary .search-button, .nav-primary .menu-toggle, .nav-primary .subicon, .darkheader .nav-primary .search-button, .darkheader .nav-primary .menu-toggle, .darkheader .nav-primary .subicon { color:'.$topnav_icon.' !important; }' . "\n";
	if ( $topnav_link_current ) 
		$output .= '.nav-primary .nav-menu .current_page_item > a, .nav-primary .nav-menu .current_page_ancestor > a, .nav-primary .nav-menu .current-menu-item > a, .nav-primary .nav-menu .current-menu-ancestor > a, .nav-primary .search-button:hover, .nav-primary .menu-toggle:hover, .darkheader .nav-primary .nav-menu .current_page_item > a, .darkheader .nav-primary .nav-menu .current_page_ancestor > a, .darkheader .nav-primary .nav-menu .current-menu-item > a, .darkheader .nav-primary .nav-menu .current-menu-ancestor > a, .darkheader .nav-primary .search-button:hover, .darkheader .nav-primary .menu-toggle:hover { color:'.$topnav_link_current.' !important; }' . "\n";

// Header Nav Colors

	$headernav_bg = tb_option('headernav_bg_color');
	$headernav_link = tb_option('headernav_link_color'); 
	$headernav_link_hover = tb_option('headernav_link_hover_color');
	$headernav_link_bg_hover = tb_option('headernav_link_hover_bg_color');  
	$headernav_link_current = tb_option('headernav_link_current_color');
	$headernav_icon = tb_option('headernav_icon_color');
	$headernav_drop_border = tb_option('headernav_drop_border_color');

	if ( $headernav_bg ) 
		$output .= '.nav-secondary, .nav-secondary .nav-menu ul, .nav-secondary .nav-menu ul a, .nav-secondary .nav-menu ul a:hover, .darkheader .nav-secondary, .darkheader .nav-secondary .nav-menu ul, .darkheader .nav-secondary .nav-menu ul a, .darkheader .nav-secondary .nav-menu ul a:hover, .nav-just .nav-below-header .nav-menu > li a:hover, .darkheader .nav-just .nav-below-header .nav-menu > li a:hover { background-color:'.$headernav_bg.'; }' . "\n";
	if ( $headernav_bg ) 
		$output .= '@media only screen and (max-width: 960px) {.nav-secondary, .nav-secondary .toggled-on .nav-menu, .nav-secondary .toggled-on .nav-menu ul, .nav-secondary .toggled-on .nav-menu li, .nav-secondary .toggled-on .nav-menu a, .nav-secondary .toggled-on .nav-menu ul a { background-color:'.$headernav_bg.' !important; }}' . "\n";
	if ( $headernav_drop_border ) 
		$output .= '.nav-secondary, .nav-secondary .nav-menu a, .nav-secondary .nav-menu ul, .nav-secondary .nav-menu ul a, .darkheader .nav-secondary, .darkheader .nav-secondary .nav-menu a, .darkheader .nav-secondary .nav-menu ul, .darkheader .nav-secondary .nav-menu ul a, .nav-just .nav-below-header .nav-menu > li, .darkheader .nav-just .nav-below-header .nav-menu > li,	.nav-just .nav-below-header .nav-menu > li:last-child, .darkheader .nav-just .nav-below-header .nav-menu > li:last-child { border-color:'.$headernav_drop_border.'; }' . "\n";
	if ( $headernav_link ) 
		$output .= '.nav-secondary .nav-menu a, .darkheader .nav-secondary .nav-menu a { color:'.$headernav_link.' !important; }' . "\n";
	if ( $headernav_link_hover ) 
		$output .= '.nav-secondary .nav-menu a:hover, .darkheader .nav-secondary .nav-menu a:hover { color:'.$headernav_link_hover.' !important; }' . "\n";
	if ( $headernav_link_bg_hover ) 
		$output .= '.nav-secondary .nav-menu a:hover, .darkheader .nav-secondary .nav-menu a:hover { background-color:'.$headernav_link_bg_hover.' !important; }' . "\n";
	if ( $headernav_icon ) 
		$output .= '.nav-secondary .search-button, .nav-secondary .menu-toggle, .nav-secondary .subicon, .darkheader .nav-secondary .search-button, .darkheader .nav-secondary .menu-toggle, .darkheader .nav-secondary .subicon { color:'.$headernav_icon.' !important; }' . "\n";
	if ( $headernav_link_current ) 
		$output .= '.nav-secondary .nav-menu .current_page_item > a, .nav-secondary .nav-menu .current_page_ancestor > a, .nav-secondary .nav-menu .current-menu-item > a, .nav-secondary .nav-menu .current-menu-ancestor > a, .nav-secondary .search-button:hover, .nav-secondary .menu-toggle:hover, .darkheader .nav-secondary .nav-menu .current_page_item > a, .darkheader .nav-secondary .nav-menu .current_page_ancestor > a, .darkheader .nav-secondary .nav-menu .current-menu-item > a, .darkheader .nav-secondary .nav-menu .current-menu-ancestor > a, .darkheader .nav-secondary .search-button:hover, .darkheader .nav-secondary .menu-toggle:hover { color:'.$headernav_link_current.' !important; }' . "\n";



// Fixed Nav Colors

	$fixednav_bg = tb_option('fixednav_bg_color');
	$fixednav_link = tb_option('fixednav_link_color'); 
	$fixednav_link_hover = tb_option('fixednav_link_hover_color');
	$fixednav_link_bg_hover = tb_option('fixednav_link_hover_bg_color'); 
	$fixednav_link_current = tb_option('fixednav_link_current_color');
	$fixednav_icon = tb_option('fixednav_icon_color');
	$fixednav_drop_border = tb_option('fixednav_drop_border_color');

	if ( $fixednav_bg ) 
		$output .= '.nav-fixed, .nav-fixed .nav-menu ul, .nav-fixed .nav-menu ul a, .nav-fixed .nav-menu ul a:hover, .darkheader .nav-fixed, .darkheader .nav-fixed .nav-menu ul, .darkheader .nav-fixed .nav-menu ul a, .darkheader .nav-fixed .nav-menu ul a:hover { background-color:'.$fixednav_bg.'; }' . "\n";
	if ( $fixednav_drop_border ) 
		$output .= '.nav-fixed, .nav-fixed .nav-menu a, .nav-fixed .nav-menu ul, .nav-fixed .nav-menu ul a, .darkheader .nav-fixed, .darkheader .nav-fixed .nav-menu a, .darkheader .nav-fixed .nav-menu ul, .darkheader .nav-fixed .nav-menu ul a { border-color:'.$fixednav_drop_border.'; }' . "\n";
	if ( $fixednav_link ) 
		$output .= '.nav-fixed .nav-menu a, .darkheader .nav-fixed .nav-menu a { color:'.$fixednav_link.' !important; }' . "\n";
	if ( $fixednav_link_hover ) 
		$output .= '.nav-fixed .nav-menu a:hover, .darkheader .nav-fixed .nav-menu a:hover { color:'.$fixednav_link_hover.' !important; }' . "\n";
	if ( $fixednav_link_bg_hover ) 
		$output .= '.nav-fixed .nav-menu a:hover, .darkheader .nav-fixed .nav-menu a:hover { background-color:'.$fixednav_link_bg_hover.' !important; }' . "\n";
	if ( $fixednav_icon ) 
		$output .= '.nav-fixed .search-button, .nav-fixed .menu-toggle, .nav-fixed .subicon, .darkheader .nav-fixed .search-button, .darkheader .nav-fixed .menu-toggle, .darkheader .nav-fixed .subicon { color:'.$fixednav_icon.' !important; }' . "\n";
	if ( $fixednav_link_current ) 
		$output .= '.nav-fixed .nav-menu .current_page_item > a, .nav-fixed .nav-menu .current_page_ancestor > a, .nav-fixed .nav-menu .current-menu-item > a, .nav-fixed .nav-menu .current-menu-ancestor > a, .nav-fixed .search-button:hover, .nav-fixed .menu-toggle:hover, .darkheader .nav-fixed .nav-menu .current_page_item > a, .darkheader .nav-fixed .nav-menu .current_page_ancestor > a, .darkheader .nav-fixed .nav-menu .current-menu-item > a, .darkheader .nav-fixed .nav-menu .current-menu-ancestor > a, .darkheader .nav-fixed .search-button:hover, .darkheader .nav-fixed .menu-toggle:hover { color:'.$fixednav_link_current.' !important; }' . "\n";

// Header Color Options

	$header_bg_color = tb_option('header_bg_color');
	$header_border_color = tb_option('header_border_color');
	$title_icon_color = tb_option('site_title_icon_color');
	$title_color = tb_option('site_title_color');
	$tagline_color = tb_option('tagline_color');

	if ( $header_bg_color ) 
		$output .= '.site-header { background-color:'.$header_bg_color.' !important;}' . "\n";
	if ( $header_bg_color ) 
		$output .= '.darkheader .site-header { background-color:'.$header_bg_color.' !important;}' . "\n";
	if ( $header_border_color ) 
		$output .= '.site-header { border-color:'.$header_border_color.' !important;}' . "\n";
	if ( $header_border_color ) 
		$output .= '.darkheader .site-header { border-color:'.$header_border_color.' !important;}' . "\n";
	if ( $title_color ) 
		$output .= '.site-title { color:'.$title_color.'!important;}' . "\n";
	if ( $title_color ) 
		$output .= '.darkheader .site-title { color:'.$title_color.'!important;}' . "\n";
	if ( $tagline_color ) 
		$output .= '.site-description { color:'.$tagline_color.'!important;}' . "\n";
	if ( $tagline_color ) 
		$output .= '.darkheader .site-description { color:'.$tagline_color.'!important;}' . "\n";
	if ( $title_icon_color ) 
		$output .= '.site-title i { color:'.$title_icon_color.';}' . "\n";

// Body Color Options

	$body_text_color = tb_option('body_text_color');
	$body_headings_color = tb_option('body_headings_color');
	$body_link_color = tb_option('body_link_color');
	$body_link_hover_color = tb_option('body_link_hover_color');
	$post_title_link_color = tb_option('post_title_link_color');
	$post_title_link_hover_color = tb_option('post_title_link_hover_color');

	if ( $body_text_color ) 
		$output .= '.site-inner-wrap { color:'.$body_text_color.'; }' . "\n";
	if ( $body_headings_color ) 
		$output .= '.site-inner-wrap h1,.site-inner-wrap h2,.site-inner-wrap h3,.site-inner-wrap h4,.site-inner-wrap h5,.site-inner-wrap h6 { color:'.$body_headings_color.'; }' . "\n";
	if ( $body_link_color ) 
		$output .= '.site-content a, .site-content a:link, .site-content a:visited { color:'.$body_link_color.'; }' . "\n";
	if ( $body_link_hover_color ) 
		$output .= '.site-content a:hover, .site-content a:active, .site-content a:focus { color:'.$body_link_hover_color.'; }' . "\n";
	if ( $post_title_link_color ) 
		$output .= '.entry-title a, .entry-title a:link, .entry-title a:visited { color:'.$post_title_link_color.' !important; }' . "\n";
	if ( $post_title_link_hover_color ) 
		$output .= '.entry-title a:hover, .entry-title a:active, .entry-title a:focus { color:'.$post_title_link_hover_color.' !important; }' . "\n";

// Sidebar Color Options

	$sidebar_text_color = tb_option('sidebar_text_color');
	$sidebar_link_color = tb_option('sidebar_link_color');
	$sidebar_link_hover_color = tb_option('sidebar_link_hover_color');
	$widget_title_color = tb_option('widget_title_color');
	$widget_title_link_color = tb_option('widget_title_link_color');
	$widget_title_link_hover_color = tb_option('widget_title_link_hover_color');

	if ( $sidebar_text_color ) 
		$output .= '.site-inner .sidebar { color:'.$sidebar_text_color.'; }' . "\n";
	if ( $sidebar_link_color ) 
		$output .= '.site-inner .sidebar a, .site-inner .sidebar a:link, .site-inner .sidebar a:visited { color:'.$sidebar_link_color.'; }' . "\n";
	if ( $sidebar_link_hover_color ) 
		$output .= '.site-inner .sidebar a:hover, .site-inner .sidebar a:active, .site-inner .sidebar a:focus { color:'.$sidebar_link_hover_color.'; }' . "\n";
	if ( $widget_title_color ) 
		$output .= '.site-inner .sidebar h2.widget-title { color:'.$widget_title_color.'; }' . "\n";
	if ( $widget_title_link_color ) 
		$output .= '.site-inner .sidebar h2.widget-title a, .site-inner .sidebar h2.widget-title a:link, .site-inner .sidebar h2.widget-title a:visited { color:'.$widget_title_link_color.' !important; }' . "\n";
	if ( $widget_title_link_hover_color ) 
		$output .= '.site-inner .sidebar h2.widget-title a:hover, .site-inner .sidebar h2.widget-title a:active, .site-inner .sidebar h2.widget-title a:focus { color:'.$widget_title_link_hover_color.' !important; }' . "\n";

// Footer Widgets Color Options

	$footer_widgets_bg_color = tb_option('footer_widgets_bg_color');
	$footer_widgets_border_color = tb_option('footer_widgets_border_color');
	$footer_widgets_text_color = tb_option('footer_widgets_text_color');
	$footer_widgets_headings_color = tb_option('footer_widgets_headings_color');
	$footer_widgets_link_color = tb_option('footer_widgets_link_color');
	$footer_widgets_link_hover_color = tb_option('footer_widgets_link_hover_color');

	if ( $footer_widgets_bg_color ) 
		$output .= '#footer-widgets { background-color:'.$footer_widgets_bg_color.'; }' . "\n";
	if ( $footer_widgets_border_color ) 
		$output .= '#footer-widgets { border-color:'.$footer_widgets_border_color.'; }' . "\n";
	if ( $footer_widgets_text_color ) 
		$output .= '#footer-widgets { color:'.$footer_widgets_text_color.'; }' . "\n";
	if ( $footer_widgets_headings_color ) 
		$output .= '#footer-widgets h1, #footer-widgets h2, footer-widgets h3, #footer-widgets h4, #footer-widgets h5, #footer-widgets h6 { color:'.$footer_widgets_headings_color.' !important; }' . "\n";
	if ( $footer_widgets_headings_color ) 
		$output .= '#footer-widgets h2.widgettitle, #footer-widgets h2.widgettitle a { color:'.$footer_widgets_headings_color.' !important; }' . "\n";
	if ( $footer_widgets_link_color ) 
		$output .= '#footer-widgets a, #footer-widgets a:link, #footer-widgets a:visited { color:'.$footer_widgets_link_color.' !important; }' . "\n";
	if ( $footer_widgets_link_hover_color ) 
		$output .= '#footer-widgets a:hover, #footer-widgets a:active, #footer-widgets a:focus { color:'.$footer_widgets_link_hover_color.' !important; }' . "\n";

// Footer Color Options

	$footer_bg_color = tb_option('footer_bg_color');
	$footer_border_color = tb_option('footer_border_color');
	$footer_text_color = tb_option('footer_text_color');
	$footer_link_color = tb_option('footer_link_color');
	$footer_link_hover_color = tb_option('footer_link_hover_color');
	$footer_icon_color = tb_option('footer_icon_color');

	if ( $footer_bg_color ) 
		$output .= '.site-footer { background-color:'.$footer_bg_color.'; }' . "\n";
	if ( $footer_border_color ) 
		$output .= '.site-footer { border-color:'.$footer_border_color.'; }' . "\n";
	if ( $footer_text_color ) 
		$output .= '.site-footer { color:'.$footer_text_color.'; }' . "\n";
	if ( $footer_link_color ) 
		$output .= '.site-footer a, .site-footer a:link, .site-footer a:visited { color:'.$footer_link_color.'; }' . "\n";
	if ( $footer_link_hover_color ) 
		$output .= '.site-footer a:hover, .site-footer a:active, .site-footer a:focus { color:'.$footer_link_hover_color.'; }' . "\n";
	if ( $footer_icon_color ) 
		$output .= '.site-footer .site-icons a { color:'.$footer_icon_color.' !important; } .site-footer .site-icons a:hover { color:#fff !important }' . "\n";

// Post By Cat Color Options

	$postbycat_bg_color = tb_option('postbycat_bg_color');
	$postbycat_link_color = tb_option('postbycat_link_color');
	$postbycat_border = tb_option('postbycat_border');

	if ( $postbycat_bg_color ) 
		$output .= 'h2.feat-title { background-color:'.$postbycat_bg_color.'; }' . "\n";
	if ( $postbycat_bg_color == '#fff' || $postbycat_bg_color == '#ffffff' ) 
		$output .= 'h2.feat-title { padding:0 0 3px; }' . "\n";
	if ( $postbycat_link_color ) 
		$output .= 'h2.feat-title a, h2.feat-title, h2.feat-title i { color:'.$postbycat_link_color.' !important; }' . "\n";
	if ( $postbycat_border ) 
		$output .= 'h2.feat-title { background-image:url(' . get_template_directory_uri() . '/images/dotted-line.png); background-position:bottom left; background-repeat:repeat-x; }' . "\n";

// Hide Banner Ads on Single Post or Page

	if ( is_singular() && get_post_meta($post->ID, 'tb_hide_ads', true) )
		$output .= '.banner-ad { display:none !important; }' . "\n";

// Hide Read More Button is Active in Post Meta

	$postmeta = tb_option('bottom_postmeta');
	if ( in_array('read-more', $postmeta) )
		$output .= '.read-more { display:none !important; }' . "\n";

// Post Bottom Widget Area

	$postbottom = '';
	$post_bottom_bg = tb_option('post_bottom_bg');
	$post_bottom_align = tb_option('post_bottom_align');
	$post_bottom_padding = tb_option('post_bottom_padding');
	$post_bottom_border_size = tb_option('post_bottom_border_size');
	$post_bottom_border_color = tb_option('post_bottom_border_color');
	$post_bottom_font_color = tb_option('post_bottom_font_color');
	$post_bottom_link_color = tb_option('post_bottom_link_color');
	$post_bottom_link_hover_color = tb_option('post_bottom_link_hover_color');

	if ( $post_bottom_bg )
		$postbottom .= 'background-color:'.$post_bottom_bg.';';
	if ( $post_bottom_align )
		$postbottom .= 'text-align:'.$post_bottom_align.';';
	if ( $post_bottom_padding )
		$postbottom .= 'padding:'.$post_bottom_padding.'px;';
	if ( $post_bottom_border_size )
		$postbottom .= 'border-style:solid;border-width:'.$post_bottom_border_size.'px;';
	if ( $post_bottom_border_color )
		$postbottom .= 'border-color:'.$post_bottom_border_color.';';
	if ( $post_bottom_font_color )
		$postbottom .= 'color:'.$post_bottom_font_color.' !important;';
	if ( $postbottom )
		$output .= '.single-post-bottom { '.$postbottom.' }'. "\n";

	if ( $post_bottom_link_color )
		$output .= '.single-post-bottom a, .single-post-bottom a:link, .single-post-bottom a:visited { color:'.$post_bottom_link_color.' !important; }' . "\n";
	if ( $post_bottom_link_hover_color )
		$output .= '.single-post-bottom a:hover, .single-post-bottom a:active { color:'.$post_bottom_link_hover_color.' !important; }' . "\n";
	if ( $post_bottom_font_color )
		$output .= '.single-post-bottom .widgettitle,.single-post-bottom h1,.single-post-bottom h2,.single-post-bottom h3,.single-post-bottom h4,.single-post-bottom h5,.single-post-bottom h6 { color:'.$post_bottom_font_color.' !important; }' . "\n";

// Default Button/Input Colors

	$solebutton = '';
	$solebuttonhover = '';
	$solebutton_bg_color = tb_option('button_bg_color');
	$solebutton_font_color = tb_option('button_font_color');
	$solebutton_bg_hover_color = tb_option('button_bg_hover_color');
	$solebutton_font_hover_color = tb_option('button_font_hover_color');

	if ( $solebutton_bg_color )
		$solebutton .= 'background-color:'.$solebutton_bg_color.';';
	if ( $solebutton_font_color )
		$solebutton .= 'color:'.$solebutton_font_color.';';
	if ( $solebutton )
		$output .= 'button,input[type="button"],input[type="reset"],input[type="submit"],#footer-widgets button,#footer-widgets input[type="button"],#footer-widgets input[type="reset"],#footer-widgets input[type="submit"] { '.$solebutton.' }'. "\n";
	if ( $solebutton_bg_hover_color )
		$solebuttonhover .= 'background-color:'.$solebutton_bg_hover_color.';';
	if ( $solebutton_font_hover_color )
		$solebuttonhover .= 'color:'.$solebutton_font_hover_color.';';
	if ( $solebuttonhover )
		$output .= 'button:hover,input[type="button"]:hover,input[type="reset"]:hover,input[type="submit"]:hover,#footer-widgets button:hover,#footer-widgets input[type="button"]:hover,#footer-widgets input[type="reset"]:hover,#footer-widgets input[type="submit"]:hover { '.$solebuttonhover.' }'. "\n";

// Default Button Colors

	$button = '';
	$buttonhover = '';
	$button_bg_color = tb_option('button_bg_color');
	$button_font_color = tb_option('button_font_color');
	$button_bg_hover_color = tb_option('button_bg_hover_color');
	$button_font_hover_color = tb_option('button_font_hover_color');

	if ( $button_bg_color )
		$button .= 'background-color:'.$button_bg_color.' !important;';
	if ( $button_font_color )
		$button .= 'color:'.$button_font_color.' !important;';
	if ( $button )
		$output .= '#next-posts a:hover,.email-form input[type="submit"],.email-form input[type="button"],.email-form button,#commentform input#submit,#commentform input[type="submit"],input.search-submit,#footer-widgets .email-form input[type="submit"],#footer-widgets .email-form input[type="button"],#footer-widgets .email-form button,#footer-widgets input.search-submit,a.more-link.button { '.$button.' }'. "\n";
	if ( $button_bg_hover_color )
		$buttonhover .= 'background-color:'.$button_bg_hover_color.' !important;';
	if ( $button_font_hover_color )
		$buttonhover .= 'color:'.$button_font_hover_color.' !important;';
	if ( $buttonhover )
		$output .= '#next-posts a,.email-form input[type="submit"]:hover,.email-form input[type="button"]:hover,.email-form button:hover,#commentform input#submit:hover,#commentform input[type="submit"]:hover,input.search-submit:hover,#footer-widgets .email-form input[type="submit"]:hover,#footer-widgets .email-form input[type="button"]:hover,#footer-widgets .email-form button:hover,#footer-widgets input.search-submit:hover,a.more-link.button:hover { '.$buttonhover.' }'. "\n";

// Next Posts Button Colors

	$nextposts_button = '';
	$nextposts_buttonhover = '';
	$nextposts_button_bg_color = tb_option('nextposts_button_bg_color');
	$nextposts_button_font_color = tb_option('nextposts_button_font_color');
	$nextposts_button_bg_hover_color = tb_option('nextposts_button_bg_hover_color');
	$nextposts_button_font_hover_color = tb_option('nextposts_button_font_hover_color');

	if ( $nextposts_button_bg_color )
		$nextposts_button .= 'background-color:'.$nextposts_button_bg_color.' !important;';
	if ( $nextposts_button_font_color )
		$nextposts_button .= 'color:'.$nextposts_button_font_color.' !important;';
	if ( $nextposts_button )
		$output .= '#next-posts a { '.$nextposts_button.' }'. "\n";
	if ( $nextposts_button_bg_hover_color )
		$nextposts_buttonhover .= 'background-color:'.$nextposts_button_bg_hover_color.' !important;';
	if ( $nextposts_button_font_hover_color )
		$nextposts_buttonhover .= 'color:'.$nextposts_button_font_hover_color.' !important;';
	if ( $nextposts_buttonhover )
		$output .= '#next-posts a:hover { '.$nextposts_buttonhover.' }'. "\n";

// Read More Button Colors

	$readmore_button = '';
	$readmore_buttonhover = '';
	$readmore_button_bg_color = tb_option('readmore_button_bg_color');
	$readmore_button_font_color = tb_option('readmore_button_font_color');
	$readmore_button_bg_hover_color = tb_option('readmore_button_bg_hover_color');
	$readmore_button_font_hover_color = tb_option('readmore_button_font_hover_color');

	if ( $readmore_button_bg_color )
		$readmore_button .= 'background-color:'.$readmore_button_bg_color.' !important;';
	if ( $readmore_button_font_color )
		$readmore_button .= 'color:'.$readmore_button_font_color.' !important;';
	if ( $readmore_button )
		$output .= 'a.more-link.button { '.$readmore_button.' }'. "\n";
	if ( $readmore_button_bg_hover_color )
		$readmore_buttonhover .= 'background-color:'.$readmore_button_bg_hover_color.' !important;';
	if ( $readmore_button_font_hover_color )
		$readmore_buttonhover .= 'color:'.$readmore_button_font_hover_color.' !important;';
	if ( $readmore_buttonhover )
		$output .= 'a.more-link.button:hover { '.$readmore_buttonhover.' }'. "\n";

// Search Submit Button Colors

	$search_button = '';
	$search_buttonhover = '';
	$search_button_bg_color = tb_option('search_button_bg_color');
	$search_button_font_color = tb_option('search_button_font_color');
	$search_button_bg_hover_color = tb_option('search_button_bg_hover_color');
	$search_button_font_hover_color = tb_option('search_button_font_hover_color');

	if ( $search_button_bg_color )
		$search_button .= 'background-color:'.$search_button_bg_color.' !important;';
	if ( $search_button_font_color )
		$search_button .= 'color:'.$search_button_font_color.' !important;';
	if ( $search_button )
		$output .= 'input.search-submit { '.$search_button.' }'. "\n";
	if ( $search_button_bg_hover_color )
		$search_buttonhover .= 'background-color:'.$search_button_bg_hover_color.' !important;';
	if ( $search_button_font_hover_color )
		$search_buttonhover .= 'color:'.$search_button_font_hover_color.' !important;';
	if ( $search_buttonhover )
		$output .= 'input.search-submit:hover { '.$search_buttonhover.' }'. "\n";

// Comment Submit Button Colors

	$comment_button = '';
	$comment_buttonhover = '';
	$comment_button_bg_color = tb_option('comment_button_bg_color');
	$comment_button_font_color = tb_option('comment_button_font_color');
	$comment_button_bg_hover_color = tb_option('comment_button_bg_hover_color');
	$comment_button_font_hover_color = tb_option('comment_button_font_hover_color');

	if ( $comment_button_bg_color )
		$comment_button .= 'background-color:'.$comment_button_bg_color.' !important;';
	if ( $comment_button_font_color )
		$comment_button .= 'color:'.$comment_button_font_color.' !important;';
	if ( $comment_button )
		$output .= '#commentform input#submit,#commentform input[type="submit"] { '.$comment_button.' }'. "\n";
	if ( $comment_button_bg_hover_color )
		$comment_buttonhover .= 'background-color:'.$comment_button_bg_hover_color.' !important;';
	if ( $comment_button_font_hover_color )
		$comment_buttonhover .= 'color:'.$comment_button_font_hover_color.' !important;';
	if ( $comment_buttonhover )
		$output .= '#commentform input#submit:hover,#commentform input[type="submit"]:hover { '.$comment_buttonhover.' }'. "\n";

// Subscribe Submit Button Colors

	$subscribe_button = '';
	$subscribe_buttonhover = '';
	$subscribe_button_bg_color = tb_option('subscribe_button_bg_color');
	$subscribe_button_font_color = tb_option('subscribe_button_font_color');
	$subscribe_button_bg_hover_color = tb_option('subscribe_button_bg_hover_color');
	$subscribe_button_font_hover_color = tb_option('subscribe_button_font_hover_color');

	if ( $subscribe_button_bg_color )
		$subscribe_button .= 'background-color:'.$subscribe_button_bg_color.' !important;';
	if ( $subscribe_button_font_color )
		$subscribe_button .= 'color:'.$subscribe_button_font_color.' !important;';
	if ( $subscribe_button )
		$output .= '.email-form input[type="submit"],.email-form input[type="button"],.email-form button { '.$subscribe_button.' }'. "\n";
	if ( $subscribe_button_bg_hover_color )
		$subscribe_buttonhover .= 'background-color:'.$subscribe_button_bg_hover_color.' !important;';
	if ( $subscribe_button_font_hover_color )
		$subscribe_buttonhover .= 'color:'.$subscribe_button_font_hover_color.' !important;';
	if ( $subscribe_buttonhover )
		$output .= '.email-form input[type="submit"]:hover,.email-form input[type="button"]:hover,.email-form button:hover { '.$subscribe_buttonhover.' }'. "\n";

// Footer Widgets Button Colors

	$footer_button = '';
	$footer_buttonhover = '';
	$footer_button_bg_color = tb_option('footer_button_bg_color');
	$footer_button_font_color = tb_option('footer_button_font_color');
	$footer_button_bg_hover_color = tb_option('footer_button_bg_hover_color');
	$footer_button_font_hover_color = tb_option('footer_button_font_hover_color');

	if ( $footer_button_bg_color )
		$footer_button .= 'background-color:'.$footer_button_bg_color.' !important;';
	if ( $footer_button_font_color )
		$footer_button .= 'color:'.$footer_button_font_color.' !important;';
	if ( $footer_button )
		$output .= '#footer-widgets button,#footer-widgets input[type="button"],#footer-widgets input[type="reset"],#footer-widgets input[type="submit"],#footer-widgets .email-form input[type="submit"],#footer-widgets .email-form input[type="button"],#footer-widgets .email-form button,#footer-widgets input.search-submit { '.$footer_button.' }'. "\n";
	if ( $footer_button_bg_hover_color )
		$footer_buttonhover .= 'background-color:'.$footer_button_bg_hover_color.' !important;';
	if ( $footer_button_font_hover_color )
		$footer_buttonhover .= 'color:'.$footer_button_font_hover_color.' !important;';
	if ( $footer_buttonhover )
		$output .= '#footer-widgets button:hover,#footer-widgets input[type="button"]:hover,#footer-widgets input[type="reset"]:hover,#footer-widgets input[type="submit"]:hover,#footer-widgets .email-form input[type="submit"]:hover,#footer-widgets .email-form input[type="button"]:hover,#footer-widgets .email-form button:hover,#footer-widgets input.search-submit:hover { '.$footer_buttonhover.' }'. "\n";

// Custom CSS

	$custom_css = tb_option('custom_css');

	if ($custom_css)
		$output .= $custom_css . "\n";

// Output styles

	if ( $output )
		$output = "\n\n<!-- Custom Styles from Theme Setting Page -->\n<style type=\"text/css\">\n" . $output . "</style>\n";
		echo $output;
}



/*---------------------------------------------------------------------------------------*/
// Font Embed Function for Google Fonts
// @since 1.0
/*---------------------------------------------------------------------------------------*/

// Here we populate the font face
$header_font = tb_option('header_font');
$header_weight = tb_option('header_weight');
$header_style = tb_option('header_style');
$header_subset = tb_option('header_subset');
$headings_font = tb_option('headings_font');
$headings_weight = tb_option('headings_weight');
$headings_style = tb_option('headings_style');
$headings_subset = tb_option('headings_subset');
$body_font = tb_option('body_font');
$body_weight = tb_option('body_weight');
$body_style = tb_option('body_style');
$body_subset = tb_option('body_subset');
$sidebar_font = tb_option('sidebar_font');
$sidebar_weight = tb_option('sidebar_weight');
$sidebar_style = tb_option('sidebar_style');
$sidebar_subset = tb_option('sidebar_subset');
$topnav_font = tb_option('topnav_font');
$topnav_weight = tb_option('topnav_weight');
$topnav_style = tb_option('topnav_style');
$topnav_subset = tb_option('topnav_subset');
$headernav_font = tb_option('headernav_font');
$headernav_weight = tb_option('headernav_weight');
$headernav_style = tb_option('headernav_style');
$headernav_subset = tb_option('headernav_subset');
$fixednav_font = tb_option('fixednav_font');
$fixednav_weight = tb_option('fixednav_weight');
$fixednav_style = tb_option('fixednav_style');
$fixednav_subset = tb_option('fixednav_subset');
$postmeta_font = tb_option('postmeta_font');
$postmeta_weight = tb_option('postmeta_weight');
$postmeta_style = tb_option('postmeta_style');
$postmeta_subset = tb_option('postmeta_subset');

// Add the font to the helper class
VP_Site_GoogleWebFont::instance()->add($header_font, $header_weight, $header_style, $header_subset);
VP_Site_GoogleWebFont::instance()->add($headings_font, $headings_weight, $headings_style, $headings_subset);
VP_Site_GoogleWebFont::instance()->add($body_font, $body_weight, $body_style, $body_subset);
VP_Site_GoogleWebFont::instance()->add($sidebar_font, $sidebar_weight, $sidebar_style, $sidebar_subset);
VP_Site_GoogleWebFont::instance()->add($topnav_font, $topnav_weight, $topnav_style, $topnav_subset);
VP_Site_GoogleWebFont::instance()->add($headernav_font, $headernav_weight, $headernav_style, $headernav_subset);
VP_Site_GoogleWebFont::instance()->add($fixednav_font, $fixednav_weight, $fixednav_style, $fixednav_subset);
VP_Site_GoogleWebFont::instance()->add($postmeta_font, $postmeta_weight, $postmeta_style, $postmeta_subset);

add_action('wp_enqueue_scripts', 'tb_embed_fonts');
function tb_embed_fonts() {
	if ( tb_option('use_google_fonts') ) {
		VP_Site_GoogleWebFont::instance()->register_and_enqueue();
	}
}



/*---------------------------------------------------------------------------------------*/
// Javascript for Backstretch Body Background Image
// @since 1.0
/*---------------------------------------------------------------------------------------*/

if ( !is_admin() ) { add_action('wp_footer', 'themebeagle_backstretch', 99); }
function themebeagle_backstretch() {

	$bgimage = tb_option('body_bg_image');
	$bgimage_url = get_template_directory_uri().'/images/'.$bgimage.'.jpg';
	$bgcustom_options = tb_option('custom_bg_on');
	$bgbackstretch = tb_option('backstretch_on');
	$bgbackstretch_pos_x = tb_option('backstretch_pos_x');
	$bgbackstretch_pos_y = tb_option('backstretch_pos_y');
	$bg_custom_backstretch_url = tb_option('custom_body_bg_image');

	if ( $bgimage != 'none' && $bgimage != '' && !$bgcustom_options && !is_page_template('page-landing.php') ) { ?>

		<!-- Backstretch JS -->
		<script type="text/javascript">
			jQuery.anystretch("<?php echo $bgimage_url; ?>",{positionX:"<?php echo $bgbackstretch_pos_x; ?>",positionY:"<?php echo $bgbackstretch_pos_y; ?>",speed:500});
		</script>

	<?php }

	if ( $bgcustom_options && $bgbackstretch && !is_page_template('page-landing.php') ) { ?>

		<!-- Backstretch JS -->
		<script type="text/javascript">
			jQuery.anystretch("<?php echo $bg_custom_backstretch_url; ?>",{positionX:"<?php echo $bgbackstretch_pos_x; ?>",positionY:"<?php echo $bgbackstretch_pos_y; ?>",speed: 500});
		</script>

	<?php }
}

/*-----------------------------------------------------------------------------------*/
// Add .nav-just class to body_class output
// @since 1.2
/*-----------------------------------------------------------------------------------*/

add_filter('body_class','themebeagle_nav_just_body_class');
function themebeagle_nav_just_body_class($classes) {

	$navjust = '';
	$navjust = tb_option('justify_secnav');

	if ( $navjust ) {
		$classes[] = 'nav-just';
	}

	return $classes;
}

?>