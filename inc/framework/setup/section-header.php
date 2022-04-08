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
	'type' => 'code',
	'settings' => 'header_logo',
	'section' => 'section_header_options',
	'label' => esc_html__( 'Logo', '@@textdomain' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => [
		'language' => 'html',
	],
	'default' => '<svg xmlns="http://www.w3.org/2000/svg" width="40" height="45" fill="none"><path fill="currentColor" fill-rule="evenodd" d="M18.462.359a2.67 2.67 0 0 1 2.674 0l17.129 9.913a2.67 2.67 0 0 1 1.332 2.31v19.836a2.67 2.67 0 0 1-1.332 2.31l-17.13 9.913a2.67 2.67 0 0 1-2.674 0L1.332 34.728A2.67 2.67 0 0 1 0 32.418V12.582a2.67 2.67 0 0 1 1.332-2.31L18.462.359Zm.786 32.834-.047.113.047-.113Zm-2.527-5.905 2.48 6.018h-4.994L6.73 15.138h4.985L16.72 27.29l.001-.002Zm1.584-3.794 2.313 6.411 7.493-17.978-4.976.005-4.83 11.562Zm5.518 6.22 4.098-9.834v8.068c0 .557.248 1.088.516 1.326.268.237.793.456 1.59.516s1.801-.073 1.801-.073l.7 3.323s-1.624.24-3.38.24c-1.756 0-3.102-.403-4.05-1.207-.643-.545-1.068-1.332-1.275-2.36Zm8.005-13.508h-2.376l-1.48 3.55h3.856v-3.55Z" clip-rule="evenodd"/><path fill="#000" fill-opacity=".2" fill-rule="evenodd" d="M18.462.359a2.67 2.67 0 0 1 2.674 0l17.129 9.913a2.67 2.67 0 0 1 1.332 2.31v19.836a2.67 2.67 0 0 1-1.332 2.31l-17.13 9.913a2.67 2.67 0 0 1-2.674 0L1.332 34.728A2.67 2.67 0 0 1 0 32.418V12.582a2.67 2.67 0 0 1 1.332-2.31L18.462.359Zm.786 32.834-.047.113.047-.113Zm-2.527-5.905 2.48 6.018h-4.994L6.73 15.138h4.985L16.72 27.29l.001-.002Zm1.584-3.794 2.313 6.411 7.493-17.978-4.976.005-4.83 11.562Zm5.518 6.22 4.098-9.834v8.068c0 .557.248 1.088.516 1.326.268.237.793.456 1.59.516s1.801-.073 1.801-.073l.7 3.323s-1.624.24-3.38.24c-1.756 0-3.102-.403-4.05-1.207-.643-.545-1.068-1.332-1.275-2.36Zm8.005-13.508h-2.376l-1.48 3.55h3.856v-3.55Z" clip-rule="evenodd"/></svg>',
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