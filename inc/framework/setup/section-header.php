<?php

/**
 * @author: VLThemes
 * @version: @@version
 */

$priority = 0;

/**
 * Header options
 */
VLT_Options::add_field( array(
	'type' => 'image',
	'settings' => 'header_logo',
	'section' => 'section_header_options',
	'label' => esc_html__( 'Logo', '@@textdomain' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => $theme_path_images . 'logo.svg',
) );

VLT_Options::add_field( array(
	'type' => 'url',
	'settings' => 'portfolio_link',
	'section' => 'section_header_options',
	'label' => esc_html__( 'Link to Portfolio', '@@textdomain' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => '',
) );