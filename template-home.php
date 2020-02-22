<?php
/*
Template Name: Homepage
*/
$main_img = get_field('main_image')['url'];
$content_title = get_field('content_title');
$content = get_field('content');

get_header(); ?>

	<div class="content-wrap">
		<?php if($main_img) { ?>
			<section class="main-image bg-image grid-x no-max grid-padding-x" style="background-image: url(<?php echo $main_img; ?>);"></section>
		<?php } ?>
		<?php if($content) { ?>
			<section class="section-padding home-content grid-x grid-padding-x">
				<div class="cell small-12 text-center row-bottom-padding">
					<h3><?php echo $content_title; ?></h3>
					<?php echo $content; ?>
				</div>
			</section>
		<?php  } ?>

	</div> <!-- end content-wrap -->

<?php get_footer(); ?>
