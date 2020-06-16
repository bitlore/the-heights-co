<?php
/*
Template Name: Order
*/

$bg_desktop = get_field('bg_desktop');
$bg_mobile = get_field('bg_mobile');

get_header(); ?>

<div class="content-wrap">

	<section id="order-form" class="order-form section-bottom-padding" style="background-image:url('<?php echo $bg_desktop['url']; ?>')">
		<div class="grid-x grid-padding-x section-padding">
			<div class="cell small-12 section-padding">

				<div class="form-wrapper section-bottom-padding">
					<?php gravity_form( 'Order', true, false, false, $ajax = true ); ?>
				</div>
			</div>

		</div>
	</section>



</div> <!-- end content-wrap -->

<script type="text/javascript">

var orderSection = document.getElementById('order-form');
var bg_mobile = '<?php echo $bg_mobile['url']; ?>';
var bg_desktop = '<?php echo $bg_desktop['url']; ?>';


function setOrderBg() {
	if(window.innerWidth < 640) {
		orderSection.style.backgroundImage = "url("+ bg_mobile +")";
	} else {
		orderSection.style.backgroundImage = "url("+ bg_desktop +")";
	}
}

setOrderBg();


</script>

<?php get_footer(); ?>
