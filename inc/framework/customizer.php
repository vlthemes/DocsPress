<?php

/**
 * @author: VLThemes
 * @version: @@version
 */

$theme_path_images = DOCS_THEME_DIRECTORY . 'assets/img/';

/**
* Add config
*/
VLT_Options::add_config( array(
	'capability' => 'edit_theme_options',
	'option_type' => 'theme_mod',
) );

$first_level = 10;
$second_level = 10;

/**
 * General
 */
VLT_Options::add_panel( 'panel_core', array(
	'title' => esc_html__( 'Global Options', '@@textdomain' ),
	'priority' => $first_level++,
	'icon' => 'dashicons-admin-generic',
) );

VLT_Options::add_section( 'core_general', array(
	'panel' => 'panel_core',
	'title' => esc_html__( 'General Options', '@@textdomain' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-admin-generic',
) );

VLT_Options::add_section( 'core_selection', array(
	'panel' => 'panel_core',
	'title' => esc_html__( 'Selection', '@@textdomain' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-editor-underline',
) );

VLT_Options::add_section( 'core_scrollbar', array(
	'panel' => 'panel_core',
	'title' => esc_html__( 'Scrollbar', '@@textdomain' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-sort',
) );

VLT_Options::add_section( 'core_login_logo', array(
	'panel' => 'panel_core',
	'title' => esc_html__( 'Login Page', '@@textdomain' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-lock',
) );

require_once DOCS_REQUIRE_DIRECTORY . 'inc/framework/setup/section-core.php';

/**
 * Header
 */
VLT_Options::add_section( 'section_header_options', array(
	'title' => esc_html__( 'Header Options', '@@textdomain' ),
	'priority' => $first_level++,
	'icon' => 'dashicons-arrow-up-alt',
) );

require_once DOCS_REQUIRE_DIRECTORY . 'inc/framework/setup/section-header.php';

/**
 * Footer
 */
VLT_Options::add_section( 'section_footer_options', array(
	'title' => esc_html__( 'Footer Options', '@@textdomain' ),
	'priority' => $first_level++,
	'icon' => 'dashicons-arrow-down-alt',
) );

require_once DOCS_REQUIRE_DIRECTORY . 'inc/framework/setup/section-footer.php';