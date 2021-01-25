<?php

VP_Security::instance()->whitelist_function('tb_heading_preview');
function tb_heading_preview($face, $style, $weight, $transform, $subset) {
	$gwf   = new VP_Site_GoogleWebFont();
	$gwf->add($face, $style, $weight, $subset);
	$links = $gwf->get_font_links();
	$link  = reset($links);
	$dom   = <<<EOD
<link href='$link' rel='stylesheet' type='text/css'>
<p style="text-align: center; margin: 0; font-family: $face; font-style: $style; font-weight: $weight; text-transform: $transform; font-size:30px;">
	This is the Headings Font Preview
</p>
EOD;
	return $dom;
}

VP_Security::instance()->whitelist_function('tb_site_title_preview');
function tb_site_title_preview($face, $style, $weight, $size, $transform, $subset) {
	$gwf   = new VP_Site_GoogleWebFont();
	$gwf->add($face, $style, $weight, $subset);
	$links = $gwf->get_font_links();
	$link  = reset($links);
	$dom   = <<<EOD
<link href='$link' rel='stylesheet' type='text/css'>
<p style="text-align: center; margin: 0; font-family: $face; font-style: $style; font-weight: $weight; text-transform: $transform; font-size: {$size}px;">
	This is the Site Title Font Preview
</p>
EOD;
	return $dom;
}

VP_Security::instance()->whitelist_function('tb_body_preview');
function tb_body_preview($face, $style, $weight, $size, $transform, $line_height, $subset) {
	$gwf   = new VP_Site_GoogleWebFont();
	$gwf->add($face, $style, $weight, $subset);
	$links = $gwf->get_font_links();
	$link  = reset($links);
	$dom   = <<<EOD
<link href='$link' rel='stylesheet' type='text/css'>
<p style="text-align: center; margin: 0; font-family: $face; font-style: $style; font-weight: $weight; line-height: $line_height;text-transform: $transform; font-size: {$size}px;">
	<strong>This is the Body Font Preview</strong><br />Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi quis risus at nisl blandit feugiat. Ut vel orci quis sem dapibus iaculis. Aliquam ut nunc quis nisi tincidunt tincidunt. Pellentesque enim. Sed et leo nec augue mollis pharetra. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi quis risus at nisl blandit feugiat. Ut vel orci quis sem dapibus iaculis. Aliquam ut nunc quis nisi tincidunt tincidunt.
</p>
EOD;
	return $dom;
}

VP_Security::instance()->whitelist_function('tb_sidebar_preview');
function tb_sidebar_preview($face, $style, $weight, $size, $transform, $line_height, $subset) {
	$gwf   = new VP_Site_GoogleWebFont();
	$gwf->add($face, $style, $weight, $subset);
	$links = $gwf->get_font_links();
	$link  = reset($links);
	$dom   = <<<EOD
<link href='$link' rel='stylesheet' type='text/css'>
<p style="text-align: center; margin: 0; font-family: $face; font-style: $style; font-weight: $weight; line-height: $line_height;text-transform: $transform; font-size: {$size}px;">
	<strong>This is the Sidebar Font Preview</strong><br />Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi quis risus at nisl blandit feugiat. Ut vel orci quis sem dapibus iaculis. Aliquam ut nunc quis nisi tincidunt tincidunt. Pellentesque enim. Sed et leo nec augue mollis pharetra. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi quis risus at nisl blandit feugiat. Ut vel orci quis sem dapibus iaculis. Aliquam ut nunc quis nisi tincidunt tincidunt.
</p>
EOD;
	return $dom;
}

VP_Security::instance()->whitelist_function('tb_topnav_preview');
function tb_topnav_preview($face, $style, $weight, $size, $transform, $subset) {
	$gwf   = new VP_Site_GoogleWebFont();
	$gwf->add($face, $style, $weight, $subset);
	$links = $gwf->get_font_links();
	$link  = reset($links);
	$dom   = <<<EOD
<link href='$link' rel='stylesheet' type='text/css'>
<p style="text-align: center; margin: 0; font-family: $face; font-style: $style; font-weight: $weight; text-transform: $transform; font-size: {$size}px;">
	<strong>This is the Top Navigation Font Preview</strong><br /><br /><span style="padding:0 10px;">Home</span><span style="padding:0 10px;">About</span><span style="padding:0 10px;">Contact</span><span style="padding:0 10px;">Services</span><span style="padding:0 10px;">Blog</span><span style="padding:0 10px;">Portfolio</span>
</p>
EOD;
	return $dom;
}

VP_Security::instance()->whitelist_function('tb_headernav_preview');
function tb_headernav_preview($face, $style, $weight, $size, $transform, $subset) {
	$gwf   = new VP_Site_GoogleWebFont();
	$gwf->add($face, $style, $weight, $subset);
	$links = $gwf->get_font_links();
	$link  = reset($links);
	$dom   = <<<EOD
<link href='$link' rel='stylesheet' type='text/css'>
<p style="text-align: center; margin: 0; font-family: $face; font-style: $style; font-weight: $weight; text-transform: $transform; font-size: {$size}px;">
	<strong>This is the Header Navigation Font Preview</strong><br /><br /><span style="padding:0 10px;">Home</span><span style="padding:0 10px;">About</span><span style="padding:0 10px;">Contact</span><span style="padding:0 10px;">Services</span><span style="padding:0 10px;">Blog</span><span style="padding:0 10px;">Portfolio</span>
</p>
EOD;
	return $dom;
}

VP_Security::instance()->whitelist_function('tb_fixednav_preview');
function tb_fixednav_preview($face, $style, $weight, $size, $transform, $subset) {
	$gwf   = new VP_Site_GoogleWebFont();
	$gwf->add($face, $style, $weight, $subset);
	$links = $gwf->get_font_links();
	$link  = reset($links);
	$dom   = <<<EOD
<link href='$link' rel='stylesheet' type='text/css'>
<p style="text-align: center; margin: 0; font-family: $face; font-style: $style; font-weight: $weight; text-transform: $transform; font-size: {$size}px;">
	<strong>This is the Fixed Navigation Font Preview</strong><br /><br /><span style="padding:0 10px;">Home</span><span style="padding:0 10px;">About</span><span style="padding:0 10px;">Contact</span><span style="padding:0 10px;">Services</span><span style="padding:0 10px;">Blog</span><span style="padding:0 10px;">Portfolio</span>
</p>
EOD;
	return $dom;
}

VP_Security::instance()->whitelist_function('tb_postmeta_preview');
function tb_postmeta_preview($face, $style, $weight, $size, $transform, $subset) {
	$gwf   = new VP_Site_GoogleWebFont();
	$gwf->add($face, $style, $weight, $subset);
	$links = $gwf->get_font_links();
	$link  = reset($links);
	$dom   = <<<EOD
<link href='$link' rel='stylesheet' type='text/css'>
<p style="text-align: center; margin: 0; font-family: $face; font-style: $style; font-weight: $weight; text-transform: $transform; font-size: {$size}px;">
	<strong>This is the Post Meta Font Preview</strong><br /><br />By Michael&nbsp;&nbsp; | &nbsp;&nbsp;Feb 19, 2014&nbsp;&nbsp; | &nbsp;&nbsp;11 Comments
</p>
EOD;
	return $dom;
}

VP_Security::instance()->whitelist_function('tb_thumbs_on');
function tb_thumbs_on($value) {
	if ( $value )
		return true;
	return false;
}

VP_Security::instance()->whitelist_function('tb_is_posts_by_cat');
function tb_is_posts_by_cat($value) {
	if ( $value === 'posts_by_cat' )
		return true;
	return false;
}

VP_Security::instance()->whitelist_function('tb_is_featured_narrow');
function tb_is_featured_narrow($value) {
	if ( $value === 'narrow-slider' )
		return true;
	return false;
}

VP_Security::instance()->whitelist_function('tb_is_featured_narrow_2');
function tb_is_featured_narrow_2($value) {
	if ( $value === 'narrow-slider' || $value === 'narrow-slider-2')
		return true;
	return false;
}

VP_Security::instance()->whitelist_function('tb_is_featured_pages');
function tb_is_featured_pages($value) {
	if ( $value )
		return true;
	return false;
}

VP_Security::instance()->whitelist_function('tb_is_featured_slider');
function tb_is_featured_slider($value) {
	if ( $value )
		return true;
	return false;
}

VP_Security::instance()->whitelist_function('tb_is_manage_ads');
function tb_is_manage_ads($value) {
	if ( $value )
		return true;
	return false;
}

VP_Security::instance()->whitelist_function('tb_is_feedburner');
function tb_is_feedburner($value) {
	if ( $value == 'feedburner' )
		return true;
	return false;
}

VP_Security::instance()->whitelist_function('tb_is_alt_email');
function tb_is_alt_email($value) {
	if ( $value == 'alt_email_form' )
		return true;
	return false;
}

VP_Security::instance()->whitelist_function('tb_is_nav_below');
function tb_is_nav_below($value) {
	if ( $value == 'below' )
		return true;
	return false;
}

VP_Security::instance()->whitelist_function('tb_get_slides');
function tb_get_slides() {
	$wp_slides = get_posts(array( 'post_type' => 'slides', 'posts_per_page' => -1 ));
	$result = array();
	foreach ($wp_slides as $slide) {
		$result[] = array( 'value' => $slide->ID, 'label' => $slide->post_title );
	}
	return $result;
}

VP_Security::instance()->whitelist_function('tb_is_manage_recipe');
function tb_is_manage_recipe($value) {
	if ( $value )
		return true;
	return false;
}

VP_Security::instance()->whitelist_function('tb_is_select_recipe_image');
function tb_is_select_recipe_image($value) {
	if ( $value  == 'select' )
		return true;
	return false;
}