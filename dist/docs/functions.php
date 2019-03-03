<?php

/**
 * @author: VLThemes
 * @version: 1.0.0
 */

define( 'DOCS_THEME_DIRECTORY', trailingslashit( get_template_directory_uri() ) );
define( 'DOCS_REQUIRE_DIRECTORY', trailingslashit( get_template_directory() ) );
define( 'DOCS_DEVELOPMENT', false );

/**
 * After setup theme
 */
if ( ! function_exists( 'docs_setup' ) ) {
	function docs_setup() {

		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Docs, use a find and replace
		 * to change 'docs' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'docs', get_template_directory() . '/languages' );

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
					'name' => esc_html__( 'Small', 'docs' ),
					'shortName' => esc_html__( 'S', 'docs' ),
					'size' => 14,
					'slug' => 'small',
				),
				array(
					'name' => esc_html__( 'Normal', 'docs' ),
					'shortName' => esc_html__( 'M', 'docs' ),
					'size' => 16,
					'slug' => 'normal',
				),
				array(
					'name' => esc_html__( 'Large', 'docs' ),
					'shortName' => esc_html__( 'L', 'docs' ),
					'size' => 22,
					'slug' => 'large',
				),
				array(
					'name' => esc_html__( 'Huge', 'docs' ),
					'shortName' => esc_html__( 'XL', 'docs' ),
					'size' => 34,
					'slug' => 'huge',
				),
			)
		);

		$accent_colors = get_theme_mod( 'accent_colors', array(
			'first' => '#d54e21',
			'second' => '#1e8cbe'
		) );

		// Editor color palette.
		add_theme_support( 'editor-color-palette', array(
			array(
				'name' => esc_html__( 'First', 'docs' ),
				'slug' => 'first',
				'color' => $accent_colors['first'],
			),
			array(
				'name' => esc_html__( 'Second', 'docs' ),
				'slug' => 'second',
				'color' => $accent_colors['second'],
			),
			array(
				'name' => esc_html__( 'Success', 'docs' ),
				'slug' => 'success',
				'color' => '#3acb74'
			),
			array(
				'name' => esc_html__( 'Warning', 'docs' ),
				'slug' => 'warning',
				'color' => '#e67c30'
			),
			array(
				'name' => esc_html__( 'Danger', 'docs' ),
				'slug' => 'danger',
				'color' => '#e74f42'
			),
			array(
				'name' => esc_html__( 'Gray', 'docs' ),
				'slug' => 'gray',
				'color' => '#eeeeee',
			)
		) );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// register nav menus
		register_nav_menus( array(
			'primary-menu' => esc_html__( 'Primary Menu', 'docs' ),
		) );

		// 800x600
		add_image_size( 'docs-830x630_crop', 830, 630, true );

	}
}
add_action( 'after_setup_theme', 'docs_setup' );

/**
 * Content width
 */
if ( ! function_exists( 'docs_content_width' ) ) {
	function docs_content_width() {
		$GLOBALS['content_width'] = apply_filters( 'docs/content_width', 1140 );
	}
}
add_action( 'after_setup_theme', 'docs_content_width', 0 );

/**
 * Include Kirki fields
 */
if ( class_exists( 'Kirki' ) ) {
	require_once DOCS_REQUIRE_DIRECTORY . 'inc/framework/customizer.php';
}

/**
 * Required files
 */
require_once DOCS_REQUIRE_DIRECTORY . 'inc/theme-required-plugins.php';
require_once DOCS_REQUIRE_DIRECTORY . 'inc/theme-enqueue.php';
require_once DOCS_REQUIRE_DIRECTORY . 'inc/theme-includes.php';
require_once DOCS_REQUIRE_DIRECTORY . 'inc/theme-functions.php';
require_once DOCS_REQUIRE_DIRECTORY . 'inc/theme-actions.php';
require_once DOCS_REQUIRE_DIRECTORY . 'inc/theme-filters.php';
require_once DOCS_REQUIRE_DIRECTORY . 'inc/theme-menus.php';