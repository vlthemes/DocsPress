<?php

/**
 * @author: VLThemes
 * @version: @@version
 */

$portfolio_link = docs_get_theme_mod( 'portfolio_link' );

?>

<div class="d-lg-none">

	<header class="vlt-header vlt-header--default">

		<a class="vlt-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
			<?php if ( docs_get_theme_mod( 'header_logo' ) ) : ?>
				<span class="vlt-logo__icon">
					<img src="<?php echo docs_get_theme_mod( 'header_logo' ); ?>" alt="<?php bloginfo( 'name' ); ?>">
				</span>
			<?php endif; ?>
			<span class="vlt-logo__description">
				<span><?php bloginfo( 'name' ); ?></span>
				<span><?php bloginfo( 'description' ); ?></span>
			<span>
		</a>
		<!-- /.vlt-logo -->

		<?php if ( is_active_sidebar( 'subscribe_popup_sidebar' ) ) : ?>

			<a data-src="#vlt-subscribe-popup" href="javascript:;" class="vlt-subscribe-form-toggle">
				<i class="fas fa-bell"></i>
			</a>
			<!-- /.vlt-subscribe-form-toggle -->

		<?php endif; ?>

		<?php if ( $portfolio_link ) : ?>

			<a href="<?php echo esc_url( $portfolio_link ); ?>" class="vlt-btn vlt-btn--primary"><?php esc_html_e( 'Portfolio', '@@textdomain' ); ?></a>
			<!-- /.vlt-btn -->

		<?php endif; ?>

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