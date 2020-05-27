<?php
/*
Template Name: Order
*/

get_header(); ?>

<div class="content-wrap">

	<section class="order-form section-bottom-padding">
		<div class="grid-x grid-padding-x section-padding">
			<div class="cell small-12 section-padding">

				<div class="form-wrapper section-bottom-padding">
					<?php gravity_form( 'Order', true, false, false, $ajax = true ); ?>
				</div>

			</div>

		</div>
	</section>



</div> <!-- end content-wrap -->

<?php get_footer(); ?>
