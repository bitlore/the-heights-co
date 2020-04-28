<?php
/**
 * The template for displaying all single strains
 */

get_header(); ?>

<div class="content-wrap">

		    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<?php $available = get_field('available');

				if($available == 'coming_soon') { ?>

					<?php get_template_part( 'parts/content', 'single-strain-soon' ); ?>

				<?php } else { ?>

					<?php get_template_part( 'parts/content', 'single-strain' ); ?>

				<?php }?>


		    <?php endwhile; else : ?>

		   		<?php get_template_part( 'parts/content', 'missing' ); ?>

		    <?php endif; ?>


</div> <!-- end #content -->

<?php get_footer(); ?>
