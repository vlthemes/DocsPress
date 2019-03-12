<?php

/**
 * @author: VLThemes
 * @version: 1.0.0
 */

$priority = 0;

/**
 * Footer general
 */
Kirki::add_field( 'docs_customizer', array(
	'type' => 'editor',
	'settings' => 'footer_copyright',
	'section' => 'section_footer_options',
	'label' => esc_html__( 'Copyright', 'docs' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'default' => '<p>© 2019 DocsPress. All rights reserved.</p>',
) );