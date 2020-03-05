<?php
/*
Template Name: Gallery
*/

$images = get_field('images');

get_header(); ?>

	<div class="content-wrap">
		<?php if(have_rows('images')) : ?>
		<section class="section-padding gallery no-max grid-x">
			<?php while(have_rows('images')) : the_row();
				$image = get_sub_field('image');
				$add_link = get_sub_field('add_link');
				$link = get_sub_field('link');

				if($add_link == true) { ?>
					<div class="cell small-12 medium-6 large-4 with-link">
						<div class="gallery-image bg-image" style="background-image: url('<?php echo $image['url']; ?>')">
								<a class="gallery-link display-flex align-center justify-center" href="<?php echo $link['url'];?>">
								<p class="link-text"><?php echo $link['title']; ?></p>
							</a>
						</div>
					</div>

				<?php } else { ?>

					<div class="cell small-12 medium-6 large-4">
						<div class="gallery-image bg-image" style="background-image: url('<?php echo $image['url']; ?>')"></div>
					</div>

				<?php } ?>

			<?php endwhile; ?>
		</section>
		<?php endif; ?>
	</div> <!-- end content-wrap -->

<?php get_footer(); ?>
