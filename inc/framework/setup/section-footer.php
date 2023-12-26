<?php

/**
 * @author: VLThemes
 * @version: @@version
 */

$priority = 0;

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'sfg_1',
	'section' => 'section_footer_general',
	'default' => '<div class="kirki-separator">' . esc_html__( 'General', '@@textdomain' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'footer_show',
	'section' => 'section_footer_general',
	'label' => esc_html__( 'Footer Show', '@@textdomain' ),
	'priority' => $priority++,
	'choices' => array(
		'show' => esc_html__( 'Show', '@@textdomain' ),
		'hide' => esc_html__( 'Hide', '@@textdomain' ),
	),
	'default' => 'hide',
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'footer_template',
	'section' => 'section_footer_general',
	'label' => esc_html__( 'Footer Template', '@@textdomain' ),
	'priority' => $priority++,
	'choices' => docspress_get_elementor_templates(),
	'active_callback' => array(
		array(
			'setting' => 'footer_show',
			'operator' => '==',
			'value' => 'show'
		),
	)
) );
