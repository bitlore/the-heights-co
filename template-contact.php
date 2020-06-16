<?php
/*
Template Name: Contact
*/

get_header(); ?>

<div class="content-wrap">

	<section class="section-bottom-padding">
		<div class="section-padding contact-top grid-x grid-padding-x" style="background-image:url('<?php echo get_field('top_bg')['url']; ?>')">
			<div class="form cell small-12 medium-6 display-flex direction-column justify-center">
				<div class="form-wrapper">
					<h1><?php echo get_field('form_headline'); ?></h1>
					<?php echo get_field('contact_form_shortcode'); ?>
				</div>
			</div>
			<div class="contact-info cell small-12 medium-6 display-flex direction-column align-center">
				<?php if(!empty(get_field('contact_info_headline'))) { ?>
				<h3><?php echo get_field('contact_info_headline'); ?></h3>
			    <?php } ?>
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

	<script type="text/javascript">
            var locationsArray = [];
     </script>

	<section class="section-padding map-section">
		<div class="grid-x grid-padding-x section-bottom-padding">
			<div class="cell locations small-12 medium-4 display-flex direction-column justify-between">
				<h3><?php echo get_field('map_headline'); ?></h3>
				<?php if (have_rows('locations')) { ?>
				<div class="locations-wrap">
					<div class="locations-list">
						<?php while(have_rows('locations')) { the_row(); ?>

						  <script type="text/javascript">
	                          var flowerLocation = new Object();
	                          flowerLocation.name = "<?php echo get_sub_field('name'); ?>";
	                          flowerLocation.lat = '<?php echo get_sub_field('latitude'); ?>';
	                          flowerLocation.long = '<?php echo get_sub_field('longitude'); ?>';
	                          locationsArray.push(flowerLocation);
	                      </script>

							<div class="location display-flex align-start">
								<div class="logo">
									<?php if(!empty(get_sub_field('logo'))) { ?>
										<img src="<?php echo get_sub_field('logo')['url']; ?>" alt="Location Logo">
									<?php } else { ?>
										<img src="<?php echo get_template_directory_uri(); ?>/assets/images/map-marker.png" alt="Logo Fallback">
									<?php } ?>
								</div>
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
			<div class="cell small-12 medium-8 map-cell">
				<h3><?php echo get_field('map_headline'); ?></h3>
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
		container: 'map',
		style: 'mapbox://styles/bitlore/ck8tposni0m5k1ip9bojmz03b',
		center: [<?php echo get_field('map_center_longitude'); ?>, <?php echo get_field('map_center_latitude'); ?>], // [lng, lat]
		zoom: <?php echo get_field('map_zoom'); ?>
	});

	map.addControl(new mapboxgl.NavigationControl());
	map.scrollZoom.disable();


    function setMarkers(map, locationsArray) {
        for(var i = 0; i < locationsArray.length; i++) {

            var locLat = locationsArray[i].lat;
            var locLong = locationsArray[i].long;
            var locName = locationsArray[i].name;

            var marker = document.createElement('div');
			var nameTag = document.createElement("p");
			var markerName = document.createTextNode(locName);
			nameTag.appendChild(markerName);
			marker.className = 'marker';
			marker.appendChild(nameTag);

            new mapboxgl.Marker(marker, {offset:[0,0]})
	        .setLngLat([locLong,locLat])
	        .addTo(map);

        }
    }
    setMarkers(map, locationsArray);
</script>

<?php get_footer(); ?>
