<?php

/**
 * @author: VLThemes
 * @version: 1.0.0
 */

$priority = 0;

/**
 * Header options
 */
Kirki::add_field( 'docs_customizer', array(
	'type' => 'text',
	'settings' => 'portfolio_link',
	'section' => 'section_header_options',
	'label' => esc_html__( 'Link to Portfolio', 'docs' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => '',
) );