<?php
/**
 * The template for displaying all single posts and attachments
 */

get_header(); ?>

<div class="content">

	<div class="inner-content grid-x grid-margin-x grid-padding-x">

		<main class="main small-12 cell" role="main">

		    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		    	<section class="single-strain text-center">
					<h3><?php echo the_title(); ?></h3>
		    	</section>

		    <?php endwhile; else : ?>

		   		<?php get_template_part( 'parts/content', 'missing' ); ?>

		    <?php endif; ?>

		</main> <!-- end #main -->

	</div> <!-- end #inner-content -->

</div> <!-- end #content -->

<?php get_footer(); ?>
