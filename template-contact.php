<?php
/*
Template Name: Contact
*/

get_header(); ?>

<div class="content-wrap">

	<section>
		<div class="section-padding contact-top grid-x grid-padding-x">
			<div class="form cell small-12 medium-6 display-flex direction-column align-center justify-center">
				<div class="form-wrapper">
					<h1><?php echo get_field('form_headline'); ?></h1>
					<?php echo get_field('contact_form_shortcode'); ?>
				</div>
			</div>
			<div class="contact-info cell small-12 medium-6 display-flex direction-column align-center">
				<h3><?php echo get_field('contact_info_headline'); ?></h3>
				<div class="contact-links">
					<?php if(have_rows('contact_items')) { ?>
						<ul>
							<?php while(have_rows('contact_items')) { the_row(); ?>
								<li>
									<img class="contact-icon" src="<?php echo get_sub_field('icon')['url']; ?>" alt="Contact Icon">

									<?php if(have_rows('label')) {
										while(have_rows('label')) { the_row();
											if(get_row_layout() == 'link') { ?>
												<a class="contact-link" href="<?php echo get_sub_field('link')['url']; ?>" target="<?php echo get_sub_field('link')['target']; ?>"><?php echo get_sub_field('link')['title']; ?></a>
											<?php } elseif(get_row_layout() == 'label') { ?>
												<span class="contact-link"><?php echo get_sub_field('label'); ?></span>
											<?php }
										}
									} ?>
								</li>
							<?php } ?>
						</ul>
					<?php } ?>
				</div>
			</div>
		</div>
	</section>

	<?php if(get_field('hide_map_section') === false) { ?>
	<section class="section-padding">
		<div class="grid-x grid-padding-x map-section">
			<div class="cell small-12 medium-4">
				<div class="locations">
					<h3><?php echo get_field('map_headline'); ?></h3>

				</div>
			</div>
			<div class="map cell small-12 medium-8">

			</div>
		</div>
	</section>

	<?php } ?>


</div> <!-- end content-wrap -->

<?php get_footer(); ?>
