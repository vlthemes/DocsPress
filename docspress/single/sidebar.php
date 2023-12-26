<?php
/**
 * Single docs sidebar template
 *
 * This template can be overridden by copying it to yourtheme/docspress/single/sidebar.php.
 *
 * @author nK
 * @package docspress/Templates
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// phpcs:ignore
$show_parents = docspress()->get_option( 'sidebar_show_nav_parents', 'docspress_single', false );

?>

<div class="vlt-docspress-single__sidebar docspress-single-sidebar">

	<div class="vlt-docspress-single__sidebar-inner docspress-single-sidebar-wrap">

		<?php if ( docspress()->get_option( 'sidebar_show_search', 'docspress_single', true ) ) : ?>
			<form role="search" method="get" class="vlt-search-form docspress-search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
				<input type="text" class="docspress-search-field" placeholder="<?php echo esc_attr__( 'Type to search', '@@textdomain' ); ?>" value="<?php echo get_search_query(); ?>" name="s" autocomplete="off">
				<button><i class="ri-search-line"></i></button>
				<input type="hidden" name="post_type" value="docs">
				<?php if ( ! $show_parents ) : ?>
					<input type="hidden" name="child_of" value="<?php echo esc_attr( docspress()->get_current_doc_id() ); ?>">
				<?php endif; ?>
			</form>
			<div class="docspress-search-form-result"></div>
		<?php endif; ?>

		<?php

		// phpcs:ignore
		$nav_list = wp_list_pages(
			array(
				'title_li' => '',
				'order' => 'menu_order',
				'child_of' => $show_parents ? 0 : docspress()->get_current_doc_id(),
				'echo' => false,
				'post_type' => 'docs',
				'walker' => new DocsPress_Walker_Docs(),
			)
		);

		if ( $nav_list ) :
			// phpcs:ignore
			$show_childs = docspress()->get_option( 'sidebar_show_nav_childs', 'docspress_single', false );

			$nav_list_class = 'vlt-docspress-nav-list docspress-nav-list';

			if ( $show_childs ) {
				$nav_list_class .= 'docspress-nav-list-show-childs';
			}

			?>

			<ul class="<?php echo docspress_sanitize_class( $nav_list_class ); ?>">
				<?php
					// phpcs:ignore
					echo wp_kses_post( $nav_list );
				?>
			</ul>

		<?php endif; ?>

		<?php

			if ( is_active_sidebar( 'docs_sidebar' ) ) {
				echo '<div class="vlt-sidebar docspress-sidebar-after-nav">';
				dynamic_sidebar( 'docs_sidebar' );
				echo '</div>';
			}

		?>

	</div>

</div>
