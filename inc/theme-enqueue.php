<?php

/**
 * @author: VLThemes
 * @version: @@version
 */

/**
 * Enqueue assets
 */
if ( ! class_exists( 'ThemeEnqueueAssets' ) ) {
	class ThemeEnqueueAssets {

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
			wp_enqueue_style( 'vlt-gutenberg', $this->assets_dir .'css/vlt-gutenberg-style.min.css', array(), $this->theme_version );
			wp_enqueue_script( 'vlt-gutenberg-formats', $this->assets_dir .'scripts/vlt-gutenberg-formats.js', array( 'wp-rich-text' ), $this->theme_version, true );
		}

		public function enqueue_admin_scripts() {
			wp_enqueue_script( 'vlt-admin-script', $this->assets_dir .'scripts/vlt-admin.js', array( 'jquery' ), $this->theme_version, true );
		}

		public function enqueue_frontend_scripts() {
			if ( is_singular() && comments_open() ) {
				wp_enqueue_script( 'comment-reply' );
			}

			// Enqueue theme scripts
			wp_enqueue_script( 'fitvids', $this->assets_dir .'vendors/jquery.fitvids.js', array( 'jquery' ), $this->theme_version, true );
			wp_enqueue_script( 'scrollTo', $this->assets_dir .'vendors/jquery.scrollTo.min.js', array( 'jquery' ), $this->theme_version, true );
			wp_enqueue_script( 'superfish', $this->assets_dir .'vendors/superfish.js', array( 'jquery' ), $this->theme_version, true );
			wp_enqueue_script( 'superclick', $this->assets_dir .'vendors/superclick.min.js', array( 'jquery' ), $this->theme_version, true );
			wp_enqueue_script( 'fastclick', $this->assets_dir .'vendors/fastclick.js', array( 'jquery' ), $this->theme_version, true );
			wp_enqueue_script( 'vars-ponyfill', $this->assets_dir .'vendors/css-vars-ponyfill.min.js', array( 'jquery' ), $this->theme_version, true );
			wp_enqueue_script( 'fancybox', $this->assets_dir .'vendors/jquery.fancybox.min.js', array( 'jquery' ), $this->theme_version, true );

			// Enqueue theme helper script
			wp_enqueue_script( 'vlt-helpers', $this->assets_dir .'scripts/vlt-helpers.js', array( 'jquery' ), $this->theme_version, true );

			// Enqueue controllers
			wp_enqueue_script( 'vlt-controllers', $this->assets_dir .'scripts/vlt-controllers.min.js', array( 'jquery' ), $this->theme_version, true );

		}

		public function enqueue_frontend_styles() {
			wp_enqueue_style( 'style', get_stylesheet_uri() );
			wp_enqueue_style( 'normalize', $this->assets_dir .'css/plugins/normalize.css', array(), $this->theme_version );
			wp_enqueue_style( 'grid', $this->assets_dir .'css/plugins/grid.css', array(), $this->theme_version );
			wp_enqueue_style( 'superfish', $this->assets_dir .'css/plugins/superfish.css', array(), $this->theme_version );
			wp_enqueue_style( 'fancybox', $this->assets_dir .'css/plugins/jquery.fancybox.min.css', array(), $this->theme_version );


			wp_enqueue_style( 'fontawesome-regular', 'https://use.fontawesome.com/releases/v5.7.2/css/regular.css', array(), $this->theme_version );
			wp_enqueue_style( 'fontawesome', 'https://use.fontawesome.com/releases/v5.7.2/css/fontawesome.css', array(), $this->theme_version );





			wp_enqueue_style( 'vlt-style-css', $this->assets_dir .'css/vlt-style.min.css', array(), $this->theme_version );
			if ( ! class_exists( 'Kirki' ) ) {
				wp_enqueue_style( 'vlt-customizer-frontend', $this->customizer_frontend_css, array(), $this->theme_version );
			}
		}

		public function enqueue_admin_styles() {
			wp_enqueue_style( 'vlt-admin-style', $this->assets_dir .'css/vlt-admin.css', array(), $this->theme_version );

			if ( ! class_exists( 'Kirki' ) ) {
				wp_enqueue_style( 'vlt-customizer-editor', $this->customizer_editor_css, array(), $this->theme_version );
			}
		}

	}
	new ThemeEnqueueAssets;
}