<?php

/**
 * @author: VLThemes
 * @version: @@version
 */

$priority = 0;

/**
 * General fonts
 */
VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'primary_font',
	'section' => 'typography_fonts',
	'label' => esc_html__( 'Primary Font', '@@textdomain' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => apply_filters(
		'vlthemes_fonts_choices', [
			'variant' => [
				'regular',
				'500',
				'700'
			]
		]
	),
	'default' => array(
		'font-family' => 'DM Sans',
		'subsets' => [ 'latin' ],
	),
	'output' => array(
		array(
			'choice' => 'font-family',
			'element' => ':root',
			'property' => '--vlt-primary-font',
			'context' => array( 'editor', 'front' ),
		)
	)
) );

/**
 * Body typography
 */
VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'tt_1',
	'section' => 'typography_text',
	'default' => '<div class="kirki-separator">' . esc_html__( 'Text Typography', '@@textdomain' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'text_typography',
	'section' => 'typography_text',
	'label' => '<span class="dashicons dashicons-desktop" style="margin-right: 5px;"></span>' . esc_html__( 'Desktop', '@@textdomain' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => apply_filters(
		'vlthemes_fonts_choices', [
			'variant' => [
				'regular',
				'500',
				'600',
				'700',
			]
		]
	),
	'default' => array(
		'font-family' => 'DM Sans',
		'subsets' => [ 'latin' ],
		'variant' => 'regular',
		'font-size' => '16px',
		'line-height' => '1.8',
		'letter-spacing' => '0',
		'text-transform' => 'none'
	),
	'output' => array(
		array(
			'element' => 'body'
		),
		array(
			'element' => '.edit-post-visual-editor.editor-styles-wrapper',
			'context' => array( 'editor' ),
		),
	)
) );

/**
 * Heading typography
 */
VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'th_1',
	'section' => 'typography_headings',
	'default' => '<div class="kirki-separator">' . esc_html__( 'H1 Titles', '@@textdomain' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'typography_h1_titles',
	'section' => 'typography_headings',
	'label' => '<span class="dashicons dashicons-desktop" style="margin-right: 5px;"></span>' . esc_html__( 'Desktop', '@@textdomain' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => apply_filters(
		'vlthemes_fonts_choices', [
			'variant' => [
				'500',
			]
		]
	),
	'default' => array(
		'font-family' => 'DM Sans',
		'subsets' => [ 'latin' ],
		'variant' => '500',
		'font-size' => '28px',
		'line-height' => '1.5',
		'letter-spacing' => '-.015em',
		'text-transform' => 'none'
	),
	'output' => array(
		array(
			'element' => 'h1, .h1'
		),
		array(
			'element' => '.editor-block-list__block h1, .wp-block-heading h1.editor-rich-text__tinymce, .editor-post-title__block .editor-post-title__input',
			'context' => array( 'editor' ),
		),
	)
) );

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'th_2',
	'section' => 'typography_headings',
	'default' => '<div class="kirki-separator">' . esc_html__( 'H2 Titles', '@@textdomain' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'typography_h2_titles',
	'section' => 'typography_headings',
	'label' => '<span class="dashicons dashicons-desktop" style="margin-right: 5;"></span>' . esc_html__( 'Desktop', '@@textdomain' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => apply_filters(
		'vlthemes_fonts_choices', [
			'variant' => [
				'500',
			]
		]
	),
	'default' => array(
		'font-family' => 'DM Sans',
		'subsets' => [ 'latin' ],
		'variant' => '500',
		'font-size' => '22px',
		'line-height' => '1.5',
		'letter-spacing' => '-.015em',
		'text-transform' => 'none'
	),
	'output' => array(
		array(
			'element' => 'h2, .h2'
		),
		array(
			'element' => '.editor-block-list__block h2, .wp-block-heading h2.editor-rich-text__tinymce',
			'context' => array( 'editor' ),
		),
	)
) );

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'th_3',
	'section' => 'typography_headings',
	'default' => '<div class="kirki-separator">' . esc_html__( 'H3 Titles', '@@textdomain' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'typography_h3_titles',
	'section' => 'typography_headings',
	'label' => '<span class="dashicons dashicons-desktop" style="margin-right: 5;"></span>' . esc_html__( 'Desktop', '@@textdomain' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => apply_filters(
		'vlthemes_fonts_choices', [
			'variant' => [
				'500',
			]
		]
	),
	'default' => array(
		'font-family' => 'DM Sans',
		'subsets' => [ 'latin' ],
		'variant' => '500',
		'font-size' => '20px',
		'line-height' => '1.5',
		'letter-spacing' => '-.015em',
		'text-transform' => 'none'
	),
	'output' => array(
		array(
			'element' => 'h3, .h3'
		),
		array(
			'element' => '.editor-block-list__block h3, .wp-block-heading h3.editor-rich-text__tinymce',
			'context' => array( 'editor' ),
		),
	)
) );

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'th_4',
	'section' => 'typography_headings',
	'default' => '<div class="kirki-separator">' . esc_html__( 'H4 Titles', '@@textdomain' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'typography_h4_titles',
	'section' => 'typography_headings',
	'label' => '<span class="dashicons dashicons-desktop" style="margin-right: 5px;"></span>' . esc_html__( 'Desktop', '@@textdomain' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => apply_filters(
		'vlthemes_fonts_choices', [
			'variant' => [
				'500',
			]
		]
	),
	'default' => array(
		'font-family' => 'DM Sans',
		'subsets' => [ 'latin' ],
		'variant' => '500',
		'font-size' => '18px',
		'line-height' => '1.5',
		'letter-spacing' => '-.015em',
		'text-transform' => 'none'
	),
	'output' => array(
		array(
			'element' => 'h4, .h4'
		),
		array(
			'element' => '.editor-block-list__block h4, .wp-block-heading h4.editor-rich-text__tinymce',
			'context' => array( 'editor' ),
		),
	)
) );

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'th_5',
	'section' => 'typography_headings',
	'default' => '<div class="kirki-separator">' . esc_html__( 'H5 Titles', '@@textdomain' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'typography_h5_titles',
	'section' => 'typography_headings',
	'label' => '<span class="dashicons dashicons-desktop" style="margin-right: 5px;"></span>' . esc_html__( 'Desktop', '@@textdomain' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => apply_filters(
		'vlthemes_fonts_choices', [
			'variant' => [
				'500',
			]
		]
	),
	'default' => array(
		'font-family' => 'DM Sans',
		'subsets' => [ 'latin' ],
		'variant' => '500',
		'font-size' => '16px',
		'line-height' => '1.5',
		'letter-spacing' => '-.015em',
		'text-transform' => 'none'
	),
	'output' => array(
		array(
			'element' => 'h5, .h5'
		),
		array(
			'element' => '.editor-block-list__block h5, .wp-block-heading h5.editor-rich-text__tinymce',
			'context' => array( 'editor' ),
		),
	)
) );

VLT_Options::add_field( array(
	'type' => 'custom',
	'settings' => 'th_6',
	'section' => 'typography_headings',
	'default' => '<div class="kirki-separator">' . esc_html__( 'H6 Titles', '@@textdomain' ) . '</div>',
	'priority' => $priority++,
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'typography_h6_titles',
	'section' => 'typography_headings',
	'label' => '<span class="dashicons dashicons-desktop" style="margin-right: 5px;"></span>' . esc_html__( 'Desktop', '@@textdomain' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => apply_filters(
		'vlthemes_fonts_choices', [
			'variant' => [
				'500',
			]
		]
	),
	'default' => array(
		'font-family' => 'DM Sans',
		'subsets' => [ 'latin' ],
		'variant' => '500',
		'font-size' => '14px',
		'line-height' => '1.5',
		'letter-spacing' => '-.015em',
		'text-transform' => 'none'
	),
	'output' => array(
		array(
			'element' => 'h6, .h6'
		),
		array(
			'element' => '.editor-block-list__block h6, .wp-block-heading h6.editor-rich-text__tinymce',
			'context' => array( 'editor' ),
		),
	)
) );

/**
 * Button typography
 */
VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'typography_button',
	'section' => 'typography_buttons',
	'label' => esc_html__( 'Button Typography', '@@textdomain' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => apply_filters(
		'vlthemes_fonts_choices', [
			'variant' => [
				'500',
			]
		]
	),
	'default' => array(
		'font-family' => 'DM Sans',
		'subsets' => [ 'latin' ],
		'variant' => 'regular',
		'font-size' => '14px',
		'line-height' => '1.4',
		'letter-spacing' => '0',
		'text-transform' => 'none'
	),
	'output' => array(
		array(
			'element' => '.vlt-btn, input[type="button"]'
		)
	)
) );

/**
 * Input typography
 */
VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'typography_input',
	'section' => 'typography_input',
	'label' => esc_html__( 'Input Typography', '@@textdomain' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => apply_filters(
		'vlthemes_fonts_choices', [
			'variant' => [
				'regular',
			]
		]
	),
	'default' => array(
		'font-family' => 'DM Sans',
		'subsets' => [ 'latin' ],
		'variant' => 'regular',
		'font-size' => '14px',
		'line-height' => '1.4',
		'letter-spacing' => '0',
		'text-transform' => 'none'
	),
	'output' => array(
		array(
			'element' => '
				input[type="text"],
				input[type="date"],
				input[type="email"],
				input[type="password"],
				input[type="tel"],
				input[type="url"],
				input[type="search"],
				input[type="number"],
				textarea,
				select
			'
		)
	)
) );

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'typography_label',
	'section' => 'typography_input',
	'label' => esc_html__( 'Label Typography', '@@textdomain' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => apply_filters(
		'vlthemes_fonts_choices', [
			'variant' => [
				'regular',
			]
		]
	),
	'default' => array(
		'font-family' => 'DM Sans',
		'subsets' => [ 'latin' ],
		'variant' => 'regular',
		'font-size' => '14px',
		'line-height' => '1.4',
		'letter-spacing' => '-.015em',
		'text-transform' => 'none'
	),
	'output' => array(
		array(
			'element' => 'label'
		)
	)
) );