<?php

/**
 * @author: VLThemes
 * @version: @@version
 */

$header_class = 'vlt-header vlt-header--mobile';
$navbar_class = 'vlt-navbar vlt-navbar--main';

?>

<div class="d-<?php echo docspress_nav_breakpoint(); ?>-none d-sm-block">

	<header class="<?php echo docspress_sanitize_class( $header_class ); ?>">

		<div class="<?php echo docspress_sanitize_class( $navbar_class ); ?>">

			<div class="vlt-navbar-inner">

				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="vlt-navbar-logo">

					<?php if ( docspress_get_theme_mod( 'header_logo' ) ) : ?>

						<span class="vlt-navbar-logo__icon">

							<?php

								echo wp_get_attachment_image( docspress_get_theme_mod( 'header_logo' ), 'full', false, array( 'loading' => 'lazy', 'class' => 'black' ) );

								if ( docspress_get_theme_mod( 'header_logo_white' ) ) {
									echo wp_get_attachment_image( docspress_get_theme_mod( 'header_logo_white' ), 'full', false, array( 'loading' => 'lazy', 'class' => 'white' ) );
								}

							?>

						</span>

						<span class="vlt-navbar-logo__description">
							<h2><?php bloginfo( 'name' ); ?></h2>
							<span><?php bloginfo( 'description' ); ?></span>
						</span>

					<?php else: ?>

						<h2><?php bloginfo( 'name' ); ?></h2>

					<?php endif; ?>

				</a>
				<!-- .vlt-navbar-logo -->

				<div class="vlt-navbar-buttons">

					<?php

						$acf_page_night_mode_toggle_button = docspress_get_theme_mod( 'page_custom_night_mode_toggle_button', true );

						if ( docspress_get_theme_mod( 'night_mode_toggle_button', $acf_page_night_mode_toggle_button ) == 'show' ) :

					?>

						<div class="vlt-night-mode-switcher js-night-mode-trigger">
							<span class="vlt-toggle-indicator">
								<span class="vlt-toggle-indicator__icon vlt-toggle-indicator__icon--light"><svg fill="currentColor" viewBox="0 0 16 16"><path d="M8.759 14.24a.76.76 0 0 1-1.52 0v-1.48a.76.76 0 1 1 1.52 0zM5.172 10.827a.76.76 0 0 0-1.075 0L3.05 11.873a.76.76 0 1 0 1.075 1.075l1.047-1.047a.76.76 0 0 0 0-1.074zM10.829 10.827a.76.76 0 0 0 0 1.074l1.046 1.047a.76.76 0 1 0 1.075-1.075l-1.047-1.046a.76.76 0 0 0-1.074 0zM10.114 5.884a3 3 0 1 1-4.242 4.242 3 3 0 0 1 4.242-4.242zM3.05 4.123a.76.76 0 1 1 1.075-1.075l1.047 1.047A.76.76 0 1 1 4.097 5.17zM11.875 3.049a.76.76 0 1 1 1.075 1.074L11.903 5.17a.76.76 0 1 1-1.075-1.075zM14.24 7.239a.76.76 0 1 1 0 1.52h-1.48a.76.76 0 0 1 0-1.52zM4 7.998a.76.76 0 0 0-.76-.76H1.76a.76.76 0 1 0 0 1.52h1.48c.42 0 .76-.34.76-.76zM7.998 4c.42 0 .76-.34.76-.76V1.76a.76.76 0 0 0-1.52 0v1.48c0 .42.34.76.76.76z"/></svg></span>
								<span class="vlt-toggle-indicator__icon vlt-toggle-indicator__icon--dark"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 16"><path fill="currentColor" d="M13.897 2.557c.268.208-.035.62-.373.552A5.459 5.459 0 0 0 12.434 3C9.555 3 7 5.239 7 8s2.553 5 5.435 5c.373 0 .738-.038 1.09-.11.337-.068.64.345.372.553A7.472 7.472 0 0 1 9.304 15C5.27 15 2 11.866 2 8s3.27-7 7.304-7c1.74 0 3.339.583 4.593 1.557z"/></svg></span>
							</span>
						</div>
						<!-- /.vlt-night-mode-switcher -->

					<?php endif; ?>

					<?php if ( docspress_get_theme_mod( 'submit_ticket_link' ) ) : ?>

						<a href="<?php the_permalink( docspress_get_theme_mod( 'submit_ticket_link' ) ); ?>" class="vlt-btn vlt-btn--primary">
							<?php esc_html_e( 'Need help?', '@@textdomain' ); ?>
						</a>
						<!-- /.vlt-btn -->

					<?php endif; ?>

				</div>
				<!-- /.vlt-navbar-buttons -->

			</div>
			<!-- /.vlt-navbar-inner -->

			<nav class="vlt-nav vlt-nav--mobile">

				<?php get_template_part( 'template-parts/header/partials/partial', 'primary-menu' ); ?>

			</nav>
			<!-- /.vlt-nav -->

		</div>
		<!-- /.vlt-navbar -->

	</header>
	<!-- /.vlt-header -->

</div>
<!-- ./d-none d-<?php echo docspress_nav_breakpoint(); ?>-none d-sm-block -->