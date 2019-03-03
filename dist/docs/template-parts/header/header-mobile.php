<?php

/**
 * @author: VLThemes
 * @version: 1.0.0
 */

$portfolio_link = get_theme_mod( 'portfolio_link' );

?>

<div class="hidden-lg-up">

	<header class="vlt-header vlt-header--default">

		<div class="d-flex align-items-center justify-content-between">

			<div>
				<a class="vlt-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<span class="vlt-logo__name"><?php bloginfo( 'name' ); ?></span>
					<span class="vlt-logo__description hidden-sm-down"><?php bloginfo( 'description' ); ?></span>
				</a>
				<!-- /.vlt-logo -->
			</div>

			<div class="d-flex align-items-center">

				<?php if ( $portfolio_link ) : ?>
					<a href="<?php echo esc_url( $portfolio_link ); ?>" class="vlt-btn vlt-btn--primary"><?php esc_html_e( 'Portfolio', 'docs' ); ?></a>
					<!-- /.vlt-btn -->
				<?php endif; ?>

			</div>

		</div>

		<nav class="vlt-mobile-navigation">
			<?php
				wp_nav_menu( array(
					'theme_location' => 'primary-menu',
					'container' => false,
					'depth' => 3,
					'menu_class' => 'sf-menu',
					'fallback_cb' => 'docs_fallback_menu'
				) );
			?>
		</nav>
		<!-- /.vlt-mobile-navigation -->

	</header>
	<!-- /.vlt-header--default -->

</div>
<!-- /.hidden-lg-up -->