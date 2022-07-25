<?php

/**
 * @author: VLThemes
 * @version: @@version
 */

$priority = 0;

/**
 * Footer general
 */
VLT_Options::add_field( array(
	'type' => 'editor',
	'settings' => 'footer_copyright',
	'section' => 'section_footer_options',
	'label' => esc_html__( 'Copyright', '@@textdomain' ),
	'priority' => $priority++,
	'default' => '<p>© %s DocsPress. All rights reserved.</p>',
) );