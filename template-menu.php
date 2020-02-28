<?php
/*
Template Name: Menu
*/


$intro = get_field('intro_copy');
$showPrices = get_field('show_prices_on_front_end');

if($showPrices == 1) {
	$priceStatus = '';
} else {
	$priceStatus = 'prices-hidden';
}

get_header(); ?>

	<div class="content-wrap">

		<?php if($intro) { ?>
			<section class="section-top-padding menu-intro grid-x grid-padding-x">
				<div class="cell small-12 text-center">
					<h3 class="section-title"><span class="left">&#8226;</span> MENU <span class="right">&#8226;</span></h3>
				</div>
				<div class="cell small-12 text-center row-padding">
					<p class="teaser"><?php echo $intro; ?></p>
				</div>
			</section>
		<?php  } ?>

		<?php
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

	    if ( $query->have_posts() ) : ?>
	    	<div class="strains-wrap <?php echo $priceStatus; ?> section-bottom-padding">
				<?php while ( $query->have_posts() ) : $query->the_post(); ?>

					<?php get_template_part( 'parts/content', 'single-strain' ); ?>

				<?php endwhile;

				wp_reset_postdata(); ?>

	    	</div>
		<?php endif; ?>

	</div> <!-- end content-wrap -->

<?php get_footer(); ?>
