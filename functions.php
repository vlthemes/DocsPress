<?php

/**
 * @author: VLThemes
 * @version: @@version
 */

define( 'DOCSPRESS_THEME_DIRECTORY', trailingslashit( get_template_directory_uri() ) );
define( 'DOCSPRESS_REQUIRE_DIRECTORY', trailingslashit( get_template_directory() ) );
define( 'DOCSPRESS_DEVELOPMENT', false );

/**
 * After setup theme
 */
if ( ! function_exists( 'docspress_setup' ) ) {
	function docspress_setup() {

		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Docs, use a find and replace
		 * to change '@@textdomain' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( '@@textdomain', get_template_directory() . '/languages' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1920, 9999 );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style-editor.css' );

		// Add custom editor font sizes.
		add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name' => esc_html__( 'Small', '@@textdomain' ),
					'shortName' => esc_html__( 'S', '@@textdomain' ),
					'size' => 14,
					'slug' => 'small',
				),
				array(
					'name' => esc_html__( 'Normal', '@@textdomain' ),
					'shortName' => esc_html__( 'M', '@@textdomain' ),
					'size' => 16,
					'slug' => 'normal',
				),
				array(
					'name' => esc_html__( 'Large', '@@textdomain' ),
					'shortName' => esc_html__( 'L', '@@textdomain' ),
					'size' => 22,
					'slug' => 'large',
				),
				array(
					'name' => esc_html__( 'Huge', '@@textdomain' ),
					'shortName' => esc_html__( 'XL', '@@textdomain' ),
					'size' => 34,
					'slug' => 'huge',
				),
			)
		);

		// Editor color palette.
		add_theme_support( 'editor-color-palette', array(
			array(
				'name' => esc_html__( 'First', '@@textdomain' ),
				'slug' => 'first',
				'color' => docspress_get_theme_mod( 'accent_colors' )[ 'first' ],
			),
			array(
				'name' => esc_html__( 'Second', '@@textdomain' ),
				'slug' => 'second',
				'color' => docspress_get_theme_mod( 'accent_colors' )[ 'second' ],
			),
			array(
				'name' => esc_html__( 'Success', '@@textdomain' ),
				'slug' => 'success',
				'color' => '#3acb74'
			),
			array(
				'name' => esc_html__( 'Warning', '@@textdomain' ),
				'slug' => 'warning',
				'color' => '#e67c30'
			),
			array(
				'name' => esc_html__( 'Danger', '@@textdomain' ),
				'slug' => 'danger',
				'color' => '#e74f42'
			),
			array(
				'name' => esc_html__( 'Gray', '@@textdomain' ),
				'slug' => 'gray',
				'color' => '#eeeeee',
			)
		) );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// register nav menus
		register_nav_menus( array(
			'primary-menu' => esc_html__( 'Primary Menu', '@@textdomain' ),
		) );

		// thumbnail
		add_image_size( 'docs-thumbnail', 80 );

		// 950x633
		add_image_size( 'docs-950x633_crop', 950, 633, true );

	}
}
add_action( 'after_setup_theme', 'docspress_setup' );

/**
 * Content width
 */
if ( ! function_exists( 'docspress_content_width' ) ) {
	function docspress_content_width() {
		$GLOBALS[ 'content_width' ] = apply_filters( 'docs/content_width', 1140 );
	}
}
add_action( 'after_setup_theme', 'docspress_content_width', 0 );


/**
 * Import ACF fields
 */
if ( ! DOCSPRESS_DEVELOPMENT ) {
	function docspress_acf_show_admin_panel() {
		return apply_filters( 'docspress/acf_show_admin_panel', false );
	}
	add_filter( 'acf/settings/show_admin', 'docspress_acf_show_admin_panel' );
}

if ( ! DOCSPRESS_DEVELOPMENT ) {
	require_once DOCSPRESS_REQUIRE_DIRECTORY . 'inc/helper/custom-fields/custom-fields.php';
}

if ( ! function_exists( 'docspress_acf_save_json' ) ) {
	function docspress_acf_save_json( $path ) {
		$path = DOCSPRESS_REQUIRE_DIRECTORY . 'inc/helper/custom-fields';
		return $path;
	}
}
add_filter( 'acf/settings/save_json', 'docspress_acf_save_json' );

if ( DOCSPRESS_DEVELOPMENT ) {
	if ( ! function_exists( 'docspress_acf_load_json' ) ) {
		function docspress_acf_load_json( $paths ) {
			unset( $paths[0] );
			$paths[] = DOCSPRESS_REQUIRE_DIRECTORY . 'inc/helper/custom-fields';
			return $paths;
		}
	}
	add_filter( 'acf/settings/load_json', 'docspress_acf_load_json' );
}

/**
 * Include Kirki fields
 */
require_once DOCSPRESS_REQUIRE_DIRECTORY . 'inc/framework/customizer-helper.php';
require_once DOCSPRESS_REQUIRE_DIRECTORY . 'inc/framework/customizer.php';
require_once DOCSPRESS_REQUIRE_DIRECTORY . 'inc/framework/customizer-dynamic-css.php';

/**
 * Required files
 */
$docspress_theme_includes = array(
	'required-plugins',
	'enqueue',
	'includes',
	'functions',
	'actions',
	'filters',
	'menus'
);

foreach ( $docspress_theme_includes as $file ) {
	require_once DOCSPRESS_REQUIRE_DIRECTORY . 'inc/theme-' . $file . '.php';
}