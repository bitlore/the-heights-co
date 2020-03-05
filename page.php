<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 */

get_header(); ?>

	<div class="content-wrap">

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			    	<?php get_template_part( 'parts/loop', 'page' ); ?>

			    <?php endwhile; endif; ?>

	</div> <!-- end #content -->

<?php get_footer(); ?>
