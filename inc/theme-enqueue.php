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
			$this->assets_dir = DOCSPRESS_THEME_DIRECTORY . 'assets/';
			$this->customizer_frontend_css = DOCSPRESS_THEME_DIRECTORY . 'inc/framework/customizer-frontend.css';
			$this->customizer_editor_css = DOCSPRESS_THEME_DIRECTORY . 'inc/framework/customizer-editor.css';
			$this->theme_version = $theme_info[ 'Version' ];
			$this->init_assets();
		}

		public function fonts_url() {
			$fonts_url = '';
			$fonts = [];
			$display = 'swap';
			$fonts[] = 'DM+Sans:wght@400;500;700';

			if ( $fonts ) {
				$fonts_url = add_query_arg( array(
					'family' => implode( '&family=', $fonts ),
					'display' => urlencode( $display )
				), 'https://fonts.googleapis.com/css2?family=' );
			}

			return $fonts_url;
		}

		public function init_assets() {
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_frontend_scripts' ) );
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_frontend_styles' ) );
			add_action( 'wp_default_scripts', array( $this, 'enqueue_default_scripts' ) );
			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_styles' ) );
			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_scripts' ) );
		}

		public function enqueue_default_scripts( $wp_scripts ) {

			if ( is_admin() ) {
				return;
			}

			if ( docspress_get_theme_mod( 'jquery_in_footer' ) == 'disable' ) {
				return;
			}

			$wp_scripts->add_data( 'jquery', 'group', 1 );
			$wp_scripts->add_data( 'jquery-core', 'group', 1 );
			$wp_scripts->add_data( 'jquery-migrate', 'group', 1 );

		}

		public function enqueue_frontend_scripts() {

			if ( is_singular() && comments_open() ) {
				wp_enqueue_script( 'comment-reply' );
			}

			// Enqueue theme scripts
			wp_enqueue_script( 'animsition', $this->assets_dir . 'vendors/js/animsition.js', [ 'jquery' ], $this->theme_version, true );
			wp_enqueue_script( 'fitvids', $this->assets_dir . 'vendors/js/fitvids.js', [ 'jquery' ], $this->theme_version, true );
			wp_enqueue_script( 'gist-simple', $this->assets_dir . 'vendors/js/gist-simple.js', [ 'jquery' ], $this->theme_version, true );
			wp_enqueue_script( 'superfish', $this->assets_dir . 'vendors/js/superfish.js', [ 'jquery' ], $this->theme_version, true );
			wp_enqueue_script( 'superclick', $this->assets_dir . 'vendors/js/superclick.js', [ 'jquery' ], $this->theme_version, true );
			wp_enqueue_script( 'fancybox', $this->assets_dir . 'vendors/js/jquery.fancybox.js', [ 'jquery' ], $this->theme_version, true );
			wp_enqueue_script( 'highlight', $this->assets_dir . 'vendors/js/highlight.pack.js', [ 'jquery' ], $this->theme_version, true );
			wp_enqueue_script( 'popper', $this->assets_dir . 'vendors/js/popper.js', [ 'jquery' ], $this->theme_version, true );
			wp_enqueue_script( 'tippy', $this->assets_dir . 'vendors/js/tippy-bundle.umd.js', [ 'jquery' ], $this->theme_version, true );
			wp_enqueue_script( 'sharer', $this->assets_dir . 'vendors/js/sharer.js', [ 'jquery' ], $this->theme_version, true );
			wp_enqueue_script( 'bootstrap', $this->assets_dir . 'vendors/js/bootstrap.min.js', [ 'jquery' ], $this->theme_version, true );

			// Enqueue theme helper script
			wp_enqueue_script( 'vlt-helpers', $this->assets_dir . 'scripts/helpers.js', [ 'jquery' ], $this->theme_version, true );

			// Enqueue controllers
			wp_enqueue_script( 'vlt-controllers', $this->assets_dir . 'scripts/controllers.min.js', [ 'jquery' ], $this->theme_version, true );

			// Localize the script with new data
			$controllers_datas = [
				'search_loading' => esc_html__( 'Loading...', '@@textdomain' ),
				'search_no_found' => esc_html__( 'No matches found.', '@@textdomain' ),
				'admin_ajax' => admin_url( 'admin-ajax.php' ),
				'nonce' => wp_create_nonce( 'vlt-ajax-nonce' )
			];

			wp_localize_script( 'vlt-controllers', 'VLT_LOCALIZE_DATAS', $controllers_datas );

			// Enqueue night mode
			wp_enqueue_script( 'vlt-night-mode', $this->assets_dir . 'scripts/night-mode.js', [ 'jquery' ], $this->theme_version, false );

			$acf_page_night_mode = docspress_get_theme_mod( 'page_custom_night_mode', true );
			$night_mode_datas = [
				'defaultValue' => docspress_get_theme_mod( 'night_mode', $acf_page_night_mode ),
				'useLocalStorage' => $acf_page_night_mode ? false : true
			];

			wp_localize_script( 'vlt-night-mode', 'VLT_NIGHT_MODE', $night_mode_datas );

		}

		public function enqueue_admin_styles() {

			// Admin styles
			wp_enqueue_style( 'vlt-admin-style', $this->assets_dir . 'css/admin.css', [], $this->theme_version );

			if ( ! class_exists( 'Kirki' ) ) {
				wp_enqueue_style( 'vlt-google-fonts-editor', $this->fonts_url(), [], null );
				wp_enqueue_style( 'vlt-customizer-editor', $this->customizer_editor_css, [], $this->theme_version );
			}

		}

		public function enqueue_admin_scripts() {

			// Enqueue admin scripts
			wp_enqueue_script( 'vlt-admin-script', $this->assets_dir . 'scripts/admin.js', [ 'jquery' ], $this->theme_version, true );

		}

		public function enqueue_frontend_styles() {

			// Plugins
			wp_enqueue_style( 'animsition', $this->assets_dir . 'vendors/css/animsition.css', [], $this->theme_version );
			wp_enqueue_style( 'fancybox', $this->assets_dir . 'vendors/css/jquery.fancybox.css', [], $this->theme_version );
			wp_enqueue_style( 'highlight-github-gist', $this->assets_dir . 'vendors/css/github-gist.css', [], $this->theme_version );

			// Icons
			wp_enqueue_style( 'remixicon', $this->assets_dir . 'fonts/remixicon/remixicon.css', [], $this->theme_version );
			wp_enqueue_style( 'socicons', $this->assets_dir . 'fonts/socicons/socicon.css', [], $this->theme_version );

			// Main CSS
			wp_enqueue_style( 'style', get_stylesheet_uri() );
			wp_enqueue_style( 'vlt-main-css', $this->assets_dir . 'css/main.css', [], $this->theme_version );

			if ( ! class_exists( 'Kirki' ) ) {
				wp_enqueue_style( 'vlt-google-fonts-editor', $this->fonts_url(), [], null );
				wp_enqueue_style( 'vlt-customizer-frontend', $this->customizer_frontend_css, [], $this->theme_version );
			}

		}

	}
	new DocsThemeEnqueueAssets;
}