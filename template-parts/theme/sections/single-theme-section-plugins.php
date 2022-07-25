<?php

/**
 * @author: VLThemes
 * @version: @@version
 */

?>

<?php if ( wp_get_post_terms( get_the_ID(), 'theme_plugins' ) ) : ?>

	<section class="vlt-single-theme-section vlt-single-theme-section--plugins">

		<div class="container">

			<div class="vlt-section-title">

				<h2 class="vlt-section-title__heading"><?php esc_html_e( 'Plugins & Modules', '@@textdomain' ); ?></h2>

				<p class="vlt-section-title__description"><?php esc_html_e( 'Supported plugins & modules for extend the functionality of the theme.', '@@textdomain' ); ?></p>

			</div>

			<div class="vlt-spacer" style="height: 70px;"></div>

			<div class="row" style="--bs-gutter-x: 45px; --bs-gutter-y: 70px;">

				<?php

					$plugins = wp_get_post_terms( get_the_ID(), 'theme_plugins' );

					foreach ( $plugins as $plugin ) {

						echo '<div class="col-md-6 col-lg-4">';
						echo vlthemes_render_theme_plugin( $plugin );
						echo '</div>';

					}

				?>

			</div>

		</div>

	</section>

<?php endif; ?>