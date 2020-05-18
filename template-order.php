<?php
/*
Template Name: Order
*/

get_header(); ?>

<div class="content-wrap">

	<section class="grid-x grid-padding-x section-padding">
		<div class="cell small-12">

			<div class="form-wrapper">
				<?php gravity_form( 'Order', true, false, false, $ajax = true ); ?>
			</div>

		</div>
	</section>



</div> <!-- end content-wrap -->

<?php get_footer(); ?>
