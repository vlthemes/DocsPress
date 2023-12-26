<?php
/**
 * Single docs content breadcrumbs template
 *
 * This template can be overridden by copying it to yourtheme/docspress/single/content-breadcrumbs.php.
 *
 * @author  nK
 * @package @@plugin_name/Templates
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// phpcs:ignore
$breadcrumbs = docspress()->get_breadcrumbs_array();
?>

<ul class="vlt-docspress-single-breadcrumbs docspress-single-breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">
    <?php foreach ( $breadcrumbs as $k => $crumb ) : // phpcs:ignore ?>
        <?php if ( $k > 0 ) : ?>
            <li class="delimiter"> / </li>
        <?php endif; ?>
        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
            <a itemprop="item" href="<?php echo esc_url( $crumb['url'] ); ?>"><span itemprop="name"><?php echo esc_html( $crumb['label'] ); ?></span></a>
            <meta itemprop="position" content="<?php echo esc_attr( $k + 1 ); ?>" />
        </li>
    <?php endforeach; ?>
</ul>
<!-- /.vlt-docspress-single-breadcrumbs -->