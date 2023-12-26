<?php
/**
 * Single docs adjacent links template
 *
 * This template can be overridden by copying it to yourtheme/docspress/single/adjacent-links.php.
 *
 * @author nK
 * @package docspress/Templates
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// phpcs:disable
$prev_post_id = docspress()->get_previous_adjacent_doc_id();
$next_post_id = docspress()->get_next_adjacent_doc_id();
// phpcs:enable

if ( $prev_post_id || $next_post_id ) { ?>

	<nav class="vlt-docspress-single__adjacent-nav docspress-single-adjacent-nav">

        <?php if ( $prev_post_id ) : ?>
            <span class="nav-previous">
                <a href="<?php echo esc_url( get_the_permalink( $prev_post_id ) ); ?>" class="vlt-btn vlt-btn--primary"><?php echo esc_html( get_the_title( $prev_post_id ) ); ?></a>
            </span>
        <?php endif; ?>

        <?php if ( $next_post_id ) : ?>
            <span class="nav-next">
                <a href="<?php echo esc_url( get_the_permalink( $next_post_id ) ); ?>" class="vlt-btn vlt-btn--primary"><?php echo esc_html( get_the_title( $next_post_id ) ); ?></a>
            </span>
        <?php endif; ?>

	</nav>
	<!-- /.vlt-docspress-single__adjacent-nav -->

	<?php
}
