<?php
/*
Template Name: Order
*/

get_header(); ?>

<div class="content-wrap">
	
	<section class="grid-x grid-padding-x">
		
		<div class="cell small-12">
			
			<?php gravity_form( 'Order', true, false, false ); ?>
		
		</div>
		
	</section>
	
	
	<!-- 
	Company Name
	License Type - Checkboxes
	Processor
	Retailer
	Wholesaler
	License Number
	Contact
	Name
	Email
	Phone
	Strain - Taylor to explore possibility of pulling published strains onto form, otherwise list available strains/harvest on the page, above or outside of the form in some way
	Quantity
	Material Type Checkboxes (Flower - A buds, Flower - B buds, Trim)
	Harvest Date (?) - is this something the user chooses or will be static?
	THC % (?)  is this something the user chooses or will be static?
	Notes / additional comments
	-->


</div> <!-- end content-wrap -->

<?php get_footer(); ?>
