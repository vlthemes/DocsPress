<?php

/**
 * @author: VLThemes
 * @version: @@version
 */

/**
 * Enqueue assets
 */
if ( ! class_exists( 'DocsThemeEnqueueAssets' ) ) {
	class DocsThemeEnqueueAssets {

		public function __construct() {
			$theme_info = wp_get_theme();
			$this->assets_dir = DOCS_THEME_DIRECTORY . 'assets/';
			$this->customizer_frontend_css = DOCS_THEME_DIRECTORY .'inc/framework/customizer-frontend.css';
			$this->customizer_editor_css = DOCS_THEME_DIRECTORY .'inc/framework/customizer-editor.css';
			$this->theme_version = $theme_info[ 'Version' ];
			$this->init_assets();
		}

		public function init_assets() {
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_frontend_scripts' ) );
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_frontend_styles' ) );
			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_styles' ) );
			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_scripts' ) );
			add_action( 'enqueue_block_editor_assets', array( $this, 'enqueue_gutenberg_formats' ) );
		}

		public function enqueue_gutenberg_formats() {

			// Enqueue gutenberg scripts
			wp_enqueue_style( 'vlt-gutenberg', $this->assets_dir .'css/gutenberg-style.css', [], $this->theme_version );
			wp_enqueue_script( 'vlt-gutenberg-formats', $this->assets_dir .'scripts/gutenberg-formats.js', array( 'wp-rich-text' ), $this->theme_version, true );

		}

		public function enqueue_admin_scripts() {

			// Enqueue admin scripts
			wp_enqueue_script( 'vlt-admin-script', $this->assets_dir .'scripts/admin.js', [ 'jquery' ], $this->theme_version, true );

		}

		public function enqueue_frontend_scripts() {

			if ( is_singular() && comments_open() ) {
				wp_enqueue_script( 'comment-reply' );
			}

			// Enqueue theme scripts
			wp_enqueue_script( 'fitvids', $this->assets_dir .'vendors/js/fitvids.js', [ 'jquery' ], $this->theme_version, true );
			wp_enqueue_script( 'scrollTo', $this->assets_dir .'vendors/js/jquery.scrollTo.js', [ 'jquery' ], $this->theme_version, true );
			wp_enqueue_script( 'superfish', $this->assets_dir .'vendors/js/superfish.js', [ 'jquery' ], $this->theme_version, true );
			wp_enqueue_script( 'superclick', $this->assets_dir .'vendors/js/superclick.js', [ 'jquery' ], $this->theme_version, true );
			wp_enqueue_script( 'fancybox', $this->assets_dir .'vendors/js/jquery.fancybox.js', [ 'jquery' ], $this->theme_version, true );

			// Enqueue theme helper script
			wp_enqueue_script( 'vlt-helpers', $this->assets_dir .'scripts/helpers.js', [ 'jquery' ], $this->theme_version, true );

			// Enqueue controllers
			wp_enqueue_script( 'vlt-controllers', $this->assets_dir .'scripts/controllers.min.js', [ 'jquery' ], $this->theme_version, true );

		}

		public function enqueue_frontend_styles() {

			// Plugins
			wp_enqueue_style( 'fancybox', $this->assets_dir .'vendors/css/jquery.fancybox.css', [], $this->theme_version );

			// FontAwesome
			wp_enqueue_style( 'fontawesome-solid', '//use.fontawesome.com/releases/v5.7.2/css/solid.css', [], $this->theme_version );
			wp_enqueue_style( 'fontawesome-regular', '//use.fontawesome.com/releases/v5.7.2/css/regular.css', [], $this->theme_version );
			wp_enqueue_style( 'fontawesome', '//use.fontawesome.com/releases/v5.7.2/css/fontawesome.css', [], $this->theme_version );

			// Main CSS
			wp_enqueue_style( 'style', get_stylesheet_uri() );
			wp_enqueue_style( 'vlt-main-css', $this->assets_dir .'css/main.css', [], $this->theme_version );

			if ( ! class_exists( 'Kirki' ) ) {
				wp_enqueue_style( 'vlt-customizer-frontend', $this->customizer_frontend_css, [], $this->theme_version );
			}

		}

		public function enqueue_admin_styles() {

			// Admin styles
			wp_enqueue_style( 'vlt-admin-style', $this->assets_dir .'css/admin.css', [], $this->theme_version );

			if ( ! class_exists( 'Kirki' ) ) {
				wp_enqueue_style( 'vlt-customizer-editor', $this->customizer_editor_css, [], $this->theme_version );
			}

		}

	}
	new DocsThemeEnqueueAssets;
}