<?php
/*
Template Name: Order
*/

get_header(); ?>

<div class="content-wrap">

	<section class="grid-x grid-padding-x section-padding">
		<div class="cell small-12">

			<div class="form-wrapper section-bottom-padding">
				<h1>ORDER FORM</h1>
				<?php gravity_form( 'Order', true, false, false, $ajax = true ); ?>
			</div>
			<div class="form-wrapper">
				<h1>SAMPLE REQUEST</h1>
				<?php gravity_form( 'Sample Request', true, false, false, $ajax = true ); ?>
			</div>
		</div>
	</section>



</div> <!-- end content-wrap -->

<?php get_footer(); ?>
