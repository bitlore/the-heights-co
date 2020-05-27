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


function get_available_strains() {

  	$args = array(
  		'post_type' => 'strains',
  		'post_status' => 'publish',
  		'posts_per_page' => -1,
  		'orderby' => 'title',
  		'order' => 'ASC',
  		'meta_query' => array(
  			array(
  				'key' => 'available',
  				'value' => 'yes'
  			)
  		)
  	);

    $query = new WP_Query( $args );
    return $query;

    // $posts = get_posts( $args );
    // return $posts;
}


// add_filter( 'gform_pre_render_1', 'populate_array_of_strain_names' );
// add_filter( 'gform_pre_validation_1', 'populate_array_of_strain_names' );
// add_filter( 'gform_pre_submission_filter_1', 'populate_array_of_strain_names' );
// add_filter( 'gform_admin_pre_render_1', 'populate_array_of_strain_names' );
// function populate_array_of_strain_names( $form ) {
//
//     foreach ( $form['fields'] as &$field ) {
//
//         if ( $field->type != 'select' ) {
//             continue;
//         }
//
//         // you can add additional parameters here to alter the posts that are retrieved
//         // more info: http://codex.wordpress.org/Template_Tags/get_posts
//         $posts = get_available_strains();
//
//         $choices = array();
//
//         foreach ( $posts as $post ) {
//
//
//             $title = $post->post_title;
//
//             $thc = get_field('thc') . ' THC';
//
//             $harvest = get_field('harvest_date');
//
//             $choices[] = array(
//               'text' => $title . $thc . $harvest,
//               'value' => $post->post_title
//             );
//         }
//
//         // update 'Select a Post' to whatever you'd like the instructive option to be
//         $field->placeholder = 'Select a Strain';
//         $field->choices = $choices;
//
//     }
//
//     return $form;
// }


// function populate_array_of_strain_names($value) {
//
//   $the_query = get_available_strains();
//
//   $names = array();
//
//   if ( $the_query->have_posts() ) {
//     while ( $the_query->have_posts() ) {
//       $the_query->the_post();
//
//       $title = get_the_title();
//
//       $key = str_replace(' ', '', $title);
//
//       $value = $title;
//
//       $names[$key] = $value;
//
//     }
//   }
//   else {
//     //no strains available
//   }
//
//   return $names;
//
// }

// add_filter( 'gform_field_value_strain', 'populate_array_of_strain_names');

function generate_strain_form($content,$field,$value,$entry_id,$form_id){
	//only filter on the front end
	if(!is_admin() && !$entry_id):
		$content = '';
		$products = get_available_strains(); //returns as array of posts

    if ( $products->have_posts() ) :

      $content .= '<div class="ginput_container ginput_container_list ginput_list">'; //form wrapper

      $content .= '<br /><label class="gfield_label">Available Strains</label><br />';

      $content .= '<span style="margin-bottom:1em; font-size: .8em; font-family: UnitedSansRegMed;">Enter the quantity and material type next to any strain you would like to order.</span><br /><br />';

      //strain loop
      while ( $products->have_posts() ) : $products->the_post();

        $name = get_the_title();

        $strain_title = $name . ', ' .  get_field('thc') . ', ' . get_field('harvest_date');

    		//form output
    		ob_start();
    		?>


    		<div class="gfield_list gfield_list_container gfield_list_group" data-id="<?php echo $strain_title; ?>" style="margin-bottom:2.5em;display: flex; flex-wrap: wrap;">
                  <span class="gfield_list_cell gfield_list_5_cell1" data-label="strain" style="display:inline-block;width:50%;">
                    <input type="text" name="input_6[]" value="<?php echo $name; ?>" readonly="readonly" style="color:white; border:none; background:transparent; pointer-events:none; padding-left: 0; font-weight: bold; font-family: TradeGoth; text-transform: uppercase; letter-spacing: 1px;font-size: 1.2em;padding-bottom: 0px;padding-top: 0px; height: auto !important;">
                    <br />
                    <span style="font-size: .7em; font-family: UnitedSansRegMed;"><?php echo get_field('thc') ?> THC, Harvested <?php echo get_field('harvest_date') ?></span>
                  </span>
    			  <span class="gfield_list_cell gfield_list_5_cell2" data-label="pounds" style="margin:.5em 1em 0 0;">
    				  <input name="input_6[]" type="number" value="" min="0" style="width:45px;color:black; font-family: UnitedSansRegMed; text-align: right;"/>
                      <label for="lb" style="font-family: UnitedSansRegMed;">lb(s)</label>
    			  </span>
                  <span class="gfield_list_cell gfield_list_5_cell3" data-label="material" style="margin:.5em 1em 0 0;">
                    <select name="input_6[]" style="width:8.5em;color:black;">
                      <option value="" selected>Material Type</option>
                      <option value="Flower">Flower</option>
                      <option value="Trim">Trim</option>
                    </select>
                  </span>
    		</div>
  		<?php

      $content .= ob_get_clean();

      endwhile;

      wp_reset_postdata();

      $content .= '</div>';

    endif;

  endif;

	return $content;
}
// Use the field ID set up for the Strains field
add_filter('gform_field_content_1_6','generate_strain_form', 10, 5);


/**
 * Disable Editor
 *
 * @package      EAStarter
 * @author       Bill Erickson
 * @since        1.0.0
 * @license      GPL-2.0+
**/

/**
 * Templates and Page IDs without editor
 *
 */
function ea_disable_editor( $id = false ) {

	$excluded_templates = array(
        'template-home.php',
        'template-contact.php',
        'template-gallery.php',
        'template-menu.php',
        'template-order.php'
	);

	$excluded_ids = array(
	);

	if( empty( $id ) )
		return false;

	$id = intval( $id );
	$template = get_page_template_slug( $id );

	return in_array( $id, $excluded_ids ) || in_array( $template, $excluded_templates );
}

/**
 * Disable Gutenberg by template
 *
 */
function ea_disable_gutenberg( $can_edit, $post_type ) {

	if( ! ( is_admin() && !empty( $_GET['post'] ) ) )
		return $can_edit;

	if( ea_disable_editor( $_GET['post'] ) )
		$can_edit = false;

	return $can_edit;

}
add_filter( 'gutenberg_can_edit_post_type', 'ea_disable_gutenberg', 10, 2 );
add_filter( 'use_block_editor_for_post_type', 'ea_disable_gutenberg', 10, 2 );

function bitlore_remove_editor_from_some_pages()
{
    global $post;

    if( ! is_a($post, 'WP_Post') ) {
        return;
    }


    /* basename is used for templates that are in the subdirectory of the theme */
    $current_page_template_slug = basename( get_page_template_slug($post_id) );

    /* file names of templates to remove the editor on */
    $excluded_template_slugs = array(
        'template-home.php',
        'template-contact.php',
        'template-gallery.php',
        'template-menu.php',
        'template-order.php'
    );

    if( in_array($current_page_template_slug, $excluded_template_slugs) ) {
        /* remove editor from pages */
        remove_post_type_support('page', 'editor');
        /* if needed, add posts or CPTs to remove the editor on */
        // remove_post_type_support('post', 'editor');
        // remove_post_type_support('movies', 'editor');
    }

}

add_action('admin_enqueue_scripts', 'bitlore_remove_editor_from_some_pages');
