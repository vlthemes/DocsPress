<?php

/**
 * @author: VLThemes
 * @version: @@version
 */

$priority = 0;

/**
 * General
 */
VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'sg_2',
	'section' => 'core_general',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Colors', '@@textdomain' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'multicolor',
	'settings' => 'accent_colors',
	'section' => 'core_general',
	'label' => esc_html__( 'Accent Colors', '@@textdomain' ),
	'priority' => $priority++,
	'choices' => array(
		'first' => esc_html__( 'First', '@@textdomain' ),
		'second' => esc_html__( 'Second', '@@textdomain' ),
	),
	'default' => array(
		'first' => '#d54e21',
		'second' => '#1e8cbe',
	)
) );


VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'sg_2',
	'section' => 'core_general',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Preloader', '@@textdomain' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'preloader_style',
	'section' => 'core_general',
	'label' => esc_html__( 'Style Preloader', '@@textdomain' ),
	'priority' => $priority++,
	'choices' => array(
		'none' => esc_html__( 'None', '@@textdomain' ),
		'image' => esc_html__( 'Image', '@@textdomain' ),
		'spinner' => esc_html__( 'Spinner', '@@textdomain' )
	),
	'default' => 'spinner'
) );

VLT_Options::add_field( array(
	'type' => 'image',
	'settings' => 'preloader_image',
	'section' => 'core_general',
	'label' => esc_html__( 'Preloader Image', '@@textdomain' ),
	'priority' => $priority++,
	'default' => '',
	'active_callback' => array(
		array(
			'setting' => 'preloader_style',
			'operator' => '==',
			'value' => 'image'
		)
	)
) );

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'sg_4',
	'section' => 'core_general',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Additional', '@@textdomain' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'back_to_top',
	'section' => 'core_general',
	'label' => esc_html__( '"Back to Top" Button', '@@textdomain' ),
	'priority' => $priority++,
	'choices' => array(
		'show' => esc_html__( 'Show', '@@textdomain' ),
		'hide' => esc_html__( 'Hide', '@@textdomain' )
	),
	'default' => 'show',
) );

VLT_Options::add_field( array(
	'type' => 'code',
	'settings' => 'tracking_code',
	'section' => 'core_general',
	'label' => esc_html__( 'Tracking Code', '@@textdomain' ),
	'description' => esc_html__( 'Copy and paste your tracking code here.', '@@textdomain' ),
	'priority' => $priority++,
	'choices' => array(
		'language' => 'php',
	),
	'default' => '',
) );

/**
 * Selection
 */
VLT_Options::add_field( array(
	'type' => 'color',
	'settings' => 'selection_text_color',
	'section' => 'core_selection',
	'label' => esc_html__( 'Selection Text Color', '@@textdomain' ),
	'priority' => $priority++,
	'choices' => array(
		'alpha' => false
	),
	'default' => '#ffffff',
	'transport' => 'auto',
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

VLT_Options::add_field( array(
	'type' => 'color',
	'settings' => 'selection_background_color',
	'section' => 'core_selection',
	'label' => esc_html__( 'Selection Background Color', '@@textdomain' ),
	'priority' => $priority++,
	'choices' => array(
		'alpha' => true
	),
	'default' => '#242424',
	'transport' => 'auto',
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
VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'custom_scrollbar',
	'section' => 'core_scrollbar',
	'label' => esc_html__( 'Custom Scrollbar', '@@textdomain' ),
	'priority' => $priority++,
	'choices' => array(
		'enable' => esc_html__( 'Enable', '@@textdomain' ),
		'disable' => esc_html__( 'Disable', '@@textdomain' )
	),
	'default' => 'disable',
) );

VLT_Options::add_field( array(
	'type' => 'color',
	'settings' => 'custom_scrollbar_track_color',
	'section' => 'core_scrollbar',
	'label' => esc_html__( 'Track Color', '@@textdomain' ),
	'priority' => $priority++,
	'choices' => array(
		'alpha' => false
	),
	'default' => '',
	'transport' => 'auto',
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

VLT_Options::add_field( array(
	'type' => 'color',
	'settings' => 'custom_scrollbar_bar_color',
	'section' => 'core_scrollbar',
	'label' => esc_html__( 'Bar Color', '@@textdomain' ),
	'priority' => $priority++,
	'choices' => array(
		'alpha' => false
	),
	'default' => '',
	'transport' => 'auto',
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

VLT_Options::add_field( array(
	'type' => 'slider',
	'settings' => 'custom_scrollbar_width',
	'section' => 'core_scrollbar',
	'label' => esc_html__( 'Bar Width', '@@textdomain' ),
	'priority' => $priority++,
	'choices' => array(
		'min' => '0',
		'max' => '16',
		'step' => '2'
	),
	'default' => '',
	'transport' => 'auto',
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
 * Night mode
 */
VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'night_mode',
	'section' => 'core_night_mode',
	'label' => esc_html__( 'Night Mode', '@@textdomain' ),
	'priority' => $priority++,
	'choices' => array(
		'auto' => esc_html__( 'Auto', '@@textdomain' ),
		'day' => esc_html__( 'Day', '@@textdomain' ),
		'night' => esc_html__( 'Night', '@@textdomain' )
	),
	'default' => 'auto',
) );

VLT_Options::add_field( array(
	'type' => 'select',
	'settings' => 'night_mode_toggle_button',
	'section' => 'core_night_mode',
	'label' => esc_html__( 'Toggle Button', '@@textdomain' ),
	'priority' => $priority++,
	'choices' => array(
		'show' => esc_html__( 'Show', '@@textdomain' ),
		'hide' => esc_html__( 'Hide', '@@textdomain' )
	),
	'default' => 'show',
) );

/**
 * Custom sidebars
 */
VLT_Options::add_field( array(
	'type' => 'repeater',
	'settings' => 'custom_sidebars',
	'section' => 'core_sidebars',
	'label' => esc_attr__( 'Custom Sidebars', '@@textdomain' ),
	'description' => esc_html__( 'Create new sidebars and use them later via the page builder for different areas.', '@@textdomain' ),
	'row_label' => array(
		'type' => 'field',
		'field' => 'sidebar_title',
		'value' => esc_attr__( 'Custom Sidebar', '@@textdomain' ),
	),
	'button_label' => esc_attr__( 'Add new sidebar area', '@@textdomain' ),
	'default' => '',
	'fields' => array(
		'sidebar_title' => array(
			'type' => 'text',
			'label' => esc_attr__( 'Sidebar Title', '@@textdomain' ),
			'default' => '',
		),
		'sidebar_description' => array(
			'type' => 'textarea',
			'label' => esc_attr__( 'Sidebar Description', '@@textdomain' ),
			'default' => '',
		),
	)
) );

/**
 * Admin logo
 */
VLT_Options::add_field( array(
	'type' => 'image',
	'settings' => 'login_logo_image',
	'section' => 'core_login_logo',
	'label' => esc_html__( 'Authorization Logo', '@@textdomain' ),
	'priority' => $priority++,
	'default' => $theme_path_images . 'vlthemes.png',
) );

VLT_Options::add_field( array(
	'type' => 'dimension',
	'settings' => 'login_logo_image_height',
	'section' => 'core_login_logo',
	'label' => esc_html__( 'Logo Height', '@@textdomain' ),
	'priority' => $priority++,
	'default' => '115px',
	'active_callback' => array(
		array(
			'setting' => 'login_logo_image',
			'operator' => '!=',
			'value' => ''
		)
	)
) );

VLT_Options::add_field( array(
	'type' => 'dimension',
	'settings' => 'login_logo_image_width',
	'section' => 'core_login_logo',
	'label' => esc_html__( 'Logo Width', '@@textdomain' ),
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