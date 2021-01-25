<?php
return array(

/*-----------------------------------------------------------------------------------*/
// ACCORDIONS AND TOGGLES
/*-----------------------------------------------------------------------------------*/

	'Accordion - Toggles' => array(
		'elements' => array(
			'tb_accordion' => array(
				'title'   => __('Accordion', 'themebeagle'),
				'code'    => '[accordion][/accordion]',
			),
			'tb_toggle' => array(
				'title'   => __('Toggle', 'themebeagle'),
				'code'    => '[toggle] ... toggle content ... [/toggle]',
				'attributes' => array(
					array(
						'name'    => 'title',
						'type'    => 'textbox',
						'label'   => __('Title', 'themebeagle'),
						'default' =>  __('Toggle Title', 'themebeagle'),
					),
					array(
						'name'    => 'open',
						'type'    => 'checkbox',
						'label'   => __('Open by Default', 'themebeagle'),
						'items' => array(
							array(
								'value' => 'yes',
								'label' => __('Yes', 'themebeagle'),
							),
						),
					),
                		),
			),
		),
	),

/*-----------------------------------------------------------------------------------*/
// ALERT BOXES
/*-----------------------------------------------------------------------------------*/

	'Alert Boxes' => array(
		'elements' => array(
			'tb_alert' => array(
				'title'   => __('Alert/Info Box', 'themebeagle'),
				'code'    => '[alert] ... alert box content ... [/alert]',
				'attributes' => array(
					array(
						'name'    => 'type',
						'type'    => 'radiobutton',
						'label'   => __('Type of Alert Box', 'themebeagle'),
						'items' => array(
							array(
								'value' => 'general',
								'label' => 'General',
							),
							array(
								'value' => 'warning',
								'label' => 'Warning',
							),
							array(
								'value' => 'info',
								'label' => 'Info',
							),
							array(
								'value' => 'success',
								'label' => 'Success',
							),
							array(
								'value' => 'danger',
								'label' => 'Danger',
							),
						),
						'default' =>  'general',
					),
					array(
						'name'    => 'dismiss',
						'type'    => 'radiobutton',
						'label'   => __('Dismissible', 'themebeagle'),
						'items' => array(
							array(
								'value' => 'no',
								'label' => 'No',
							),
							array(
								'value' => 'yes',
								'label' => 'Yes',
							),
						),
						'default' =>  'yes',
					),
				),
			),
		),
	),

/*-----------------------------------------------------------------------------------*/
// BUTTONS
/*-----------------------------------------------------------------------------------*/

	'Buttons' => array(
		'elements' => array(
			'tb_button' => array(
				'title'   => __('Button', 'themebeagle'),
				'code'    => '[button] ... button text ... [/button]',
				'attributes' => array(
					array(
						'name'    => 'color',
						'type'    => 'radiobutton',
						'label'   => __('Preset Background Color', 'themebeagle'),
						'items' => array(
							array(
								'value' => 'default',
								'label' => 'Default',
							),
							array(
								'value' => 'black',
								'label' => 'Black',
							),
							array(
								'value' => 'red',
								'label' => 'Red',
							),
							array(
								'value' => 'orange',
								'label' => 'Orange',
							),
							array(
								'value' => 'green',
								'label' => 'Green',
							),
							array(
								'value' => 'turquoise',
								'label' => 'Turquoise',
							),
							array(
								'value' => 'blue',
								'label' => 'Blue',
							),
							array(
								'value' => 'dark-blue',
								'label' => 'Dark Blue',
							),
							array(
								'value' => 'purple',
								'label' => 'Purple',
							),
							array(
								'value' => 'pink',
								'label' => 'Pink',
							),
							array(
								'value' => 'gold',
								'label' => 'Gold',
							),
						),
						'default' =>  'default',
					),
					array(
						'name'    => 'custom_color',
						'type'    => 'color',
						'label'   => __('Custom Background Color (optional)', 'themebeagle'),
						'default' => '',
					),
					array(
						'name'    => 'font_color',
						'type'    => 'color',
						'label'   => __('Font Color', 'themebeagle'),
						'default' => '#ffffff',
					),
					array(
						'name'    => 'link',
						'type'    => 'textbox',
						'label'   => __('Button Link URL', 'themebeagle'),
						'default' =>  'http://wp-prosperity.com',
					),
					array(
						'name'    => 'size',
						'type'    => 'radiobutton',
						'label'   => __('Button Size', 'themebeagle'),
						'items' => array(
							array(
								'value' => '',
								'label' => 'Standard',
							),
							array(
								'value' => 'small',
								'label' => 'Small',
							),
							array(
								'value' => 'large',
								'label' => 'Large',
							),
						),
						'default' => '',
					),
					array(
						'name'    => 'target',
						'type'    => 'radiobutton',
						'label'   => __('Open Link in New Window', 'themebeagle'),
						'items' => array(
							array(
								'value' => '',
								'label' => 'No',
							),
							array(
								'value' => '_blank',
								'label' => 'Yes',
							),
						),
						'default' => '',
					),
				),
			),
		),
	),

/*-----------------------------------------------------------------------------------*/
// COLUMNS
/*-----------------------------------------------------------------------------------*/

	'Columns' => array(
		'elements' => array(
			'tb_columns' => array(
				'title'   => __('Columns Wrapper', 'themebeagle'),
				'code'    => '[columns][/columns]',
			),
			'tb_onehalf' => array(
				'title'   => __('One-Half Column', 'themebeagle'),
				'code'    => '[one-half] ... column content ... [/one-half]',
			),
			'tb_onethird' => array(
				'title'   => __('One-Third Column', 'themebeagle'),
				'code'    => '[one-third] ... column content ... [/one-third]',
			),
			'tb_twothird' => array(
				'title'   => __('Two-Third Column', 'themebeagle'),
				'code'    => '[two-third] ... column content ... [/two-third]',
			),
			'tb_onefourth' => array(
				'title'   => __('One-Fourth Column', 'themebeagle'),
				'code'    => '[one-fourth] ... column content ... [/one-fourth]',
			),
			'tb_threefourth' => array(
				'title'   => __('Three-Fourth Column', 'themebeagle'),
				'code'    => '[three-fourth] ... column content ... [/three-fourth]',
			),
		),
	),

/*-----------------------------------------------------------------------------------*/
// DIVIDERS
/*-----------------------------------------------------------------------------------*/

	'Dividers' => array(
		'elements' => array(
			'tb_divider' => array(
				'title'   => __('Divider', 'themebeagle'),
				'code'    => '[divider]',
				'attributes' => array(
					array(
						'name'    => 'style',
						'type'    => 'radiobutton',
						'label'   => __('Style', 'themebeagle'),
						'items' => array(
							array(
								'value' => 'empty',
								'label' => 'Empty',
							),
							array(
								'value' => 'dotted',
								'label' => 'Dotted',
							),
							array(
								'value' => 'shadow',
								'label' => 'Shadow',
							),
							array(
								'value' => 'single',
								'label' => 'Single',
							),
							array(
								'value' => 'double',
								'label' => 'Double',
							),
						),
						'default' =>  'empty',
					),
					array(
						'name'    => 'margin_top',
						'type'    => 'textbox',
						'label'   => __('Top Margin', 'themebeagle'),
						'default' =>  '30px',
					),
					array(
						'name'    => 'margin_bottom',
						'type'    => 'textbox',
						'label'   => __('Bottom Margin', 'themebeagle'),
						'default' =>  '30px',
					),
				),
			),
		),
	),

/*-----------------------------------------------------------------------------------*/
// ICONBOX
/*-----------------------------------------------------------------------------------*/

	'Iconbox' => array(
		'elements' => array(
			'tb_iconbox' => array(
				'title'   => __('Icon Box', 'themebeagle'),
				'code'    => '[iconbox] ... your content ... [/iconbox]',
				'attributes' => array(
					array(
						'name'    => 'layout',
						'type'    => 'radiobutton',
						'label'   => __('Layout', 'themebeagle'),
						'items' => array(
							array(
								'value' => 'icon-top',
								'label' => 'icon-top',
							),
							array(
								'value' => 'icon-title',
								'label' => 'icon-title',
							),
							array(
								'value' => 'icon-left',
								'label' => 'icon-left',
							),
							array(
								'value' => 'icon-boxed',
								'label' => 'icon-boxed',
							),
						),
						'default' =>  'icon-top',
					),
					array(
						'name'    => 'title',
						'type'    => 'textbox',
						'label'   => __('Icon Box Title', 'themebeagle'),
						'default' => __('Icon Box Title', 'themebeagle'),
					),
					array(
						'type' => 'fontawesome',
						'name' => 'icon',
						'label' => __('Select Icon', 'themebeagle'),
						'default' => 'fa-wordpress',
					),
					array(
						'name'    => 'icon_color',
						'type'    => 'color',
						'label'   => __('Icon Color (optional)', 'themebeagle'),
					),
					array(
						'name'    => 'icon_size',
						'type'    => 'textbox',
						'label'   => __('Icon Size (e.g. 24px; optional)', 'themebeagle'),
					),
					array(
						'name'    => 'icon_background_color',
						'type'    => 'color',
						'label'   => __('Icon Background Color (optional)', 'themebeagle'),
					),
					array(
						'name'    => 'icon_border_color',
						'type'    => 'color',
						'label'   => __('Icon Border Color (optional)', 'themebeagle'),
					),
					array(
						'name'    => 'background_color',
						'type'    => 'color',
						'label'   => __('Box Background Color (optional)', 'themebeagle'),
					),
					array(
						'name'    => 'border_color',
						'type'    => 'color',
						'label'   => __('Box Border Color (optional)', 'themebeagle'),
					),
					array(
						'name'    => 'border_width',
						'type'    => 'textbox',
						'label'   => __('Box Border Width (e.g. 1px; optional)', 'themebeagle'),
					),
					array(
						'name'    => 'font_size',
						'type'    => 'textbox',
						'label'   => __('Font Size (e.g. 16px; optional)', 'themebeagle'),
					),
				),
			),
		),
	),

/*-----------------------------------------------------------------------------------*/
// POSTS
/*-----------------------------------------------------------------------------------*/

	'Posts' => array(
		'elements' => array(
			'tb_posts' => array(
				'title'   => __('Posts', 'themebeagle'),
				'code'    => '[posts]',
				'attributes' => array(
					array(
						'name'    => 'columns',
						'type'    => 'radiobutton',
						'label'   => __('Number of Columns', 'themebeagle'),
						'items' => array(
							array(
								'value' => '1',
								'label' => '1',
							),
							array(
								'value' => '2',
								'label' => '2',
							),
							array(
								'value' => '3',
								'label' => '3',
							),
							array(
								'value' => '4',
								'label' => '4',
							),
						),
						'default' =>  '3',
					),
					array(
						'name'    => 'post_count',
						'type'    => 'textbox',
						'label'   => __('Total Number of Posts', 'themebeagle'),
						'default' =>  '6',
					),
					array(
						'name'    => 'cat_ids',
						'type'    => 'multiselect',
						'label'   => __('Categories (optional)', 'themebeagle'),
						'items' => array(
							'data' => array(
								array(
									'source' => 'function',
									'value' => 'vp_get_categories',
								),
							),
						),
					),
					array(
						'name'    => 'layout',
						'type'    => 'radiobutton',
						'label'   => __('Layout', 'themebeagle'),
						'items' => array(
							array(
								'value' => 'grid',
								'label' => __('Grid', 'themebeagle'),
							),
							array(
								'value' => 'masonry',
								'label' => __('Masonry', 'themebeagle'),
							),
						),
						'default' => 'masonry',
					),
                		),
			),
			'tb_postsbycat' => array(
				'title'   => __('Posts by Category', 'themebeagle'),
				'code'    => '[posts_by_cat]',
				'attributes' => array(
					array(
						'name'    => 'post_count',
						'type'    => 'textbox',
						'label'   => __('Posts Per Category', 'themebeagle'),
						'default' =>  '4',
					),
					array(
						'name'    => 'cat_ids',
						'type'    => 'multiselect',
						'label'   => __('Categories (required)', 'themebeagle'),
						'items' => array(
							'data' => array(
								array(
									'source' => 'function',
									'value' => 'vp_get_categories',
								),
							),
						),
					),
					array(
						'name'    => 'layout',
						'type'    => 'radiobutton',
						'label'   => __('Layout', 'themebeagle'),
						'items' => array(
							array(
								'value' => 'stacked',
								'label' => __('Stacked', 'themebeagle'),
							),
							array(
								'value' => 'side-by-side',
								'label' => __('Side-by-Side', 'themebeagle'),
							),
						),
						'default' => 'stacked',
					),
                		),
			),

		),
	),

/*-----------------------------------------------------------------------------------*/
// PORTFOLIO
/*-----------------------------------------------------------------------------------*/

	'Portfolio' => array(
		'elements' => array(
			'tb_portfolio' => array(
				'title'   => __('Portfolio', 'themebeagle'),
				'code'    => '[portfolio]',
				'attributes' => array(
					array(
						'name'    => 'columns',
						'type'    => 'radiobutton',
						'label'   => __('Number of Columns', 'themebeagle'),
						'items' => array(
							array(
								'value' => '1',
								'label' => '1',
							),
							array(
								'value' => '2',
								'label' => '2',
							),
							array(
								'value' => '3',
								'label' => '3',
							),
							array(
								'value' => '4',
								'label' => '4',
							),
						),
						'default' =>  '3',
					),
					array(
						'name'    => 'post_count',
						'type'    => 'textbox',
						'label'   => __('Total Number of Posts', 'themebeagle'),
						'default' =>  '6',
					),
					array(
						'name'    => 'cat_ids',
						'type'    => 'multiselect',
						'label'   => __('Categories (optional)', 'themebeagle'),
						'items' => array(
							'data' => array(
								array(
									'source' => 'function',
									'value' => 'vp_get_categories',
								),
							),
						),
					),
                		),
			),
		),
	),

/*-----------------------------------------------------------------------------------*/
// SLIDESHOW
/*-----------------------------------------------------------------------------------*/

	'Slideshow' => array(
		'elements' => array(
			'tb_slideshow' => array(
				'title'   => __('Slideshow', 'themebeagle'),
				'code'    => '[slideshow][/slideshow]',
				'attributes' => array(
					array(
						'name'    => 'style',
						'type'    => 'radiobutton',
						'label'   => __('Style', 'themebeagle'),
						'items' => array(
							array(
								'value' => '',
								'label' => 'Normal',
							),
							array(
								'value' => 'alt',
								'label' => 'Alt',
							),
							array(
								'value' => 'alt2',
								'label' => 'Alt2',
							),
						),
						'default' =>  '',
					),
				),
			),
			'tb_slideshowitem' => array(
				'title'   => __('Slideshow Item', 'themebeagle'),
				'code'    => '[slideshow_item] ... slide content ... [/slideshow_item]',
			),
		),
	),

/*-----------------------------------------------------------------------------------*/
// SOCIAL MEDIA ICONS
/*-----------------------------------------------------------------------------------*/

	'Social Media Icons' => array(
		'elements' => array(
			'tb_socialicons' => array(
				'title'   => __('Social Media Icons', 'themebeagle'),
				'code'    => '[socialicons]',
				'attributes' => array(
					array(
						'name'    => 'style',
						'type'    => 'radiobutton',
						'label'   => __('Style', 'themebeagle'),
						'items' => array(
							array(
								'value' => 'color',
								'label' => 'Color',
							),
							array(
								'value' => 'grayscale',
								'label' => 'Grayscale',
							),
							array(
								'value' => 'dark',
								'label' => 'Dark',
							),
							array(
								'value' => 'clear',
								'label' => 'Clear',
							),
						),
						'default' =>  'color',
					),
					array(
						'name'    => 'shape',
						'type'    => 'radiobutton',
						'label'   => __('Shape', 'themebeagle'),
						'items' => array(
							array(
								'value' => 'square',
								'label' => 'Square',
							),
							array(
								'value' => 'round',
								'label' => 'Round',
							),
						),
						'default' =>  'square',
					),
				),
			),
		),
	),

/*-----------------------------------------------------------------------------------*/
// TABS
/*-----------------------------------------------------------------------------------*/

	'Tabs' => array(
		'elements' => array(
			'tb_tabgroup' => array(
				'title'   => __('Tab Group Wrapper', 'themebeagle'),
				'code'    => '[tabgroup][/tabgroup]',
				'attributes' => array(
					array(
						'name'    => 'layout',
						'type'    => 'radiobutton',
						'label'   => __('Layout', 'themebeagle'),
						'items' => array(
							array(
								'value' => 'tabs-top',
								'label' => 'Tabs Top',
							),
							array(
								'value' => 'tabs-left',
								'label' => 'Tabs Left',
							),
						),
						'default' =>  'tabs-top',
					),
				),
			),
			'tb_tab' => array(
				'title'   => __('Individual Tab', 'themebeagle'),
				'code'    => '[tab] ... tab content ... [/tab]',
				'attributes' => array(
					array(
						'name'    => 'title',
						'type'    => 'textbox',
						'label'   => __('Tab Title', 'themebeagle'),
						'default' =>  __('Tab Title', 'themebeagle'),
					),
				),
			),
		),
	),

/*-----------------------------------------------------------------------------------*/
// TOOLTIP
/*-----------------------------------------------------------------------------------*/

	'Tooltip' => array(
		'elements' => array(
			'tb_tooltip' => array(
				'title'   => __('Tooltip', 'themebeagle'),
				'code'    => '[tooltip] ... tooltip text ... [/tooltip]',
				'attributes' => array(
					array(
						'name'    => 'align',
						'type'    => 'radiobutton',
						'label'   => __('Alignment', 'themebeagle'),
						'items' => array(
							array(
								'value' => '',
								'label' => 'Top',
							),
							array(
								'value' => 'right',
								'label' => 'Right',
							),
							array(
								'value' => 'bottom',
								'label' => 'Bottom',
							),
							array(
								'value' => 'left',
								'label' => 'Left',
							),
						),
						'default' =>  '',
					),
					array(
						'name'    => 'title',
						'type'    => 'textbox',
						'label'   => __('Title', 'themebeagle'),
						'default' =>  __('This is a Tooltip', 'themebeagle'),
					),
				),
			),
		),
	),

/*-----------------------------------------------------------------------------------*/
// VIDEO EMBEDS
/*-----------------------------------------------------------------------------------*/

	'Video Embeds' => array(
		'elements' => array(
			'tb_youtube' => array(
				'title'   => __('Responsive Youtube Video', 'themebeagle'),
				'code'    => '[youtube]',
				'attributes' => array(
					array(
						'name'    => 'id',
						'type'    => 'textbox',
						'label'   => __('Youtube Video ID', 'themebeagle'),
					),
				),
			),
			'tb_vimeo' => array(
				'title'   => __('Responsive Vimeo Video', 'themebeagle'),
				'code'    => '[vimeo]',
				'attributes' => array(
					array(
						'name'    => 'id',
						'type'    => 'textbox',
						'label'   => __('Vimeo Video ID', 'themebeagle'),
					),
				),
			),
			'tb_tedtalk' => array(
				'title'   => __('Responsive TedTalk Video', 'themebeagle'),
				'code'    => '[tedtalk]',
				'attributes' => array(
					array(
						'name'    => 'id',
						'type'    => 'textbox',
						'label'   => __('TedTalk Video ID', 'themebeagle'),
					),
				),
			),
		),
	),

/*-----------------------------------------------------------------------------------*/
// WIDE CONTENT BOX
/*-----------------------------------------------------------------------------------*/

	'Wide Content Box' => array(
		'elements' => array(
			'tb_widecontent' => array(
				'title'   => __('Wide Content Box', 'themebeagle'),
				'code'    => '[widecontent] ... your content ... [/widecontent]',
				'attributes' => array(
					array(
						'name'    => 'background_color',
						'type'    => 'color',
						'label'   => __('Background Color', 'themebeagle'),
						'default' => '#ffffff',
					),
					array(
						'name'    => 'background_image',
						'type'    => 'upload',
						'label'   => __('Background Image', 'themebeagle'),
					),
					array(
						'name'    => 'parallax',
						'type'    => 'radiobutton',
						'label'   => __('Parallax On', 'themebeagle'),
						'items' => array(
							array(
								'value' => '',
								'label' => 'Yes',
							),
							array(
								'value' => 'no',
								'label' => 'No',
							),
						),
					),
					array(
						'name'    => 'background_position',
						'type'    => 'textbox',
						'label'   => __('Background Image Position', 'themebeagle'),
						'default' => '50% 50%',
					),
					array(
						'name'    => 'background_repeat',
						'type'    => 'textbox',
						'label'   => __('Background Image Repeat Pattern', 'themebeagle'),
						'default' => 'no-repeat',
					),
					array(
						'name'    => 'background_size',
						'type'    => 'textbox',
						'label'   => __('Background Image Size', 'themebeagle'),
					),
					array(
						'name'    => 'padding_top',
						'type'    => 'textbox',
						'label'   => __('Top Padding', 'themebeagle'),
						'default' => '50px',
					),
					array(
						'name'    => 'padding_bottom',
						'type'    => 'textbox',
						'label'   => __('Bottom Padding', 'themebeagle'),
						'default' => '50px',
					),
					array(
						'name'    => 'font_color',
						'type'    => 'color',
						'label'   => __('Font Color', 'themebeagle'),
						'default' => '#222222',
					),
					array(
						'name'    => 'font_size',
						'type'    => 'textbox',
						'label'   => __('Font Size', 'themebeagle'),
						'default' => '16px',
					),
					array(
						'name'    => 'centered',
						'type'    => 'radiobutton',
						'label'   => __('Center Content', 'themebeagle'),
						'items' => array(
							array(
								'value' => 'yes',
								'label' => 'Yes',
							),
							array(
								'value' => 'no',
								'label' => 'No',
							),
						),
						'default' => 'no',
					),
					array(
						'name'    => 'style',
						'type'    => 'radiobutton',
						'label'   => __('Full-Width Content Style', 'themebeagle'),
						'items' => array(
							array(
								'value' => 'full',
								'label' => 'Yes',
							),
							array(
								'value' => '',
								'label' => 'No',
							),
						),
					),
				),
			),
	        ),
	),
);