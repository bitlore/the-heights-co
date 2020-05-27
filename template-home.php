<?php
/*
Template Name: Homepage
*/
$main_img = get_field('main_image')['url'];
$bg_size = get_field('background_size');
$bg_position = get_field('background_position');
$content_title = get_field('content_title');
$content = get_field('content');

get_header(); ?>

	<div class="content-wrap">
		<?php if($main_img) { ?>
			<section class="main-image bg-image grid-x no-max grid-padding-x" style="background-image: url(<?php echo $main_img; ?>); background-size: <?php echo $bg_size; ?>; background-position: <?php echo $bg_position; ?>;"></section>
		<?php } ?>
		<?php if($content || $content_title) { ?>
			<section class="section-padding home-content grid-x grid-padding-x">
				<div class="cell small-12 text-center row-bottom-padding">
					<?php if($content_title) { ?>
						<h2><?php echo $content_title; ?></h2>
					<?php  } ?>
					<?php echo $content; ?>
				</div>
			</section>
		<?php } ?>
	</div> <!-- end content-wrap -->

<?php get_footer(); ?>
