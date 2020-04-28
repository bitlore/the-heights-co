<?php 

/**
 * ============================================================================
 * SOREL FORM CODE
 * ============================================================================
 */

/**
 * Displays the product list for My Pull
 */
function sorel_product_list_item($content,$field,$value,$entry_id,$form_id){
	//only filter on the front end
	if(!is_admin() && !$entry_id){
		$content     = '';
		$products    = isset($_COOKIE['sorel_my_pulls']) ? $_COOKIE['sorel_my_pulls'] : false;
		$trash_icon  = file_get_contents(get_stylesheet_directory().'/library/img/svg-icons/icons_trash.svg');
		$placeholder = "Do you need a high res image? Samples? Multiple color ways? Please include all requests here.";

		$content .= '<div class="ginput_container ginput_container_list ginput_list">';

		//decode the json in the cookie
		if(!empty($products = json_decode(stripslashes($products),true))):
		foreach($products as $ID=>$prod_data):
		$product       = get_post($ID);
		$images_colors = get_field('images_colors',$product->ID);
		$color_name    = !empty($images_colors[$prod_data['img_color']]['color_name']) ? $images_colors[$prod_data['img_color']]['color_name'] :
																																					 					 $images_colors[$prod_data['img_color']]['color_main'];
		$color_link    = $prod_data['img_color'] ? '?color_id='.$prod_data['img_color'] : '';

		//get the image
		if(!empty($images_colors[$prod_data['img_color']]['image_grid'])){
			$image = wp_get_attachment_image_src($images_colors[$prod_data['img_color']]['image_grid']['ID'],'shoe_grid_retina');
		}
		else{
			$image = wp_get_attachment_image_src($images_colors[$prod_data['img_color']]['image']['ID'],'shoe_grid_retina');
		}

		//form output
		ob_start();
		?>
		<div class="pull-item gfield_list gfield_list_container gfield_list_group" data-id="<?php echo $product->ID ?>">
			<a href="<?php echo get_site_url().'/'.str_replace('shoes_','',$product->post_type).'/'.$product->post_name.'/'.$color_link ?>" style="background: url('<?php echo $image[0] ?>')"></a>
			<div class="gfield_list_group">
				<span class="gfield_list_cell gfield_list_5_cell1" data-label="product">
					<input type="hidden" name="input_5[]" value="<?php echo $product->post_title ?>"/>
					<?php echo $product->post_title ?>
					<span class="delete" data-id="<?php echo $product->ID ?>"><?php echo $trash_icon ?></span>
				</span>
				<div class="gfield_list_cell gfield_list_5_cell2" data-label="message">
					<textarea name="input_5[]" placeholder="<?php echo $placeholder ?>"></textarea>
				</div>
				<div class="gfield_list_cell gfield_list_5_cell3" data-label="color">
					<input type="hidden" name="input_5[]" value="<?php echo $color_name ?>">
				</div>
			</div>
		</div>
		<?php
		$content .= ob_get_clean();
		endforeach;
		endif;
		$content .= '</div>';
	}

	return $content;
}
add_filter('gform_field_content_1_5','sorel_product_list_item',10,5);

/**
 *
 */
function sorel_form_tag($form_tag,$form){
	//pulls form tag
	if($form['id'] == 1){
		$pulls = isset($_COOKIE['sorel_my_pulls']) ? json_decode(stripslashes($_COOKIE['sorel_my_pulls']),true) : array();
		$pulls = !empty($pulls) ? '' : ' hidden';
		$form_tag = preg_replace("|class='(.*?)'|","class='row contained my-pulls".$pulls."'",$form_tag);
	}

	return $form_tag;
}
add_filter('gform_form_tag','sorel_form_tag',10,2);

?>