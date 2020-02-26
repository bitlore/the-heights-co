<?php
/**
 * The template for displaying all single strains
 */

get_header(); ?>

<div class="content">

		    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<?php get_template_part( 'parts/content', 'single-strain' ); ?>


		    <?php endwhile; else : ?>

		   		<?php get_template_part( 'parts/content', 'missing' ); ?>

		    <?php endif; ?>


</div> <!-- end #content -->

<?php get_footer(); ?>
