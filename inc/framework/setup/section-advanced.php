<?php

/**
 * @author: VLThemes
 * @version: @@version
 */

$priority = 0;

/**
 * Advanced
 */
VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'jquery_in_footer',
	'section' => 'section_advanced',
	'label' => esc_html__( 'Load jQuery in footer', '@@textdomain' ),
	'description' => esc_html__( 'Solves render-blocking issue, however can cause plugin conflicts.', '@@textdomain' ),
	'priority' => $priority++,
	'choices' => array(
		'disable' => esc_html__( 'Disable', '@@textdomain' ),
		'enable' => esc_html__( 'Enable', '@@textdomain' ),
	),
	'default' => 'disable',
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'acf_show_admin_panel',
	'section' => 'section_advanced',
	'label' => esc_html__( 'Show ACF in Admin Panel', '@@textdomain' ),
	'description' => esc_html__( 'This field enable tab for ACF Professional in your dashboard.', '@@textdomain' ),
	'priority' => $priority++,
	'choices' => array(
		'hide' => esc_html__( 'Hide', '@@textdomain' ),
		'show' => esc_html__( 'Show', '@@textdomain' ),
	),
	'default' => 'hide',
) );

VLT_Options::add_field( array(
	'type' => 'color',
	'settings' => 'mobile_status_bar_color',
	'section' => 'section_advanced',
	'label' => esc_html__( 'Mobile Status Bar Colors', '@@textdomain' ),
	'description' => esc_html__( 'Field for address bar or device status bar to match your brand colors.', '@@textdomain' ),
	'priority' => $priority++,
	'default' => '#d54e21',
) );

VLT_Options::add_field( array(
	'type' => 'text',
	'settings' => 'envato_personal_token',
	'section' => 'section_advanced',
	'label' => esc_html__( 'Personal Token', '@@textdomain' ),
	'description' => sprintf( __( 'Please generate a personal API key, <a href="%s" target="_blank">Click Here</a> to know details.', '@@textdomain' ), 'https://build.envato.com/create-token/' ),
	'priority' => $priority++,
	'default' => '',
) );