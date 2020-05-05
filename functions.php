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

      $content .= '<span style="margin-bottom:1em; font-size: .7em;">Enter the quantity and material type next to any strain you would like to order.</span><br /><br />';

      //strain loop
      while ( $products->have_posts() ) : $products->the_post();

        $name = get_the_title();

        $strain_title = $name . ', ' .  get_field('thc') . ', ' . get_field('harvest_date');

    		//form output
    		ob_start();
    		?>


    		<div class="gfield_list gfield_list_container gfield_list_group" data-id="<?php echo $strain_title; ?>" style="margin-bottom:1em;display: flex;">
                  <span class="gfield_list_cell gfield_list_5_cell1" data-label="strain" style="display:inline-block;min-width:15em;">
                    <input type="text" name="input_6[]" value="<?php echo $name; ?>" readonly="readonly" style="color:white; border:none; background:transparent; pointer-events:none; padding-left: 0; font-weight: bold;">
                    <br />
                    <span style="font-size: .7em;"><?php echo get_field('thc') ?> THC, Harvested <?php echo get_field('harvest_date') ?></span>
                  </span>
    			  <span class="gfield_list_cell gfield_list_5_cell2" data-label="pounds" style="margin:0 1em;">
    				  <input name="input_6[]" type="number" value="" min="0" style="width:4em;color:black;"/>
                      <label for="lb">lb(s)</label>
    			  </span>
                  <span class="gfield_list_cell gfield_list_5_cell3" data-label="material" style="margin:0 1em;">
                    <select name="input_6[]" style="width:8em;color:black;">
                      <option value="" selected>Material Type</option>
                      <option value="A Buds">Flower - A Buds</option>
                      <option value="B Buds">Flower - B Buds</option>
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


// add_action( 'gform_pre_submission_1', 'order_form_pre_submission' );
// function order_form_pre_submission($form) {
//   echo var_dump($form);
// }

//clear strains input
// add_action( 'gform_after_submission_1', 'remove_form_entry' );
function remove_form_entry( $entry ) {
    // $list_values = unserialize( rgar( $entry, '14' ) );
    // echo var_dump($list_values);
    // GFAPI::delete_entry( $entry['14'] );

    gform_delete_meta( 14, 'Strains' );
}


// add_filter( 'gform_confirmation_1', 'gravityforms_custom_confirmation', 10, 4 );
// function gravityforms_custom_confirmation( $confirmation, $form, $entry, $ajax ) {
//   //intentionally do nothing
// }

// add_action( 'gform_entry_detail_content_before', 'remove_cached_order_fields', 10, 2);
// function remove_cached_order_fields( $form, $entry ) {
//     $use_choice_text = false;
//     $use_admin_label = false;
//     gform_delete_meta( $entry['14'], "gform_product_info_{$use_choice_text}_{$use_admin_label}" );
// };


// Allow the Gravity form to stay on the page when confirmation displays.
// add_filter( 'gform_pre_submission_filter', 'dw_show_confirmation_and_form' );
// function dw_show_confirmation_and_form( $form ) {
// 	$shortcode = '[gravityform id="' . $form['id'] . '" title="true" description="false"]';
//
// 	if ( array_key_exists( 'confirmations', $form ) ) {
// 		foreach ( $form['confirmations'] as $key => $confirmation ) {
// 			$form['confirmations'][ $key ]['message'] = $shortcode . '<div class="confirmation-message">' . $form['confirmations'][ $key ]['message'] . '</div>';
// 		}
// 	}
//
// 	return $form;
// }
