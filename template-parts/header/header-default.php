<?php

/**
 * @author: VLThemes
 * @version: @@version
 */

$portfolio_link = get_theme_mod( 'portfolio_link' );

?>

<div class="hidden-md-down">

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

				<nav class="vlt-default-navigation">
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
				<!-- /.vlt-default-navigation -->

				<?php if ( $portfolio_link ) : ?>
					<a href="<?php echo esc_url( $portfolio_link ); ?>" class="vlt-btn vlt-btn--primary"><?php esc_html_e( 'Portfolio', '@@textdomain' ); ?></a>
					<!-- /.vlt-btn -->
				<?php endif; ?>

			</div>

		</div>

	</header>
	<!-- /.vlt-header--default -->

</div>
<!-- /.hidden-md-down -->