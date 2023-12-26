<?php

/**
 * @author: VLThemes
 * @version: @@version
 */

$theme_path_images = DOCSPRESS_THEME_DIRECTORY . 'assets/img/';

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

VLT_Options::add_section( 'core_night_mode', array(
	'panel' => 'panel_core',
	'title' => esc_html__( 'Night Mode', '@@textdomain' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-art',
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

VLT_Options::add_section( 'core_sidebars', array(
	'panel' => 'panel_core',
	'title' => esc_html__( 'Custom Sidebars', '@@textdomain' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-format-aside',
) );

VLT_Options::add_section( 'core_login_logo', array(
	'panel' => 'panel_core',
	'title' => esc_html__( 'Login Page', '@@textdomain' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-lock',
) );

require_once DOCSPRESS_REQUIRE_DIRECTORY . 'inc/framework/setup/section-core.php';

/**
 * Header
 */
VLT_Options::add_section( 'section_header_general', array(
	'title' => esc_html__( 'Header Options', '@@textdomain' ),
	'priority' => $first_level++,
	'icon' => 'dashicons-arrow-up-alt',
) );

require_once DOCSPRESS_REQUIRE_DIRECTORY . 'inc/framework/setup/section-header.php';

/**
 * Footer
 */
VLT_Options::add_section( 'section_footer_general', array(
	'title' => esc_html__( 'Footer Options', '@@textdomain' ),
	'priority' => $first_level++,
	'icon' => 'dashicons-arrow-down-alt',
) );

require_once DOCSPRESS_REQUIRE_DIRECTORY . 'inc/framework/setup/section-footer.php';

/**
 * Pages
 */
VLT_Options::add_panel( 'panel_page', array(
	'title' => esc_html__( 'Page Options', '@@textdomain' ),
	'priority' => $first_level++,
	'icon' => 'dashicons-admin-page',
) );

VLT_Options::add_section( 'section_knowbase', array(
	'panel' => 'panel_page',
	'title' => esc_html__( 'Knowbase', '@@textdomain' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-media-document',
) );

VLT_Options::add_section( 'section_changelog', array(
	'panel' => 'panel_page',
	'title' => esc_html__( 'Changelog', '@@textdomain' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-media-document',
) );

VLT_Options::add_section( 'section_docs', array(
	'panel' => 'panel_page',
	'title' => esc_html__( 'Documentation', '@@textdomain' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-media-document',
) );

require_once DOCSPRESS_REQUIRE_DIRECTORY . 'inc/framework/setup/section-pages.php';

/**
 * Typography
 */
VLT_Options::add_panel( 'panel_typography', array(
	'title' => esc_html__( 'Typography Options', '@@textdomain' ),
	'priority' => $first_level++,
	'icon' => 'dashicons-editor-bold',
) );

VLT_Options::add_section( 'typography_fonts', array(
	'panel' => 'panel_typography',
	'title' => esc_html__( 'General Fonts', '@@textdomain' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-editor-bold',
) );

VLT_Options::add_section( 'typography_text', array(
	'panel' => 'panel_typography',
	'title' => esc_html__( 'Text Options', '@@textdomain' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-text',
) );

VLT_Options::add_section( 'typography_headings', array(
	'panel' => 'panel_typography',
	'title' => esc_html__( 'Heading Options', '@@textdomain' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-editor-textcolor',
) );

VLT_Options::add_section( 'typography_buttons', array(
	'panel' => 'panel_typography',
	'title' => esc_html__( 'Button Options', '@@textdomain' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-admin-links',
) );

VLT_Options::add_section( 'typography_input', array(
	'panel' => 'panel_typography',
	'title' => esc_html__( 'Input Options', '@@textdomain' ),
	'priority' => $second_level++,
	'icon' => 'dashicons-edit',
) );

require_once DOCSPRESS_REQUIRE_DIRECTORY . 'inc/framework/setup/section-typography.php';

/**
 * Advanced
 */
VLT_Options::add_section( 'section_advanced', array(
	'title' => esc_html__( 'Advanced', '@@textdomain' ),
	'priority' => 9999,
	'icon' => 'dashicons-star-filled',
) );

require_once DOCSPRESS_REQUIRE_DIRECTORY . 'inc/framework/setup/section-advanced.php';