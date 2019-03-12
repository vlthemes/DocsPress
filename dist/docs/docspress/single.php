<?php
/**
 * Single docs template
 *
 * This template can be overridden by copying it to yourtheme/docspress/single.php.
 *
 * @author  nK
 * @package docspress/Templates
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

docspress()->get_template_part( 'global/wrap-start' );

while ( have_posts() ) :
    the_post(); ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class( 'docspress-single' . ( docspress()->get_option( 'ajax', 'docspress_single', true ) ? ' docspress-single-ajax' : '' ) ); ?>>

        <?php docspress()->get_template_part( 'single/sidebar' ); ?>

        <div class="docspress-single-content">
            <?php
            docspress()->get_template_part( 'single/content-breadcrumbs' );

            docspress()->get_template_part( 'single/content-title' );
            ?>

            <div class="entry-content vlt-content-markup">
                <?php
                the_content();

				wp_link_pages( array(
					'before' => '<div class="vlt-link-pages"><h5>' . esc_html__( 'Pages: ', 'docs' ) . '</h5>',
					'after' => '</div>',
					'separator' => '<span class="sep">|</span>',
					'nextpagelink' => esc_html__( 'Next page', 'docs' ),
					'previouspagelink' => esc_html__( 'Previous page', 'docs' ),
					'next_or_number' => 'next'
				) );

                docspress()->get_template_part( 'single/content-articles' );
                ?>
            </div><!-- .entry-content -->

            <?php

            docspress()->get_template_part( 'single/footer' );

            docspress()->get_template_part( 'single/adjacent-links' );

            docspress()->get_template_part( 'single/feedback' );

            if ( docspress()->get_option( 'show_comments', 'docspress_single', true ) ) {
                docspress()->get_template_part( 'single/comments' );
            }

            ?>
        </div><!-- .docspress-single-content -->
    </article><!-- #post-## -->
    <?php

endwhile;

docspress()->get_template_part( 'global/wrap-end' );
