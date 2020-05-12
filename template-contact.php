<?php
/*
Template Name: Contact
*/

get_header(); ?>

<div class="content-wrap">

	<section class="section-bottom-padding">
		<div class="section-padding contact-top grid-x grid-padding-x">
			<div class="form cell small-12 medium-6 display-flex direction-column justify-center">
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
	<section class="section-padding map-section">
		<div class="grid-x grid-padding-x section-bottom-padding">
			<div class="cell locations small-12 medium-4 display-flex direction-column justify-between">
				<h3><?php echo get_field('map_headline'); ?></h3>
				<?php if (have_rows('locations')) { ?>
				<div class="locations-wrap">
					<div class="locations-list">
						<?php while(have_rows('locations')) { the_row(); ?>
							<div class="location display-flex align-start">
								<img src="<?php echo get_sub_field('logo')['url']; ?>" alt="Location Logo">
								<div class="location-text">
									<p class="name"><?php echo get_sub_field('name'); ?></p>
									<p><?php echo get_sub_field('address'); ?></p>
								</div>
							</div>
						<?php } ?>
					</div>
				</div>
				<?php } ?>
			</div>
			<div class="map cell small-12 medium-8">
				<div class="map" id="map"></div>
			</div>
		</div>
	</section>

	<?php } ?>


</div> <!-- end content-wrap -->

<script src="https://api.mapbox.com/mapbox-gl-js/v1.10.0/mapbox-gl.js"></script>
<link href="https://api.mapbox.com/mapbox-gl-js/v1.10.0/mapbox-gl.css" rel="stylesheet" />
<script type="text/javascript">
	mapboxgl.accessToken = 'pk.eyJ1IjoiYml0bG9yZSIsImEiOiJjazh0cG5jdzYwMnM1M2xsaTA4MXR6aWZ1In0.zlBIoT6AuSU1qiN0VXYg2g';
	var map = new mapboxgl.Map({
		container: 'map', // container id
		style: 'mapbox://styles/bitlore/ck8tposni0m5k1ip9bojmz03b', // stylesheet location
		center: [-122.658579, 45.518278], // starting position [lng, lat]
		zoom: 12.78 // starting zoom
	});
</script>

<?php get_footer(); ?>
