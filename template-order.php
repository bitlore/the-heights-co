<?php
/*
Template Name: Order
*/

get_header(); ?>

<div class="content-wrap">

	<section class="grid-x grid-padding-x">

		<div class="cell small-12">

			<?php gravity_form( 'Order', true, false, false, $ajax = true ); ?>

		</div>

	</section>



</div> <!-- end content-wrap -->

<?php get_footer(); ?>
