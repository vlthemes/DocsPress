<?php

/**
 * @author: VLThemes
 * @version: @@version
 */

$priority = 0;

/**
 * Header general
 */
VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'shg_1',
	'section' => 'section_header_general',
	'default' => '<div class="kirki-separator">' . esc_html__( 'General', '@@textdomain' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'navigation_show',
	'section' => 'section_header_general',
	'label' => esc_html__( 'Header Show', '@@textdomain' ),
	'priority' => $priority++,
	'choices' => array(
		'show' => esc_html__( 'Show', '@@textdomain' ),
		'hide' => esc_html__( 'Hide', '@@textdomain' ),
	),
	'default' => 'show',
) );

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'shg_2',
	'section' => 'section_header_general',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Logo', '@@textdomain' ) . '</div>',
	'priority' => $priority++,
	'active_callback' => array(
		array(
			'setting' => 'navigation_show',
			'operator' => '==',
			'value' => 'show',
		),
	),
) );

VLT_Options::add_field( array(
	'type' => 'image',
	'settings' => 'header_logo',
	'section' => 'section_header_general',
	'label' => esc_html__( 'Logo', '@@textdomain' ),
	'priority' => $priority++,
	'default' => '',
	'choices' => [
		'save_as' => 'id'
	],
	'active_callback' => array(
		array(
			'setting' => 'navigation_show',
			'operator' => '==',
			'value' => 'show',
		),
	),
) );

VLT_Options::add_field( array(
	'type' => 'image',
	'settings' => 'header_logo_white',
	'section' => 'section_header_general',
	'label' => esc_html__( 'Logo White', '@@textdomain' ),
	'priority' => $priority++,
	'default' => '',
	'choices' => [
		'save_as' => 'id'
	],
	'active_callback' => array(
		array(
			'setting' => 'navigation_show',
			'operator' => '==',
			'value' => 'show',
		),
	),
) );

VLT_Options::add_field( array(
	'type' => 'dimension',
	'settings' => 'header_logo_height',
	'section' => 'section_header_general',
	'label' => esc_html__( 'Logo Height', '@@textdomain' ),
	'priority' => $priority++,
	'default' => '50px',
	'output' => array(
		array(
			'element' => '.vlt-navbar-logo img',
			'property' => 'height'
		)
	),
	'active_callback' => array(
		array(
			'setting' => 'navigation_show',
			'operator' => '==',
			'value' => 'show',
		),
	),
) );

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'shg_3',
	'section' => 'section_header_general',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Submit Ticket', '@@textdomain' ) . '</div>',
	'priority' => $priority++,
	'active_callback' => array(
		array(
			'setting' => 'navigation_show',
			'operator' => '==',
			'value' => 'show',
		),
	),
) );

VLT_Options::add_field( array(
	'type' => 'dropdown-pages',
	'settings' => 'submit_ticket_link',
	'section' => 'section_header_general',
	'label' => esc_html__( 'Submit Ticket Link', '@@textdomain' ),
	'priority' => $priority++,
	'default' => '',
	'active_callback' => array(
		array(
			'setting' => 'navigation_show',
			'operator' => '==',
			'value' => 'show',
		),
	),
) );

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'shg_4',
	'section' => 'section_header_general',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Info Bar', '@@textdomain' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'editor',
	'settings' => 'info_bar',
	'section' => 'section_header_general',
	'label' => esc_html__( 'Text', '@@textdomain' ),
	'priority' => $priority++,
	'default' => '',
) );

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'shg_5',
	'section' => 'section_header_general',
	'default' => '<div class="kirki-separator">' . esc_html__( 'ADS', '@@textdomain' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'url',
	'settings' => 'ads_link',
	'section' => 'section_header_general',
	'label' => esc_html__( 'Link', '@@textdomain' ),
	'priority' => $priority++,
	'default' => '',
) );

VLT_Options::add_field( array(
	'type' => 'image',
	'settings' => 'ads_banner',
	'section' => 'section_header_general',
	'label' => esc_html__( 'Banner', '@@textdomain' ),
	'priority' => $priority++,
	'default' => '',
	'active_callback' => array(
		array(
			'setting' => 'ads_link',
			'operator' => '!=',
			'value' => ''
		)
	)
) );