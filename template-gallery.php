<?php
/*
Template Name: Gallery
*/

$images = get_field('images');

get_header(); ?>

	<div class="content-wrap">
		<?php if(have_rows('images')) : ?>
		<section class="section-padding gallery-page no-max grid-x">
			<?php while(have_rows('images')) : the_row();
				$image = get_sub_field('image');
				$add_caption = get_sub_field('add_caption');


				if($add_caption == 'caption_with_link') {

					$link = get_sub_field('link'); ?>

					<div class="cell small-12 medium-6 large-4 with-link">
						<div class="gallery-image" style="background-image: url('<?php echo $image['url']; ?>')">
								<a class="gallery-link display-flex direction-column align-center justify-center" href="<?php echo $link['url'];?>" target="<?php echo $link['target']; ?>">
									<p class="link-text"><?php echo $link['title']; ?></p>
									<img class="link-icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-link.png" alt="Link Icon">
							</a>
						</div>
					</div>

				<?php } else if($add_caption == 'caption_only') {

						$caption = get_sub_field('caption'); ?>

						<div class="cell small-12 medium-6 large-4 with-link">
							<div class="gallery-image" style="background-image: url('<?php echo $image['url']; ?>')">
									<span class="gallery-link display-flex direction-column align-center justify-center">
										<p class="link-text"><?php echo $caption ?></p>
								</span>
							</div>
						</div>

				<?php } else { ?>

					<div class="cell small-12 medium-6 large-4">
						<div class="gallery-image" style="background-image: url('<?php echo $image['url']; ?>')"></div>
					</div>

				<?php } ?>

			<?php endwhile; ?>
		</section>
		<?php endif; ?>
	</div> <!-- end content-wrap -->

<?php get_footer(); ?>
