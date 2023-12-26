<?php

/**
 * @author: VLThemes
 * @version: @@version
 */

$priority = 0;

/**
 * Knowbase options
 */
VLT_Options::add_field( array(
	'type' => 'text',
	'settings' => 'knowbase_category_title',
	'section' => 'section_knowbase',
	'label' => esc_html__( 'Category Title', '@@textdomain' ),
	'priority' => $priority++,
	'default' => '',
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'knowbase_search_form',
	'section' => 'section_knowbase',
	'label' => esc_html__( 'Search Form', '@@textdomain' ),
	'priority' => $priority++,
	'choices' => array(
		'show' => esc_html__( 'Show', '@@textdomain' ),
		'hide' => esc_html__( 'Hide', '@@textdomain' )
	),
	'default' => 'show',
) );

VLT_Options::add_field( array(
	'type' => 'number',
	'settings' => 'knowbase_category_count',
	'section' => 'section_knowbase',
	'label' => esc_html__( 'Number of Categories', '@@textdomain' ),
	'priority' => $priority++,
	'choices' => [
		'min' => 1,
		'max' => 999,
		'step' => 1,
	],
	'default' => 3,
) );

/**
 * Docs
 */
VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'show_share_docs',
	'section' => 'section_docs',
	'label' => esc_html__( 'Doc Share', '@@textdomain' ),
	'priority' => $priority++,
	'choices' => array(
		'show' => esc_html__( 'Show', '@@textdomain' ),
		'hide' => esc_html__( 'Hide', '@@textdomain' )
	),
	'default' => 'hide',
) );

/**
 * Changelog
 */
VLT_Options::add_field( array(
	'type' => 'text',
	'settings' => 'changelog_title',
	'section' => 'section_changelog',
	'label' => esc_html__( 'Page Title', '@@textdomain' ),
	'priority' => $priority++,
	'default' => esc_html__( 'Changelogs', '@@textdomain' ),
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'changelog_search_form',
	'section' => 'section_changelog',
	'label' => esc_html__( 'Search Form', '@@textdomain' ),
	'priority' => $priority++,
	'choices' => array(
		'show' => esc_html__( 'Show', '@@textdomain' ),
		'hide' => esc_html__( 'Hide', '@@textdomain' )
	),
	'default' => 'show',
) );