<?php

	echo '<div class="recipe-info" itemscope itemtype="http://schema.org/Recipe">';

		if (function_exists('pf_show_link')) {
			echo pf_show_link();
		}

		if ( get_post_meta($post->ID, 'tb_recipe_title', true) ) {
			echo '<h2 itemprop="name">' . get_post_meta($post->ID, 'tb_recipe_title', true) . '</h2>';
		}	

		if ( get_post_meta($post->ID, 'tb_recipe_prep_time', true) ) {
			echo '<div class="recipe-prep-time">';
				echo '<h6>' . __('Prep Time', 'themebeagle') . '</h6>';
				echo '<p>' . get_post_meta($post->ID, 'tb_recipe_prep_time', true) . '</p>';
			echo '</div>';
		}

		if ( get_post_meta($post->ID, 'tb_recipe_cook_time', true) ) {
			echo '<div class="recipe-cook-time">';
				echo '<h6>' . __('Cooking Time', 'themebeagle') . '</h6>';
				echo '<p>' . get_post_meta($post->ID, 'tb_recipe_cook_time', true) . '</p>';
			echo '</div>';
		}

		if ( get_post_meta($post->ID, 'tb_recipe_yield', true) ) {
			echo '<div class="recipe-yield">';
				echo '<h6>' . __('Yield', 'themebeagle') . '</h6>';
				echo '<p>' . get_post_meta($post->ID, 'tb_recipe_yield', true) . '</p>';
			echo '</div>';
		}
	
		if ( get_post_meta($post->ID, 'tb_recipe_ingredients', true) ) {
			echo '<div class="recipe-ingredients">';
				echo '<h4>' . __('Recipe Ingredients', 'themebeagle') . '</h4>';
				echo '<ul><li>' . str_replace("\n", "</li><li>", get_post_meta($post->ID, 'tb_recipe_ingredients', true)) . '</li></ul>';
			echo '</div>';
		}

		if ( get_post_meta($post->ID, 'tb_recipe_directions', true) ) {
			echo '<div class="recipe-directions" itemprop="recipeInstructions">';
				echo '<h4>' . __('Recipe Instructions', 'themebeagle') . '</h4>';
				echo '<ol><li>' . str_replace("\n", "</li><li>", get_post_meta($post->ID, 'tb_recipe_directions', true)) . '</li></ol>';
			echo '</div>';
		}

		if ( get_post_meta($post->ID, 'tb_recipe_notes', true) ) {
			echo '<div class="recipe-notes">';
				echo '<h4>' . __('Recipe Notes', 'themebeagle') . '</h4>';
				echo '<ol><li>' . str_replace("\n", "</li><li>", get_post_meta($post->ID, 'tb_recipe_notes', true)) . '</li></ol>';
			echo '</div>';
		}

		if ( get_post_meta($post->ID, 'tb_recipe_credit', true) ) {
			echo '<div class="recipe-credit">';
				echo '<p><strong>' . __('Recipe Credit', 'themebeagle') . '</strong>: ' . get_post_meta($post->ID, 'tb_recipe_credit', true) . '</p>';
			echo '</div>';
		}

	echo '</div>';

?>