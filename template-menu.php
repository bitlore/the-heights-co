<?php
/*
Template Name: Menu
*/


$intro = get_field('intro_copy');
$intro_headline = get_field('intro_headline');
$coming_soon_headline = get_field('coming_soon_headline');

get_header(); ?>

	<div class="content-wrap section-padding">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<section class="section-top-padding menu-intro grid-x grid-padding-x">
			<?php if(!empty($intro_headline)) { ?>
				<div class="cell small-12 text-center">
						<h3 class="section-title"><span class="left">&#8226;</span> <?php echo $intro_headline; ?> <span class="right">&#8226;</span></h3>
				</div>
			<?php } ?>
			<?php if(!empty($intro)) { ?>
			<div class="cell small-12 text-center row-padding">
				<p class="teaser"><?php echo $intro; ?></p>
			</div>
			<?php } ?>
		</section>


		<?php

		$availArgs = array(
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

		$soldOutArgs = array(
	        'post_type' => 'strains',
	        'post_status' => 'publish',
	        'posts_per_page' => -1,
	        'orderby' => 'title',
	        'order' => 'ASC',
			'meta_query' => array(
			    array(
			        'key' => 'available',
			        'value' => 'no'
			    )
			)
	    );

		$comingSoonArgs = array(
	        'post_type' => 'strains',
	        'post_status' => 'publish',
	        'posts_per_page' => -1,
	        'orderby' => 'title',
	        'order' => 'ASC',
			'meta_query' => array(
			    array(
			        'key' => 'available',
			        'value' => 'coming_soon'
			    )
			)
	    );

	    $availQuery = new WP_Query( $availArgs ); ?>

		<?php if ( $availQuery->have_posts() ) : ?>
			<?php while ( $availQuery->have_posts() ) : $availQuery->the_post(); ?>

				<?php get_template_part( 'parts/content', 'single-strain' ); ?>

			<?php endwhile;
			wp_reset_postdata(); ?>
		<?php endif; ?>

		<?php $soldOutQuery = new WP_Query($soldOutArgs);

		if(get_field('show_sold_out_strains', 'option') == true) { ?>
			<?php if ( $soldOutQuery->have_posts() ) : ?>
				<?php while ( $soldOutQuery->have_posts() ) : $soldOutQuery->the_post(); ?>

						<?php get_template_part( 'parts/content', 'single-strain' ); ?>

				<?php endwhile;
				wp_reset_postdata(); ?>
			<?php endif;
		 } ?>

		<?php $comingSoonQuery = new WP_Query($comingSoonArgs);
		if ( $comingSoonQuery->have_posts() ) : ?>
			<section class="section-top-padding menu-intro grid-x grid-padding-x">
				<?php if(!empty($coming_soon_headline)) { ?>
					<div class="cell small-12 text-center section-top-padding">
							<h3 class="section-title"><span class="left">&#8226;</span> <?php echo $coming_soon_headline; ?> <span class="right">&#8226;</span></h3>
					</div>
				<?php } ?>
			</section>

			<?php while ( $comingSoonQuery->have_posts() ) : $comingSoonQuery->the_post(); ?>

				<?php get_template_part( 'parts/content', 'single-strain-soon' ); ?>

			<?php endwhile;
			wp_reset_postdata(); ?>
		<?php endif; ?>

<?php endwhile; endif; ?>

	</div> <!-- end content-wrap -->

<?php get_footer(); ?>
