<?php

/**
 * @author: VLThemes
 * @version: 1.0.0
 */

$theme_path_images = DOCS_THEME_DIRECTORY . 'assets/img/';

/**
* Add config
*/
Kirki::add_config( 'docs_customizer', array(
	'capability' => 'edit_theme_options',
	'option_type' => 'theme_mod',
) );

$first_level = 10;
$second_level = 10;

/**
 * General
 */
Kirki::add_panel( 'panel_core', array(
	'title' => esc_html__( 'Global Options', 'docs' ),
	'priority' => $first_level++,
	'icon' => 'dashicons-admin-generic',
) );

Kirki::add_section( 'core_general', array(
	'panel' => 'panel_core',
	'title' => esc_html__( 'General Options', 'docs' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-admin-generic',
) );

Kirki::add_section( 'core_selection', array(
	'panel' => 'panel_core',
	'title' => esc_html__( 'Selection', 'docs' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-editor-underline',
) );

Kirki::add_section( 'core_scrollbar', array(
	'panel' => 'panel_core',
	'title' => esc_html__( 'Scrollbar', 'docs' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-sort',
) );

Kirki::add_section( 'core_login_logo', array(
	'panel' => 'panel_core',
	'title' => esc_html__( 'Login Page', 'docs' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-lock',
) );

require_once DOCS_REQUIRE_DIRECTORY . 'inc/framework/setup/section-core.php';

/**
 * Header
 */
Kirki::add_section( 'section_header_options', array(
	'title' => esc_html__( 'Header Options', 'docs' ),
	'priority' => $first_level++,
	'icon' => 'dashicons-arrow-up-alt',
) );

require_once DOCS_REQUIRE_DIRECTORY . 'inc/framework/setup/section-header.php';

/**
 * Footer
 */
Kirki::add_section( 'section_footer_options', array(
	'title' => esc_html__( 'Footer Options', 'docs' ),
	'priority' => $first_level++,
	'icon' => 'dashicons-arrow-down-alt',
) );

require_once DOCS_REQUIRE_DIRECTORY . 'inc/framework/setup/section-footer.php';