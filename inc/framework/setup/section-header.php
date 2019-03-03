<?php

/**
 * @author: VLThemes
 * @version: @@version
 */

$priority = 0;

/**
 * Header options
 */
Kirki::add_field( 'docs_customizer', array(
	'type' => 'text',
	'settings' => 'portfolio_link',
	'section' => 'section_header_options',
	'label' => esc_html__( 'Link to Portfolio', '@@textdomain' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => '',
) );