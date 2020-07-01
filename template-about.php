<?php
/*
Template Name: About
*/

$main_img = get_field('main_img');
$about_headline = get_field('about_headline');
$about_content = get_field('about_content');
$partner_headline = get_field('partner_headline');
$partner_content = get_field('partner_content');
$partner_gallery = get_field('partner_gallery');


get_header(); ?>

<div class="content-wrap">

	<section class="about-intro section-bottom-padding">
		<?php if(!empty($main_img)) { ?>
			<div class="grid-x grid-padding-x">
				<div class="cell small-12">
					<img class="main-image" src="<?php echo $main_img['url']; ?>" alt="<?php echo $main_img['alt']; ?>">
				</div>
			</div>
		<?php } ?>
		<?php if(!empty($about_content)) { ?>
			<div class="grid-x grid-padding-x section-bottom-padding">
				<div class="cell small-12 text-center">
					<?php if($about_headline) { ?><h2><?php echo $about_headline; ?></h2><?php } ?>
					<?php echo $about_content; ?>
				</div>
			</div>
		<?php } ?>
	</section>
	<section class="partners section-bottom-padding">
		<?php if(!empty($partner_headline)) { ?>
			<div class="grid-x grid-padding-x">
				<div class="cell small-12 text-center">
					<?php if($partner_headline) { ?><h2><?php echo $partner_headline; ?></h2><?php } ?>
					<?php if($partner_content) { ?><p><?php echo $partner_content; ?></p><?php } ?>
				</div>
			</div>
		<?php } ?>
		<?php if(have_rows('partner_gallery')) { ?>
			<div class="gallery-wrap grid-x grid-padding-x display-flex justify-center section-top-padding">
				<?php while(have_rows('partner_gallery')) { the_row();
					$link = get_sub_field('link');
					$logo = get_sub_field('logo'); ?>

					<div class="gallery-item cell text-center small-12 medium-4 large-4 display-flex align-center justify-center">
						<?php if($link) { ?>
							<a href="<?php echo $link; ?>" target="_blank">
								<img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>">
							</a>
						<? } else { ?>
							<img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>">
						<?php } ?>

					</div>
				<?php } ?>
			</div>
		<?php } ?>
	</section>



</div> <!-- end content-wrap -->


<?php get_footer(); ?>
