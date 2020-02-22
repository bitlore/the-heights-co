<?php
/**
 * The template for displaying the header
 *
 * This is the template that displays all of the <head> section
 *
 */
?>

<!doctype html>

  <html class="no-js"  <?php language_attributes(); ?>>

	<head>
		<meta charset="utf-8">

		<!-- Force IE to use the latest rendering engine available -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<!-- Mobile Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta class="foundation-mq">

		<!-- If Site Icon isn't set in customizer -->
		<?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) { ?>
			<!-- Icons & Favicons -->
			<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.svg">
			<link href="<?php echo get_template_directory_uri(); ?>/assets/images/apple-icon-touch.png" rel="apple-touch-icon" />
	    <?php } ?>

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php wp_head(); ?>

	</head>

	<body <?php body_class(); ?>>

		<div class="off-canvas-wrapper">

			<div class="off-canvas-content" data-off-canvas-content>

				<header class="header" role="banner">
                    <div class="header-top grid-x grid-padding-x section-padding">
                		<div class="cell small-12 align-center justify-center display-flex head-wrap">
                            <p class="header-text"><?php echo get_field('header_left_text', 'option'); ?></p>
                            <a class="image-link logo-link" href="<?php echo home_url(); ?>">
                                <img class="custom-logo" src="<?php echo get_field('header_logo', 'option')['url']; ?>" alt="The Heights Co. Logo">
                            </a>
                            <p class="header-text"><?php echo get_field('header_right_text', 'option'); ?></p>
                		</div>
                	</div>
					 <?php get_template_part( 'parts/nav', 'the-heights' ); ?>

				</header> <!-- end .header -->
