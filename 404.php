<?php
/**
 * The template for displaying 404 (page not found) pages.
 *
 * For more info: https://codex.wordpress.org/Creating_an_Error_404_Page
 */

get_header(); ?>

	<div class="content">

		<div class="inner-content grid-x grid-margin-x grid-padding-x">

			<main class="main small-12 cell" role="main">

				<article class="section-padding content-not-found">

					<header class="text-center article-header">
						<h2><?php _e( 'Epic 404', 'jointswp' ); ?></h2>
					</header> <!-- end article header -->

					<section class="text-center entry-content">
						<p><?php _e( 'Whoops - the page you were looking for doesn\'t exist at these Heights. Try again?', 'jointswp' ); ?></p>
					</section> <!-- end article section -->


				</article> <!-- end article -->

			</main> <!-- end #main -->

		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

<?php get_footer(); ?>
