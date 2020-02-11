<?php
/**
 * For more info: https://developer.wordpress.org/themes/basics/theme-functions/
 *
 */

// Theme support options
require_once(get_template_directory().'/functions/theme-support.php');

// WP Head and other cleanup functions
require_once(get_template_directory().'/functions/cleanup.php');

// Register scripts and stylesheets
require_once(get_template_directory().'/functions/enqueue-scripts.php');

// Register custom menus and menu walkers
require_once(get_template_directory().'/functions/menu.php');

// Register sidebars/widget areas
require_once(get_template_directory().'/functions/sidebar.php');

// Makes WordPress comments suck less
require_once(get_template_directory().'/functions/comments.php');

// Replace 'older/newer' post links with numbered navigation
require_once(get_template_directory().'/functions/page-navi.php');

// Adds support for multiple languages
require_once(get_template_directory().'/functions/translation/translation.php');

// Adds site styles to the WordPress editor
// require_once(get_template_directory().'/functions/editor-styles.php');

// Remove Emoji Support
// require_once(get_template_directory().'/functions/disable-emoji.php');

// Related post function - no need to rely on plugins
// require_once(get_template_directory().'/functions/related-posts.php');

// Use this as a template for custom post types
require_once(get_template_directory().'/functions/cpt-strains.php');


// Customize the WordPress login menu
// require_once(get_template_directory().'/functions/login.php');

// Customize the WordPress admin
// require_once(get_template_directory().'/functions/admin.php');


add_theme_support( 'custom-logo' );
function bitlore_custom_logo_setup() {
 $defaults = array(
 'height'      => 100,
 'width'       => 100,
 'flex-height' => false,
 'flex-width'  => false,
 'header-text' => array( 'site-title', 'site-description' ),
 );
 add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'bitlore_custom_logo_setup' );


# Initiate Global settings
if(function_exists('acf_add_options_page')){
	acf_add_options_page(
    array(
  		'page_title' 	=> __('Global Content', 'my_text_domain'),
  		'menu_title'	=> __('Global Content', 'my_text_domain'),
  		'menu_slug' 	=> 'global-content',
  		'capability'	=> 'edit_posts',
      'icon_url'    => get_template_directory_uri() . '/assets/images/logo_20x20.png',
  		'redirect'		=> false
	  )
  );
}


// Allow SVG
function add_file_types_to_uploads($file_types){
$new_filetypes = array();
$new_filetypes['svg'] = 'image/svg+xml';
$file_types = array_merge($file_types, $new_filetypes );
return $file_types;
}
add_filter('upload_mimes', 'add_file_types_to_uploads');
