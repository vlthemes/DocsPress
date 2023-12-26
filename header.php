<!DOCTYPE html>
<html <?php language_attributes(); ?> class="<?php echo docspress_add_html_class(); ?>" id="top">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
	<link rel="profile" href="//gmpg.org/xfn/11" />
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<meta name="theme-color" content="<?php echo esc_attr( docspress_get_theme_mod( 'mobile_status_bar_color' ) ); ?>">
	<?php wp_head(); ?>
</head>


<body <?php body_class(); ?> data-animsition-style="animsition-<?php echo esc_attr( docspress_get_theme_mod( 'preloader_style' ) ); ?>">

<?php

	do_action( 'docs/before_site' );

	docspress_body_open();

	// Elementor `header` location
	if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'header' ) ) {
		get_template_part( 'template-parts/header/header' );
	}