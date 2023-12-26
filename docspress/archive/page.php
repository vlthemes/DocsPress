<?php
/**
 * Docs archive main page template
 *
 * This template can be overridden by copying it to yourtheme/docspress/archive/page.php.
 *
 * @author nK
 * @package docspress/Templates
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<div class="vlt-page-content vlt-page-content--padding-sm">

	<article id="vlt-page post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<div class="vlt-docspress-archive docspress-archive">

			<ul class="vlt-docspress-archive-list docspress-archive-list">

				<?php
					// phpcs:ignore
					$current_term = false;

					if ( have_posts() ) : while ( have_posts() ) : the_post();

						// phpcs:ignore
						$terms = wp_get_post_terms( get_the_ID(), 'docs_category' );
						if (
							$terms &&
							! empty( $terms ) &&
							isset( $terms[0]->name ) &&
							$current_term !== $terms[0]->name
						) {
							// phpcs:ignore
							$current_term = $terms[0]->name;
							?>
							<li class="vlt-docspress-archive-list__category">
								<?php echo esc_html( $terms[0]->name ); ?>
							</li>
							<?php
						}

						?>

						<li class="vlt-docspress-archive-list__item">

							<div class="vlt-docspress-archive-list__content">
								<?php docspress()->get_template_part( 'archive/loop-title' ); ?>
								<?php docspress()->get_template_part( 'archive/loop-articles' ); ?>
							</div>

						</li>

						<?php

					endwhile; endif;

				?>

			</ul>
			<!-- /.vlt-docspress-archive-list -->

		</div>
		<!-- /.vlt-docspress-archive -->

		<div class="clearfix"></div>

		<?php
			wp_link_pages( array(
				'before' => '<div class="vlt-link-pages"><h6>' . esc_html__( 'Pages: ', '@@textdomain' ) . '</h6>',
				'after' => '</div>',
				'separator' => '<span class="sep">|</span>',
				'nextpagelink' => esc_html__( 'Next page', '@@textdomain' ),
				'previouspagelink' => esc_html__( 'Previous page', '@@textdomain' ),
				'next_or_number' => 'next'
			) );
		?>

	</article>

</div>
<!-- /.vlt-page-content -->