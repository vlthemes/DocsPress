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
	'section' => 'section_knowbase_options',
	'label' => esc_html__( 'Category Title', '@@textdomain' ),
	'priority' => $priority++,
	'default' => '',
) );

VLT_Options::add_field( array(
	'type' => 'number',
	'settings' => 'knowbase_category_count',
	'section' => 'section_knowbase_options',
	'label' => esc_html__( 'Number of Categories', '@@textdomain' ),
	'priority' => $priority++,
	'choices' => [
		'min' => 1,
		'max' => 999,
		'step' => 1,
	],
	'default' => 3,
) );