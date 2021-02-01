<?php

/*-----------------------------------------------------------------------------------*/
// WP-UPDATES THEME UPDATER CLASS V3.0 - Adapted from https://www.smashingmagazine.com/2015/08/deploy-wordpress-plugins-with-github-using-transients/
// UPDATED TO GITHUB VERSION 3.0
/*-----------------------------------------------------------------------------------*/

if (!class_exists('Theme_Updater')) {
	class Theme_Updater {
    
		private $file;
		private $api_url;
		private $github_response;
		private $basename;
		private $git_basename;
		private $theme;
		    
		function __construct( $file, $api_url = 'https://api.github.com/repos/mattshoaf/wp-prosperity-buzz/releases' ) {
			$this->file = $file;
			$this->api_url = $api_url;
			$this->basename = 'wp-prosperity';
			$this->git_basename = 'wp-prosperity-buzz';
			$this->theme = wp_get_theme('wp-prosperity');
			$this->access_token = tb_option('githubtoken');
		    
			add_filter( 'pre_set_site_transient_update_themes', array(&$this, 'modify_transient') );
			add_filter( 'upgrader_post_install', array( $this, 'after_install' ), 10, 3 );
			add_action( 'switch_theme', [$this, 'after_switch'], 0 , 3 );

    		
			// This is for testing only!
			// set_site_transient('update_themes', null);
		}

		private function get_repository_info() {
			if ( is_null( $this->github_response ) ) { // Do we have a response?

				$request_uri = add_query_arg('access_token', $this->access_token, $this->api_url );

				$response = json_decode( wp_remote_retrieve_body( wp_remote_get( $request_uri ) ), true ); // Get JSON and parse it
				
				if( is_array( $response ) ) { // If it is an array
						$response = current( $response ); // Get the first item
				}

				$this->github_response = $response; // Set it to our property  
			}
		}

		public function modify_transient( $transient ) {
			if($transient) {
				if( property_exists( $transient, 'checked') ) { // Check if transient has a checked property
		
					if( $checked = $transient->checked ) { // Did Wordpress check for updates?
						$this->get_repository_info(); // Get the repo info
		
						$out_of_date = version_compare( $this->github_response['tag_name'], $checked[ $this->basename ], 'gt' ); // Check if we're out of date
		
						if( $out_of_date ) {
		
							$new_files = $this->github_response['zipball_url']; // Get the ZIP
		
							$slug = current( explode('/', $this->basename ) ); // Create valid slug
		
							$plugin = array( // setup our plugin info
								'url' => $this->theme["ThemeURI"],
								'slug' => $slug,
								'package' => $new_files,
								'new_version' => $this->github_response['tag_name']
							);
		
							$transient->response[$this->basename] = $plugin; // Return it in response
						}
					}
				}
			}
			return $transient; // Return filtered transient
		}

		public function after_install( $response, $hook_extra, $result ) {
			global $wp_filesystem; // Get global FS object
	
			$install_directory = get_template_directory(); // Our theme directory
			
			$wp_filesystem->move( $result['destination'], $install_directory ); // Move files to the theme dir
			$result['destination'] = $install_directory; // Set the destination for the rest of the stack			
	
			return $result;
		}

		public function after_switch( $new_name, $new_theme, $old_theme ) {
			// If the new theme has errors, it's probably because the install directory got weird coming from github.
			// Reset to the proper directory.
			if( $new_theme->get_stylesheet() != $this->basename ) switch_theme( $this->basename );
		}

	}
}
