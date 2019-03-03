<?php

/**
 * @author: VLThemes
 * @version: @@version
 */

$priority = 0;

/**
 * General
 */
Kirki::add_field( 'docs_customizer', array(
	'type' => 'custom',
	'settings' => 'sg_1',
	'section' => 'core_general',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Body', '@@textdomain' ) . '</div>',
	'priority' => $priority++,
) );

Kirki::add_field( 'docs_customizer', array(
	'type' => 'background',
	'settings' => 'body_background',
	'section' => 'core_general',
	'label' => esc_html__( 'Site Background', '@@textdomain' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => array(
		'background-color' => '#f0f1f3',
		'background-image' => '',
		'background-repeat' => 'repeat',
		'background-position' => 'top left',
		'background-size' => 'auto',
		'background-attachment' => 'fixed',
	),
	'output' => array(
		array(
			'element' => 'body'
		),
	),
) );

Kirki::add_field( 'docs_customizer', array(
	'type' => 'custom',
	'settings' => 'sg_2',
	'section' => 'core_general',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Colors', '@@textdomain' ) . '</div>',
	'priority' => $priority++,
) );

Kirki::add_field( 'docs_customizer', array(
	'type' => 'multicolor',
	'settings' => 'accent_colors',
	'section' => 'core_general',
	'label' => esc_html__( 'Accent Colors', '@@textdomain' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'first' => esc_html__( 'First', '@@textdomain' ),
		'second' => esc_html__( 'Second', '@@textdomain' ),
	),
	'default' => array(
		'first' => '#d54e21',
		'second' => '#1e8cbe',
	),
	'output' => array(
		array(
			'choice' => 'first',
			'element' => ':root',
			'property' => '--p1',
			'context' => array( 'editor', 'front' ),
		),
		array(
			'choice' => 'second',
			'element' => ':root',
			'property' => '--p2',
			'context' => array( 'editor', 'front' ),
		),
	)
) );

Kirki::add_field( 'docs_customizer', array(
	'type' => 'custom',
	'settings' => 'sg_3',
	'section' => 'core_general',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Preloader', '@@textdomain' ) . '</div>',
	'priority' => $priority++,
) );

Kirki::add_field( 'docs_customizer', array(
	'type' => 'select',
	'settings' => 'preloader',
	'section' => 'core_general',
	'label' => esc_html__( 'Preloader', '@@textdomain' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'show' => esc_html__( 'Show', '@@textdomain' ),
		'hide' => esc_html__( 'Hide', '@@textdomain' )
	),
	'default' => 'show',
) );

Kirki::add_field( 'docs_customizer', array(
	'type' => 'custom',
	'settings' => 'sg_4',
	'section' => 'core_general',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Additional', '@@textdomain' ) . '</div>',
	'priority' => $priority++,
) );

Kirki::add_field( 'docs_customizer', array(
	'type' => 'select',
	'settings' => 'back_to_top',
	'section' => 'core_general',
	'label' => esc_html__( '"Back to Top" Button', '@@textdomain' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'show' => esc_html__( 'Show', '@@textdomain' ),
		'hide' => esc_html__( 'Hide', '@@textdomain' )
	),
	'default' => 'show',
) );

/**
 * Selection
 */
Kirki::add_field( 'docs_customizer', array(
	'type' => 'color',
	'settings' => 'selection_text_color',
	'section' => 'core_selection',
	'label' => esc_html__( 'Selection Text Color', '@@textdomain' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'alpha' => false
	),
	'default' => '#ffffff',
	'output' => array(
		array(
			'element' => '::selection',
			'property' => 'color',
			'suffix' => '!important'
		),
		array(
			'element' => '::-moz-selection',
			'property' => 'color',
			'suffix' => '!important'
		)
	)
) );

Kirki::add_field( 'docs_customizer', array(
	'type' => 'color',
	'settings' => 'selection_background_color',
	'section' => 'core_selection',
	'label' => esc_html__( 'Selection Background Color', '@@textdomain' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'alpha' => true
	),
	'default' => '#242424',
	'output' => array(
		array(
			'element' => '::selection',
			'property' => 'background-color',
			'suffix' => '!important'
		),
		array(
			'element' => '::-moz-selection',
			'property' => 'background-color',
			'suffix' => '!important'
		)
	)
) );

/**
 * Scrollbar
 */
Kirki::add_field( 'docs_customizer', array(
	'type' => 'select',
	'settings' => 'custom_scrollbar',
	'section' => 'core_scrollbar',
	'label' => esc_html__( 'Custom Scrollbar', '@@textdomain' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'enable' => esc_html__( 'Enable', '@@textdomain' ),
		'disable' => esc_html__( 'Disable', '@@textdomain' )
	),
	'default' => 'disable',
) );

Kirki::add_field( 'docs_customizer', array(
	'type' => 'color',
	'settings' => 'custom_scrollbar_track_color',
	'section' => 'core_scrollbar',
	'label' => esc_html__( 'Track Color', '@@textdomain' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'alpha' => false
	),
	'default' => '',
	'output' => array(
		array(
			'element' => '::-webkit-scrollbar',
			'property' => 'background-color'
		)
	),
	'active_callback' => array(
		array(
			'setting' => 'custom_scrollbar',
			'operator' => '==',
			'value' => 'enable'
		)
	)
) );

Kirki::add_field( 'docs_customizer', array(
	'type' => 'color',
	'settings' => 'custom_scrollbar_bar_color',
	'section' => 'core_scrollbar',
	'label' => esc_html__( 'Bar Color', '@@textdomain' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'alpha' => false
	),
	'default' => '',
	'output' => array(
		array(
			'element' => '::-webkit-scrollbar-thumb',
			'property' => 'background-color'
		)
	),
	'active_callback' => array(
		array(
			'setting' => 'custom_scrollbar',
			'operator' => '==',
			'value' => 'enable'
		)
	)
) );

Kirki::add_field( 'docs_customizer', array(
	'type' => 'slider',
	'settings' => 'custom_scrollbar_width',
	'section' => 'core_scrollbar',
	'label' => esc_html__( 'Bar Width', '@@textdomain' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => array(
		'min' => '0',
		'max' => '16',
		'step' => '2'
	),
	'default' => '',
	'output' => array(
		array(
			'element' => '::-webkit-scrollbar',
			'property' => 'width',
			'units' => 'px'
		)
	),
	'active_callback' => array(
		array(
			'setting' => 'custom_scrollbar',
			'operator' => '==',
			'value' => 'enable'
		)
	)
) );

/**
 * Admin logo
 */
Kirki::add_field( 'docs_customizer', array(
	'type' => 'image',
	'settings' => 'login_logo_image',
	'section' => 'core_login_logo',
	'label' => esc_html__( 'Authorization Logo', '@@textdomain' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => $theme_path_images . 'vlthemes.png',
) );

Kirki::add_field( 'docs_customizer', array(
	'type' => 'dimension',
	'settings' => 'login_logo_image_height',
	'section' => 'core_login_logo',
	'label' => esc_html__( 'Logo Height', '@@textdomain' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => '115px',
	'active_callback' => array(
		array(
			'setting' => 'login_logo_image',
			'operator' => '!=',
			'value' => ''
		)
	)
) );

Kirki::add_field( 'docs_customizer', array(
	'type' => 'dimension',
	'settings' => 'login_logo_image_width',
	'section' => 'core_login_logo',
	'label' => esc_html__( 'Logo Width', '@@textdomain' ),
	'transport' => 'auto',
	'priority' => $priority++,
	'default' => '102px',
	'active_callback' => array(
		array(
			'setting' => 'login_logo_image',
			'operator' => '!=',
			'value' => ''
		)
	)
) );