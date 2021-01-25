<?php

// Begin Page Metaboxes Array

return array(

	array(
		'type' => 'toggle',
		'name' => 'hide_slide_title',
		'label' => __('Hide Slide Title', 'themebeagle'),
		'description' => __('Check the box to hide the Title for this Slide.', 'themebeagle'),
		'default' => '',
	),

	array(
		'type' => 'toggle',
		'name' => 'hide_slide_content',
		'label' => __('Hide Slide Content', 'themebeagle'),
		'description' => __('Check the box to hide the Content for this Slide.', 'themebeagle'),
		'default' => '',
	),

	array(
		'type' => 'textbox',
		'name' => 'slide_button_text',
		'label' => __('Slide Button Text', 'themebeagle'),
		'description' => __('Leave blank for no button. This is the text that will be used as the "Read More" button.', 'themebeagle'),
	),

	array(
		'type' => 'textbox',
		'name' => 'slide_button_url',
		'label' => __('Slide Button URL', 'themebeagle'),
		'description' => __('Leave blank for no button. This is the hyperlink URL that will be used for the "Read More" button (e.g. http://www.mysite.com).', 'themebeagle'),
	),

);

/**
 * EOF
 */