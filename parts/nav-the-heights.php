<?php
/**
 * Custom Navigation for The Heights
 *
 * For more info: http://jointswp.com/docs/off-canvas-menu/
 */
?>

<nav class="navigation">
	<div class="grid-x grid-padding-x">
		<div class="cell small-12 medium-3">
			<a href="<?php echo home_url(); ?>"><?php the_custom_logo(); ?></a>
		</div>
		<div class="cell display-flex align-center justify-end small-12 medium-9">
			<?php joints_top_nav(); ?>
		</div>
	</div>
</nav>
