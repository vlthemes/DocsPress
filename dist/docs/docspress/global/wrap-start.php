<?php
/**
 * Docs wrap start template
 *
 * This template can be overridden by copying it to yourtheme/docspress/global/wrap-start.php.
 *
 * @author  nK
 * @package docspress/Templates
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header( 'docs' );

$theme_class = '';

// additional class for default theme to add fix styles.
$current_theme = get_template();
if ( in_array( $current_theme, array( 'twentyseventeen', 'twentysixteen', 'twentyfifteen' ), true ) ) {
    $theme_class = ' docspress_theme_' . $current_theme;
}

?>
<div id="primary" class="content-area<?php echo esc_attr( $theme_class ); ?>">
    <main id="main" class="vlt-main site-main" role="main">
