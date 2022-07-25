<?php

/**
 * @author: VLThemes
 * @version: @@version
 */

?>

<?php if ( wp_get_post_terms( get_the_ID(), 'theme_features' ) ) : ?>

	<section class="vlt-single-theme-section vlt-single-theme-section--features has-background-shade-3">

		<div class="container">

			<div class="vlt-section-title">

				<h2 class="vlt-section-title__heading"><?php esc_html_e( 'Theme Features', '@@textdomain' ); ?></h2>

				<p class="vlt-section-title__description"><?php esc_html_e( 'Theme features that will rock your WordPress.', '@@textdomain' ); ?></p>

			</div>

			<div class="vlt-spacer" style="height: 70px;"></div>

			<?php

				$features = wp_get_post_terms( get_the_ID(), 'theme_features' );

				echo '<ul class="vlt-theme-features-list">';

				foreach ( $features as $feature ) {

					echo '<li><i class="fa-regular fa-fw fa-check"></i>' . get_term_field( 'name', $feature->term_id, 'theme_features' ) . '</li>';

				}

				echo '</ul>';

			?>

		</div>

	</section>

<?php endif; ?>