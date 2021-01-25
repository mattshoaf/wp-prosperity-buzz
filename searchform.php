<form method="get" class="search-form clearfix" action="<?php echo home_url( '/' ); ?>">
	<label><span class="screen-reader-text"><?php _e( 'Search for: ', 'themebeagle' ); ?></span></label>
	<i class="fa fa-search"></i>
	<input type="text" class="search-field" placeholder="<?php _e( 'Enter Search Terms', 'themebeagle' ); ?>" value="" name="s" title="<?php _e( 'Enter Search Terms', 'themebeagle' ); ?>" /><input type="submit" class="search-submit" value="<?php _e( 'Search', 'themebeagle' ); ?>" />
</form>