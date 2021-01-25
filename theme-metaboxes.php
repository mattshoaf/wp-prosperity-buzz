<?php

// Begin Main Theme Metaboxes Array

return array(

/*-----------------------------------------------------------------------------------*/
// Page Layout
/*-----------------------------------------------------------------------------------*/
	array(
		'type' => 'radioimage',
		'name' => 'page_layout',
		'label' => __('Page Layout', 'themebeagle'),
		'description' => __('Select your preferred layout for this Post.', 'themebeagle'),
		'items' => array(
			array(
				'value' => 'default',
				'label' => __('Default to Theme Settings', 'themebeagle'),
				'img' => TB_ADMIN_URI . '/img/default-settings.jpg',
			),
			array(
				'value' => 'c-sw',
				'label' => __('Content | Sidebar-Wide', 'themebeagle'),
				'img' => TB_ADMIN_URI . '/img/c-sw.jpg',
			),
			array(
				'value' => 'sw-c',
				'label' => __('Sidebar-Wide | Content', 'themebeagle'),
				'img' => TB_ADMIN_URI . '/img/sw-c.jpg',
			),
			array(
				'value' => 'c-sn',
				'label' => __('Content | Sidebar-Narrow', 'themebeagle'),
				'img' => TB_ADMIN_URI . '/img/c-sn.jpg',
			),
			array(
				'value' => 'sn-c',
				'label' => __('Sidebar-Narrow | Content', 'themebeagle'),
				'img' => TB_ADMIN_URI . '/img/sn-c.jpg',
			),
			array(
				'value' => 'c-sn-sw',
				'label' => __('Content | Sidebar-Narrow | Sidebar-Wide', 'themebeagle'),
				'img' => TB_ADMIN_URI . '/img/c-sn-sw.jpg',
			),
			array(
				'value' => 'sn-c-sw',
				'label' => __('Sidebar-Narrow | Content | Sidebar-Wide', 'themebeagle'),
				'img' => TB_ADMIN_URI . '/img/sn-c-sw.jpg',
			),
			array(
				'value' => 'sw-c-sn',
				'label' => __('Sidebar-Wide | Content | Sidebar-Narrow', 'themebeagle'),
				'img' => TB_ADMIN_URI . '/img/sw-c-sn.jpg',
			),
			array(
				'value' => 'sw-sn-c',
				'label' => __('Sidebar-Wide | Sidebar-Narrow | Content', 'themebeagle'),
				'img' => TB_ADMIN_URI . '/img/sw-sn-c.jpg',
			),
			array(
				'value' => 'fw',
				'label' => __('Content Only', 'themebeagle'),
				'img' => TB_ADMIN_URI . '/img/fw.jpg',
			)
		),
		'default' => 'default',
	),

/*-----------------------------------------------------------------------------------*/
// Hide Stuff
/*-----------------------------------------------------------------------------------*/

	array(
		'type' => 'checkbox',
		'name' => 'hide_stuff',
		'label' => __('General Post Settings', 'themebeagle'),
		'description' => __('Make your selections as needed for this Post.', 'themebeagle'),
		'items' => array(
			array(
				'value' => 'hide_title',
				'label' => __('Hide Post Title', 'themebeagle'),
			),
			array(
				'value' => 'hide_thumb',
				'label' => __('Hide Thumbnail/Featured Image', 'themebeagle'),
			),
			array(
				'value' => 'hide_single_thumb',
				'label' => __('Hide Single Thumbnail/Featured Image', 'themebeagle'),
			),
			array(
				'value' => 'hide_bio',
				'label' => __('Hide Author Bio', 'themebeagle'),
			),
			array(
				'value' => 'hide_share',
				'label' => __('Hide Post Sharing', 'themebeagle'),
			),
			array(
				'value' => 'hide_related',
				'label' => __('Hide Related Posts', 'themebeagle'),
			),
			array(
				'value' => 'hide_footer_widgets',
				'label' => __('Hide Footer Widgets', 'themebeagle'),
			),
		),
	),

/*-----------------------------------------------------------------------------------*/
// Hide Header
/*-----------------------------------------------------------------------------------*/

	array(
		'type' => 'toggle',
		'name' => 'hide_head',
		'label' => __('Hide Entire Header Area', 'themebeagle'),
		'description' => __('Check the box to hide the entire header and navigation bars on this Post.', 'themebeagle'),
		'default' => '',
	),

	array(
		'type' => 'checkbox',
		'name' => 'hide_head_stuff',
		'label' => __('Hide Parts of Header', 'themebeagle'),
		'description' => __('Make your selections as needed for this Post.', 'themebeagle'),
		'items' => array(
			array(
				'value' => 'hide_topnav',
				'label' => __('Hide Top Navigation', 'themebeagle'),
			),
			array(
				'value' => 'hide_site_header',
				'label' => __('Hide Header', 'themebeagle'),
			),
			array(
				'value' => 'hide_secnav',
				'label' => __('Hide Secondary Navigation', 'themebeagle'),
			),
			array(
				'value' => 'hide_fixednav',
				'label' => __('Hide Fixed Navigation', 'themebeagle'),
			),
		),
	),

/*-----------------------------------------------------------------------------------*/
// Unboxed Layout
/*-----------------------------------------------------------------------------------*/

	array(
		'type' => 'toggle',
		'name' => 'unboxed',
		'label' => __('Use Unboxed Layout', 'themebeagle'),
		'description' => __('Check the box to use the Unboxed/Wide layout on this Post.', 'themebeagle'),
		'default' => '',
	),

/*-----------------------------------------------------------------------------------*/
// WordPress Gallery
/*-----------------------------------------------------------------------------------*/

	array(
		'type' => 'toggle',
		'name' => 'default_gallery',
		'label' => __('Show Standard WordPress Gallery Instead of Gallery Slider', 'themebeagle'),
		'description' => __('', 'themebeagle'),
		'default' => '',
	),

/*-----------------------------------------------------------------------------------*/
// Add Featured Slides
/*-----------------------------------------------------------------------------------*/

	array(
		'type' => 'toggle',
		'name' => 'featured_slides',
		'label' => __('Display Featured Slides', 'themebeagle'),
		'description' => __('Check the box to display the Featured Slides slider at the top of this Post.', 'themebeagle'),
		'default' => '',
	),

/*-----------------------------------------------------------------------------------*/
// Featured Slides Selector
/*-----------------------------------------------------------------------------------*/

	array(
		'type' => 'sorter',
		'name' => 'featured_slides_ids',
		'label' => __('Featured Slides Selector', 'themebeagle'),
		'description' => __('Select the Slides you would like to feature, and arrange the order as you like. You may also use settings from the Theme Settings page, in which case, you should leave this field blank.', 'themebeagle'),
		'dependency' => array(
			'field' => 'featured_slides',
			'function' => 'tb_is_featured_pages',
		),
		'items' => array(
			'data' => array(
				array(
					'source' => 'function',
					'value' => 'tb_get_slides',
				),
			),
		),
	),

/*-----------------------------------------------------------------------------------*/
// Add Featured Posts
/*-----------------------------------------------------------------------------------*/

	array(
		'type' => 'toggle',
		'name' => 'featured_slider',
		'label' => __('Display Featured Posts Slider', 'themebeagle'),
		'description' => __('Check the box to display the Featured Posts slider at the top of this Post.', 'themebeagle'),
		'default' => '',
	),
	array(
		'type' => 'select',
		'name' => 'featured_slider_type',
		'label' => __('Select Slider', 'themebeagle'),
		'dependency' => array(
			'field' => 'featured_slider',
			'function' => 'tb_is_featured_slider',
		),
		'description' => __('Select which slider to add.', 'themebeagle'),
		'items' => array(
			array(
				'value' => 'narrow-slider',
				'label' => __('Narrow Featured Posts Slider', 'themebeagle'),
			),
			array(
				'value' => 'narrow-slider-2',
				'label' => __('Alternate Narrow Featured Posts Slider', 'themebeagle'),
			),
			array(
				'value' => 'wide-slider',
				'label' => __('Wide Featured Posts Slider', 'themebeagle'),
			),
			array(
				'value' => 'wide-slider-2',
				'label' => __('Alternate Wide Featured Posts Slider', 'themebeagle'),
			),
		),
		'default' => '',
	),

/*-----------------------------------------------------------------------------------*/
// Add Featured Pages
/*-----------------------------------------------------------------------------------*/

	array(
		'type' => 'toggle',
		'name' => 'featured_pages',
		'label' => __('Display Featured Pages Slider', 'themebeagle'),
		'description' => __('Check the box to display the Featured Pages slider at the top of this Post.', 'themebeagle'),
		'default' => '',
	),
	array(
		'type' => 'sorter',
		'name' => 'featured_pages_ids',
		'label' => __('Select Pages to Feature', 'themebeagle'),
		'description' => __('Select your Pages, and arrange the order as you like. You may also use settings from the Theme Settings page, in which case, you should leave this field blank.', 'themebeagle'),
		'items' => array(
			'data' => array(
				array(
					'source' => 'function',
					'value' => 'vp_get_pages',
				),
			),
		),
	),

/*-----------------------------------------------------------------------------------*/
// Video Embed
/*-----------------------------------------------------------------------------------*/

	array(
		'type' => 'textarea',
		'name' => 'video_embed',
		'label' => __('Featured Video Embed Code', 'themebeagle'),
		'description' => __('Enter the video embed code for a featured video.', 'themebeagle'),
	),

);

/**
 * EOF
 */