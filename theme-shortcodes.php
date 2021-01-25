<?php
/**
 * Shortcodes bundled for use with theme.
 * 
 * Since 1.0.
 *
 */


/* Register shortcodes. */
add_action( 'init', 'themebeagle_add_shortcodes' );

/**
 * Creates new shortcodes for use in any shortcode-ready area.  This function uses the add_shortcode() 
 * function to register new shortcodes with WordPress.
 *
 * @since 1.0
 * @access public
 * @uses add_shortcode() to create new shortcodes.
 * @link http://codex.wordpress.org/Shortcode_API
 * @return void
 */

function themebeagle_add_shortcodes() {

	/* Add theme-specific shortcodes. */
	add_shortcode( 'accordion',		'tb_accordion_wrapper' );
	add_shortcode( 'toggle',		'tb_toggle_item' );
	add_shortcode( 'alert',			'tb_alert_box' );
	add_shortcode( 'tabgroup',		'tb_tabgroup' );
	add_shortcode( 'tab',			'tb_tab' );
	add_shortcode( 'columns',		'tb_columns' );
	add_shortcode( 'one-half',		'tb_one_half' );
	add_shortcode( 'one-third',		'tb_one_third' );
	add_shortcode( 'two-third',		'tb_two_third' );
	add_shortcode( 'one-fourth',		'tb_one_fourth' );
	add_shortcode( 'three-fourth',		'tb_three_fourth' );
	add_shortcode( 'tooltip',		'tb_tooltip' );
	add_shortcode( 'youtube',		'tb_youtube' );
	add_shortcode( 'vimeo',			'tb_vimeo' );
	add_shortcode( 'slideshow',		'tb_slideshow' );
	add_shortcode( 'slideshow_item',	'tb_slideshow_item' );
	add_shortcode( 'button',		'tb_button' );
	add_shortcode( 'tedtalk',		'tb_tedtalk' );
	add_shortcode( 'widecontent',		'tb_wide_content' );
	add_shortcode( 'iconbox',		'tb_icon_box' );
	add_shortcode( 'divider',		'tb_divider' );
	add_shortcode( 'portfolio',		'tb_portfolio' );
	add_shortcode( 'socialicons',		'tb_socialicons' );
	add_shortcode( 'posts',			'tb_posts' );
	add_shortcode( 'posts_by_cat',		'tb_posts_by_cat' );
}

/*----------------------------------------------------------------*/
// Shortcode Formatter
/*----------------------------------------------------------------*/

function tb_shortcodes_formatter($content) {
	$block = join("|",array("tedtalk", "youtube", "vimeo", "columns", "one-half", "one-third", "two-third", "one-fourth", "three-fourth", "soundcloud", "button", "dropcap", "highlight", "checklist", "tabgroup", "tab", "accordion", "alert", "toggle", "one_half", "one_third", "one_fourth", "two_third", "three_fourth", "tagline_box", "pricing_table", "pricing_column", "pricing_price", "pricing_row", "pricing_footer", "icon_boxes", "icon_box", "slider", "slide", "testimonials", "testimonial", "progress", "person", "recent_posts", "recent_works", "alert", "fontawesome", "social_links", "clients", "client", "title", "separator", "tooltip", "fullwidth", "map", "counters_circle", "counter_circle", "counters_box", "counter_box", "flexslider", "blog", "imageframe", "images", "image", "sharing", "featured_products_slider", "products_slider", "slideshow", "slideshow_item", "widecontent", "iconbox", "divider", "portfolio", "socialicons", "posts", "posts_by_cat"));

	// opening tag
	$rep = preg_replace("/(<p>)?\[($block)(\s[^\]]+)?\](<\/p>|<br \/>)?/","[$2$3]",$content);

	// closing tag
	$rep = preg_replace("/(<p>)?\[\/($block)](<\/p>|<br \/>)/","[/$2]",$rep);

	return $rep;
}

add_filter('the_content', 'tb_shortcodes_formatter');
add_filter('widget_text', 'tb_shortcodes_formatter');

/*----------------------------------------------------------------*/
// Shortcode Format Cleaner
// Since 2.3
/*----------------------------------------------------------------*/

if( !function_exists('tb_fix_shortcodes') ) {
	function tb_fix_shortcodes($content){   
		$array = array (
			'<p>[' => '[', 
			']</p>' => ']',
			'<br />[' => '[', 
			']<br />' => ']'
		);
		$content = strtr($content, $array);
		return $content;
	}
	add_filter('the_content', 'tb_fix_shortcodes');
}


/*----------------------------------------------------------------*/
// Button shortcode
// @since 1.0
/*----------------------------------------------------------------*/

function tb_button($atts, $content = null) {
	$atts = shortcode_atts(
		array(
			'size' => '',
			'color' => '',
			'link' => '',
			'target' => '_self',
			'custom_color' => '',
			'font_color' => '#ffffff',
		), 
		$atts
	);

	$fontcolor = '';
	if ( $atts['font_color'] ) {
		$fontcolor = 'color:' . $atts['font_color'] . ';';
	}

	$customcolor = '';
	if ( $atts['custom_color'] ) {
		$customcolor = 'background:' . $atts['custom_color'] . ';';
	}



	return '<a style="' . $fontcolor . ' ' . $customcolor . '" class="button sc ' . $atts['size'] . ' ' . $atts['color'] . '" href="' . $atts['link'] . '" target="' . $atts['target'] . '">' .do_shortcode($content). '</a>';
}

/*----------------------------------------------------------------*/
// TedTalk shortcode
// @since 1.0
/*----------------------------------------------------------------*/

function tb_tedtalk($atts) {
	$atts = shortcode_atts(
		array(
			'id' => '',
			'width' => 1280,
			'height' => 720
		), 
		$atts
	);

	return '<div class="video-shortcode" style="max-width:'.$atts['width'].'px;max-height:'.$atts['height'].'px;"><iframe title="TedTalk video player" width="' . $atts['width'] . '" height="' . $atts['height'] . '" src="http://embed.ted.com/talks/' . $atts['id'] . '.html?wmode=transparent" allowFullScreen></iframe></div>';

}


/*----------------------------------------------------------------*/
// Youtube shortcode
// @since 1.0
/*----------------------------------------------------------------*/

function tb_youtube($atts) {
	$atts = shortcode_atts(
		array(
			'id' => '',
			'width' => 1280,
			'height' => 720
		), 
		$atts
	);

	return '<div class="video-shortcode" style="max-width:'.$atts['width'].'px;max-height:'.$atts['height'].'px;"><iframe title="YouTube video player" width="' . $atts['width'] . '" height="' . $atts['height'] . '" src="http://www.youtube.com/embed/' . $atts['id'] . '?rel=0&amp;wmode=transparent" allowFullScreen></iframe></div>';

}

/*----------------------------------------------------------------*/
// Vimeo shortcode
// @since 1.0
/*----------------------------------------------------------------*/

function tb_vimeo($atts) {
	$atts = shortcode_atts(
		array(
			'id' => '',
			'width' => 1280,
			'height' => 720
		),
		 $atts
	);
		
	return '<div class="video-shortcode" style="max-width:'.$atts['width'].'px;max-height:'.$atts['height'].'px;"><iframe src="http://player.vimeo.com/video/' . $atts['id'] . '?title=0&amp;byline=0&amp;portrait=0" width="' . $atts['width'] . '" height="' . $atts['height'] . '" allowFullScreen></iframe></div>';

}

/*----------------------------------------------------------------*/
// Accordion Wrapper
// @since 1.0
/*----------------------------------------------------------------*/

function tb_accordion_wrapper( $atts, $content = null  ) {
	extract( shortcode_atts( 
		array(
			'group_name' => ''	
		), 
		$atts 
	) );
	return '<div class="accordion accordion-group'. esc_attr( $group_name ) .'">' . do_shortcode($content) . '</div>' . "\n";
}

/*----------------------------------------------------------------*/
// Toggle Single Item
// @since 1.0
/*----------------------------------------------------------------*/

function tb_toggle_item( $atts, $content = null  ) {
	$panelid = substr(md5(rand(0, 1000000)), 0, 3);
	extract( shortcode_atts( 
		array(
			'title' => '',
			'open' => '',
			'group_name' => ''		
		), 
		$atts 
	) );
	$active = '';
	if ($open == 'yes') {
		$active = ' active';
		$open = ' in';
	}
	return '<div class="toggle-panel panel">
		<div class="toggle-heading">
			<div class="toggle-toggle'. $active .'" data-target="#collapse-'. $panelid .'" data-toggle="collapse" data-parent=".accordion-group'. esc_attr( $group_name ) .'">
				<span class="arrow"></span>
				' . esc_attr( $title ) . '
			</div>
		</div>
		<div id="collapse-'. $panelid .'" class="collapse'. $open .'"><div class="toggle-content clearfix">'. do_shortcode($content) .'</div></div>
	</div>' . "\n";
}

/*----------------------------------------------------------------*/
// Alert Box
// @since 1.0
/*----------------------------------------------------------------*/

function tb_alert_box( $atts, $content = null  ) {
	extract( shortcode_atts( 
		array(
			'type' => '',
			'dismiss' => ''	
		), 
		$atts 
	));

	$dismiss_link = '';
	if ( $dismiss != 'no' ) {
		$dismiss = 'alert-dismissable';
		$dismiss_link = '<a class="close" data-dismiss="alert" href="#" aria-hidden="true">x</a>';
	}

	if ( $type == "success" ) { $icon = '<i class="fa fa-thumbs-up fa-2x"></i>'; }
	elseif ( $type == "info" ) { $icon = '<i class="fa fa-question-circle fa-2x"></i>'; }
	elseif ( $type == "warning" ) { $icon = '<i class="fa fa-warning fa-2x"></i>'; }
	elseif ( $type == "danger" ) { $icon = '<i class="fa fa-exclamation-circle fa-2x"></i>'; }
	else { $icon = '<i class="fa fa-paperclip fa-2x"></i>'; }

	return '<div class="'.$dismiss.' alert alert-'. $type .' fade in">' . $icon . $dismiss_link . '<div class="alert-message">' . $content .'</div></div>' . "\n";
}

/*----------------------------------------------------------------*/
// Tabs Wrapper
// @since 1.0
/*----------------------------------------------------------------*/

function tb_tabgroup( $atts, $content = null ) {
		
	// Display Tabs
	$defaults = array(
		'layout' => ''
	);
	extract( shortcode_atts( $defaults, $atts ) );
	preg_match_all( '/tab title="([^\"]+)"/i', $content, $matches, PREG_OFFSET_CAPTURE );
	$tab_titles = array();
	if ( isset( $matches[1] ) ) { 
		$tab_titles = $matches[1]; 
	}

	$output = '';				
	if ( count( $tab_titles ) ) {
		if ( $layout == 'tabs-left' ) {
			$output .= '<div id="mytabs-' . rand(1, 100) . '" class="mytabs tabs-left clearfix">' . "\n";
		} else {
			$output .= '<div  id="mytabs-' . rand(1, 100) . '" class="mytabs tabs-top clearfix">' . "\n";
		}
		$output .= '<ul class="nav nav-tabs">';
		foreach ($tab_titles as $tab) {
			$output .= '<li><a href="#' . sanitize_title( $tab[0] ) . '" data-toggle="tab">' . $tab[0] . '</a></li>' . "\n";
		}
		$output .= '</ul>' . "\n";
		$output .= '<div class="tab-content">' . "\n";
		$output .= do_shortcode( $content );
		$output .= '</div>' . "\n";
		$output .= '</div>' . "\n";
	} else {
		$output .= do_shortcode( $content );
	}

	return $output;

}

/*----------------------------------------------------------------*/
// Tab Single Item
// @since 1.0
/*----------------------------------------------------------------*/
function tb_tab( $atts, $content = null ) {

	$defaults = array(
		'title' => ''
	);

	extract( shortcode_atts( $defaults, $atts ) );

	return '<div id="' . sanitize_title( $title ) . '" class="tab-pane fade">' . do_shortcode( $content ) . '</div>' . "\n";

}



/*----------------------------------------------------------------*/
// Columns
// @since 1.0
/*----------------------------------------------------------------*/

function tb_columns($atts, $content = null) {
	$atts = shortcode_atts(
		array(), 
		$atts
	);
			
	return '<div class="columns">' .do_shortcode($content). '</div>' . "\n";
		
}

/*----------------------------------------------------------------*/
// Column one_half
// @since 1.0
/*----------------------------------------------------------------*/

function tb_one_half($atts, $content = null) {

	$atts = shortcode_atts(
		array(), 
		$atts
	);
			
	return '<div class="col-sm-6">' .do_shortcode($content). '</div>' . "\n";

}
	
/*----------------------------------------------------------------*/
// Column one_third
// @since 1.0
/*----------------------------------------------------------------*/

function tb_one_third($atts, $content = null) {

	$atts = shortcode_atts(
		array(), 
		$atts
	);
			
	return '<div class="col-sm-4">' .do_shortcode($content). '</div>' . "\n";

}
	
/*----------------------------------------------------------------*/
// Column two_third
// @since 1.0
/*----------------------------------------------------------------*/

function tb_two_third($atts, $content = null) {
	$atts = shortcode_atts(
		array(), 
		$atts
	);
			
	return '<div class="col-sm-8">' .do_shortcode($content). '</div>' . "\n";
		
}
	
/*----------------------------------------------------------------*/
// Column one_fourth
// @since 1.0
/*----------------------------------------------------------------*/
	
function tb_one_fourth($atts, $content = null) {

	$atts = shortcode_atts(
		array(), 
		$atts
	);
			
	return '<div class="col-sm-3">' .do_shortcode($content). '</div>' . "\n";

}
	
/*----------------------------------------------------------------*/
// Column three_fourth
// @since 1.0
/*----------------------------------------------------------------*/

function tb_three_fourth($atts, $content = null) {

	$atts = shortcode_atts(
		array(), 
		$atts
	);
			
	return '<div class="col-sm-9">' .do_shortcode($content). '</div>' . "\n";

}

/*----------------------------------------------------------------*/
// Tooltip
// @since 1.0
/*----------------------------------------------------------------*/
function tb_tooltip($atts, $content = null) {
	extract( shortcode_atts(
		array(
			'title' => 'none',
			'align' => 'top'	
		), 
		$atts 
	));

	return '<a href="#" class="tb-tooltip" data-toggle="tooltip" data-placement="' . $align . '" title="' . $title . '">' . $content . '</a>';
}

/*----------------------------------------------------------------*/
// Post Slide Wrapper
// @since 1.0
/*----------------------------------------------------------------*/

function tb_slideshow( $atts, $content = null  ) {
	extract( shortcode_atts( 
		array(
			'style' => ''
		), 
		$atts 
	) );

	$alt = '';
	if ($style == 'alt')
		$alt = ' alt';
	if ($style == 'alt2')
		$alt = ' alt2';

	$output = '';
	$output .= '<div class="mainslider postslider' . $alt . '">' . "\n";
	$output .= '<div class="flexslider">' . "\n";
	$output .= '<ul class="slides">' . "\n";
	$output .= do_shortcode( $content );
	$output .= '</ul>' . "\n";
	$output .= '</div>' . "\n";
	$output .= '</div>' . "\n";

	return $output;
}

/*----------------------------------------------------------------*/
// Post Slide Single Item
// @since 1.0
/*----------------------------------------------------------------*/

function tb_slideshow_item( $atts, $content = null  ) {
	extract( shortcode_atts( 
		array(), 
		$atts 
	));

	$output = '';
	$output .= '<li>' . "\n";
	$output .= '<div class="slide-container">' . "\n";
	$output .= do_shortcode( $content );
	$output .= '</div>' . "\n";
	$output .= '</li>' . "\n";

	return $output;
}

/*----------------------------------------------------------------*/
// Wide Content Box
// @since 1.2
/*----------------------------------------------------------------*/

function tb_wide_content( $atts, $content = null  ) {
	$atts = shortcode_atts(
		array(
			'background_color'	=> 'transparent',
			'font_color'		=> '#222',
			'font_size'		=> '16px',
			'font_weight'		=> '400',
			'centered'		=> 'no',
			'background_image'	=> '',
			'background_position'	=> '50% 50%',
			'background_repeat'	=> 'no-repeat',
			'background_size'	=> '',
			'parallax'		=> '',
			'padding_top'		=> '50px',
			'padding_bottom'	=> '50px',
			'image_overlay'		=> '0.8',
			'style'			=> ''
		), 
		$atts
	);

	$parallax = '';
	if ($atts['parallax'] == 'no')
		$parallax = ' no-parallax ';

	$background_size = '';
	if ($atts['background_size']) {
		$bsize = $atts['background_size'];
		$background_size = '-webkit-background-size:'.$bsize.';-moz-background-size:'.$bsize.';-o-background-size:'.$bsize.';-ms-background-size:'.$bsize.';background-size:'.$bsize.';';
	}

	$align = 'left';
	if ( $atts['centered'] == 'yes' ||  $atts['centered'] == 'YES' ||  $atts['centered'] == 'Yes')
		$align = 'center';

	$style = '';
	if ( $atts['style'] == 'full' )
		$style = ' full ';

	$bg_img = get_template_directory_uri() . '/images/blank.gif';
	if ( $atts['background_image'] )
		$bg_img = $atts['background_image'];
		
	return '<div class="wide-content-box' . $style . $parallax . '" style="font-weight:' . $atts['font_weight'] . ';font-size:' . $atts['font_size'] . ';color:' . $atts['font_color'] . ' !important;background-color:' . $atts['background_color'] . ';text-align:' . $align . ';background-image:url(' . $bg_img . ');background-position:' . $atts['background_position'] . ';background-repeat:' . $atts['background_repeat'] . ';' . $background_size . '">' . "\n" . '<div class="wrap" style="padding-top:' . $atts['padding_top'] . ';padding-bottom:' . $atts['padding_bottom'] . ';">' . do_shortcode($content) . '</div>' . "\n" . '</div>' . "\n";
}


/*----------------------------------------------------------------*/
// Icon Box
// @since 1.2
/*----------------------------------------------------------------*/

function tb_icon_box( $atts, $content = null  ) {
	$atts = shortcode_atts(
		array(
			'layout'		=> '',
			'title'			=> '',
			'icon'			=> '',
			'icon_color'		=> '',
			'icon_size'		=> '',
			'icon_background_color'	=> '#ffffff',
			'icon_border_color'	=> '#eeeeee',
			'background_color'	=> '',
			'font_color'		=> '',
			'font_size'		=> '',
			'font_weight'		=> '',
			'centered'		=> 'yes',
			'padding'		=> '',
			'border_width'		=> '',
			'border_color'		=> 'transparent',
			'link'			=> '',
			'link_text'		=> __('Read More &raquo;', 'themebeagle'),
		), 
		$atts
	);

	$align = 'left';
	if ( $atts['centered'] == 'yes' ||  $atts['centered'] == 'YES' ||  $atts['centered'] == 'Yes' )
		$align = 'center';
	if ( $atts['layout'] == 'icon-left' || $atts['layout'] == 'icon-title' )
		$align = 'left';

	$layout = 'icon-top';
	if ( $atts['layout'] == 'icon-title' )
		$layout = 'icon-title';
	if ( $atts['layout'] == 'icon-left' )
		$layout = 'icon-left';
	if ( $atts['layout'] == 'icon-boxed' )
		$layout = 'icon-boxed';	

	$str = '';


	$str .= '<div class="icon-box clearfix '.$layout.'" ';
	$str .= 'style="';
	if ( $atts['border_color'] )
		$str .= 'border-color:'.$atts['border_color'].';';
	if ( $atts['border_width'] )
		$str .= 'border-width:'.$atts['border_width'].';';
	if ( $atts['font_weight'] )
		$str .= 'font-weight:'.$atts['font_weight'].';';
	if ( $atts['font_size'] )
		$str .= 'font-size:'.$atts['font_size'].';';
	if ( $atts['font_color'] )
		$str .= 'color:'.$atts['font_color'].';';
	if ( $atts['background_color'] )
		$str .= 'background-color:'.$atts['background_color'].';';
	if ( $atts['padding'] )
		$str .= 'padding:'.$atts['padding'].';';
	$str .= 'text-align:'.$align.';';
	$str .= '">' . "\n";


	$iconstyles = '';
	if ( $atts['layout'] == 'icon-boxed' )
		$iconstyles = 'style="background:'.$atts['icon_background_color'].';border-color:'.$atts['icon_border_color'].';"';
	if ( $atts['icon'] ) {
		$str .= '<div class="icon-box-icon" ' . $iconstyles . '><i class="fa '.$atts['icon'].'" style="';
		if ( $atts['icon_size'] )
			$str .= 'font-size:'.$atts['icon_size'].';';
		if ( $atts['icon_color'] )
			$str .= 'color:'.$atts['icon_color'].';'; 
		$str .= '"></i></div>' . "\n";
	}

	if ( $atts['title'] )
		$str .= '<h2>'.$atts['title'].'</h2>' . "\n";

	$str .= '<div class="icon-box-content">'."\n";

	$str .= do_shortcode($content)."\n";

	if ( $atts['link'] && $atts['link_text'] ) {
		$str .= '<p class="morelink">';
		$str .= '<a href="'.$atts['link'].'">';
		$str .= $atts['link_text'];
		$str .= '</a></p>' . "\n";
	}

	$str .= '</div>'."\n";

	$str .= '</div>';

	return $str;
}

/*----------------------------------------------------------------*/
// Divider shortcode
// @since 1.2
/*----------------------------------------------------------------*/

function tb_divider($atts, $content = null) {
	$atts = shortcode_atts(
		array(
			'style'		=> '',
			'margin_top' 	=> '30px',
			'margin_bottom'	=> '30px',
			'height'	=> '',
		), 
		$atts
	);

	$divtype = 'empty';
	if ( $atts['style'] == "dotted" )
		$divtype = 'div-dotted';
	if ( $atts['style'] == "shadow" )
		$divtype = 'div-shadow';
	if ( $atts['style'] == "single" )
		$divtype = 'div-single';
	if ( $atts['style'] == "double" )
		$divtype = 'div-double';

	$divheight = '';
	if ( $atts['height'] )
		$divheight = 'border-bottom-width:'.$atts['height'].';';

	return '<div class="divider-sc '.$divtype.'" style="'.$divheight.'margin-top:'.$atts['margin_top'].';margin-bottom:'.$atts['margin_bottom'].';"></div>'."\n";
}


/*----------------------------------------------------------------*/
// Portfolio shortcode
// @since 1.2
/*----------------------------------------------------------------*/

function tb_portfolio($atts, $content = null) {
	$atts = shortcode_atts(
		array(
			'cat_ids'	=> '',
			'columns' 	=> '4',
			'post_count' 	=> '8',
		), 
		$atts
	);

	global $catid;
	$catid = '';
	if ( $atts['cat_ids'] ) 
		$catid = explode(",",$atts['cat_ids']);

	global $postclass;
	if ( $atts['columns'] == '1' ) {
		$postclass = 'col-sm-12';
	} elseif ( $atts['columns'] == '2' ) {
		$postclass = 'col-sm-6';
	} elseif ( $atts['columns'] == '3' ) {
		$postclass = 'col-sm-4';
	} else {
		$postclass = 'col-sm-3';
	}

	global $postcount;
	$postcount = $atts['post_count'];

	global $hidenav;
	global $hidefilter;
	$hidenav = 'true';
	$hidefilter = 'true';

	ob_start();  
	get_template_part('index-portfolio'); 
	$ret = ob_get_contents();  
	ob_end_clean();  
	return $ret; 
}

/*----------------------------------------------------------------*/
// Posts shortcode
// @since 1.2
/*----------------------------------------------------------------*/

function tb_posts($atts, $content = null) {
	$atts = shortcode_atts(
		array(
			'cat_ids'	=> '',
			'columns' 	=> '3',
			'post_count' 	=> '6',
			'layout'	=> '',
		), 
		$atts
	);

	global $catid;
	$catid = '';
	if ( $atts['cat_ids'] ) 
		$catid = explode(",",$atts['cat_ids']);

	global $postclass;
	if ( $atts['columns'] == '1' ) {
		$postclass = 'col-sm-12';
	} elseif ( $atts['columns'] == '3' ) {
		$postclass = 'col-sm-4';
	} elseif ( $atts['columns'] == '4' ) {
		$postclass = 'col-sm-3';
	} else {
		$postclass = 'col-sm-6';
	}

	global $postcount;
	$postcount = $atts['post_count'];

	global $hidenav;
	$hidenav = 'true';

	global $hidefilter;
	$hidefilter = 'true';

	ob_start();
	if ( $atts['layout'] == 'masonry' ) {
		get_template_part('index-masonry');
	} else { 
		get_template_part('index-blog'); 
	}
	$ret = ob_get_contents();  
	ob_end_clean();  
	return $ret; 
}

/*----------------------------------------------------------------*/
// Posts shortcode
// @since 2.4
/*----------------------------------------------------------------*/

function tb_posts_by_cat($atts, $content = null) {
	$atts = shortcode_atts(
		array(
			'cat_ids'	=> '',
			'post_count' 	=> '4',
			'layout'	=> ''
		), 
		$atts
	);

	global $cat_group_ids;
	$cat_group_ids = '';
	if ( $atts['cat_ids'] ) 
		$cat_group_ids = explode(",",$atts['cat_ids']);

	global $page_template;
	$page_template = 'blog-by-cat';
	if ( $atts['layout'] == 'stacked' )
		$page_template = 'blog-by-cat-stacked';

	global $cat_group_postcount;
	$cat_group_postcount = $atts['post_count'];

	ob_start();
	get_template_part('index2');
	$ret = ob_get_contents();  
	ob_end_clean();  
	return $ret; 
}

/*----------------------------------------------------------------*/
// Social Media Icons
// @since 1.2
/*----------------------------------------------------------------*/

function tb_socialicons($atts, $content = null) {
	$atts = shortcode_atts(
		array(
			'style'	=> 'clear',
			'shape' => '',
		), 
		$atts
	);

	$style = $atts['style'];
	$shape = $atts['shape'];

	ob_start();
	echo '<div class="socialicons '.$style.' '.$shape.'">';  
	get_template_part('icons-site'); 
	echo '</div>';
	$ret = ob_get_contents();  
	ob_end_clean();  
	return $ret; 
}

?>