<?php
/**
 * Docs search template
 *
 * This template can be overridden by copying it to yourtheme/docspress/search.php.
 *
 * @author  nK
 * @package docspress/Templates
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

docspress()->get_template_part( 'global/wrap-start' );

$keys = implode( '|', explode( ' ', get_search_query() ) );

?>
<main class="vlt-main vlt-main--padding">

	<article id="post-<?php the_ID(); ?>" <?php post_class( 'vlt-page' ); ?>>

		<header class="vlt-page-header">

			<h1 class="vlt-page-title">

				<?php
					// translators: %s search query.
					printf( esc_html__( 'Documentation search: "%s"', '@@textdomain' ), esc_html( get_search_query() ) );
				?>

			</h1>
			<!-- /.vlt-page-title -->

		</header>
		<!-- /.vlt-page-header -->


		<div class="vlt-page-content vlt-content-markup">

			<div class="docspress-search">

				<ul class="docspress-search-list">
					<?php
					if ( have_posts() ) :
						while ( have_posts() ) :
							the_post();
							// highlight search terms in title.
							$title = wp_trim_words( get_the_title(), 10, true );
							$title = preg_replace( '/(' . $keys . ')/iu', '<mark>\0</mark>', $title );
							$excerpt = wp_trim_words( get_the_excerpt(), 10, true );
							$excerpt = preg_replace( '/(' . $keys . ')/iu', '<mark>\0</mark>', $excerpt );
							?>
							<li class="docspress-search-list-item">
								<a href="<?php the_permalink(); ?>">
									<span class="docspress-search-list-item-title">
										<strong><?php echo wp_kses( $title, array( 'mark' => array() ) ); ?></strong>
									</span>
									<span class="docspress-search-list-item-excerpt"><?php echo wp_kses( $excerpt, array( 'mark' => array() ) ); ?></span>
								</a>
							</li>
							<?php
						endwhile;
					endif;
					?>
				</ul>

			</div>

		</div>
		<!-- /.vlt-page-content -->

		<div class="clearfix"></div>

		<footer class="vlt-page-footer">

			<?php
				wp_link_pages( array(
					'before' => '<div class="vlt-link-pages"><h5>' . esc_html__( 'Pages: ', '@@textdomain' ) . '</h5>',
					'after' => '</div>',
					'separator' => '<span class="sep">|</span>',
					'nextpagelink' => esc_html__( 'Next page', '@@textdomain' ),
					'previouspagelink' => esc_html__( 'Previous page', '@@textdomain' ),
					'next_or_number' => 'next'
				) );
			?>

		</footer>
		<!-- /.vlt-page-footer -->

	</article>

</main>
<!-- /.vlt-main -->

<?php

docspress()->get_template_part( 'global/wrap-end' );