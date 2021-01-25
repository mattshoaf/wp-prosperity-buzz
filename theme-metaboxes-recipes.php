<?php

// Begin Recipe Metaboxes Array

return array(

/*-----------------------------------------------------------------------------------*/
// Recipes
/*-----------------------------------------------------------------------------------*/

	array(
		'type' => 'toggle',
		'name' => 'manage_recipes',
		'label' => __('Add Recipe Information', 'themebeagle'),
		'description' => __('Check the box to add Recipe information to this Post.', 'themebeagle'),
		'default' => '',
	),

	array(
		'type' => 'textbox',
		'name' => 'recipe_title',
		'label' => __('Recipe Name', 'themebeagle'),
		'dependency' => array(
			'field' => 'manage_recipes',
			'function' => 'tb_is_manage_recipe',
		),
		'description' => __('Enter recipe name.', 'themebeagle'),
	),

	array(
		'type' => 'select',
		'name' => 'recipe_image',
		'label' => __('Recipe Image', 'themebeagle'),
		'dependency' => array(
			'field' => 'manage_recipes',
			'function' => 'tb_is_manage_recipe',
		),
		'description' => __('The Recipe Image (if selected) will be shown in the Recipe Box.', 'themebeagle'),
		'items' => array(
			array(
				'value' => 'none',
				'label' => __('No Image', 'themebeagle'),
			),
			array(
				'value' => 'featured',
				'label' => __('Use Post/Page Featured Image', 'themebeagle'),
			),
			array(
				'value' => 'select',
				'label' => __('Select Your Own Recipe Image', 'themebeagle'),
			),
		),
	),

	array(
		'type' => 'upload',
		'name' => 'recipe_image_upload',
		'label' => __('Upload/Select Recipe Image', 'themebeagle'),
		'dependency' => array(
			'field' => 'recipe_image',
			'function' => 'tb_is_select_recipe_image',
		),
		'description' => __('Upload or select a recipe image.', 'themebeagle'),
	),

	array(
		'type' => 'textarea',
		'name' => 'recipe_description',
		'label' => __('Recipe Description', 'themebeagle'),
		'dependency' => array(
			'field' => 'manage_recipes',
			'function' => 'tb_is_manage_recipe',
		),
		'description' => __('Enter a short description for this recipe.', 'themebeagle'),
	),

	array(
		'type' => 'slider',
		'max' => '720',
		'step' => '5',
		'name' => 'recipe_prep_time',
		'label' => __('Prep Time in Minutes', 'themebeagle'),
		'dependency' => array(
			'field' => 'manage_recipes',
			'function' => 'tb_is_manage_recipe',
		),
		'default' => '30',
		'description' => __('Enter recipe prep time in minutes. Example: 30 minutes should be entered simply as "30."', 'themebeagle'),
	),

	array(
		'type' => 'slider',
		'max' => '720',
		'step' => '5',
		'name' => 'recipe_cook_time',
		'label' => __('Cooking Time in Minutes', 'themebeagle'),
		'dependency' => array(
			'field' => 'manage_recipes',
			'function' => 'tb_is_manage_recipe',
		),
		'default' => '30',
		'description' => __('Enter recipe cooking time in minutes. Example: 30 minutes should be entered simply as "30."', 'themebeagle'),
	),

	array(
		'type' => 'slider',
		'max' => '720',
		'step' => '5',
		'name' => 'recipe_total_time',
		'label' => __('Total Time in Minutes', 'themebeagle'),
		'dependency' => array(
			'field' => 'manage_recipes',
			'function' => 'tb_is_manage_recipe',
		),
		'default' => '60',
		'description' => __('Enter recipe total time in minutes. Example: 60 minutes should be entered simply as "60."', 'themebeagle'),
	),

	array(
		'type' => 'textbox',
		'name' => 'recipe_serves',
		'label' => __('Serves How Many', 'themebeagle'),
		'dependency' => array(
			'field' => 'manage_recipes',
			'function' => 'tb_is_manage_recipe',
		),
		'description' => __('Enter how many people recipe serves (e.g. 4 People).', 'themebeagle'),
	),

	array(
		'type' => 'textbox',
		'name' => 'recipe_yield',
		'label' => __('Recipe Yield', 'themebeagle'),
		'dependency' => array(
			'field' => 'manage_recipes',
			'function' => 'tb_is_manage_recipe',
		),
		'description' => __('Enter Recipe yield (e.g. 2 cups, 24 cookies, etc).', 'themebeagle'),
	),

	array(
		'type' => 'textarea',
		'name' => 'recipe_ingredients',
		'label' => __('Recipe Ingredients', 'themebeagle'),
		'dependency' => array(
			'field' => 'manage_recipes',
			'function' => 'tb_is_manage_recipe',
		),
		'description' => __('Enter 1 ingredient per line.', 'themebeagle'),
	),

	array(
		'type' => 'textarea',
		'name' => 'recipe_directions',
		'label' => __('Recipe Instructions', 'themebeagle'),
		'dependency' => array(
			'field' => 'manage_recipes',
			'function' => 'tb_is_manage_recipe',
		),
		'description' => __('Enter 1 instruction per line.', 'themebeagle'),
	),

	array(
		'type' => 'textarea',
		'name' => 'recipe_notes',
		'label' => __('Recipe Notes', 'themebeagle'),
		'dependency' => array(
			'field' => 'manage_recipes',
			'function' => 'tb_is_manage_recipe',
		),
		'description' => __('Enter any notes for the Recipe; enter 1 note per line.', 'themebeagle'),
	),

	array(
		'type' => 'textarea',
		'name' => 'recipe_credit',
		'label' => __('Recipe Credit', 'themebeagle'),
		'dependency' => array(
			'field' => 'manage_recipes',
			'function' => 'tb_is_manage_recipe',
		),
		'description' => __('If you like, enter a comment and link to the website where you sourced this recipe.', 'themebeagle'),
	),

);

/**
 * EOF
 */