jQuery( document ).ready( function() {

	'use strict';

	// Add icons to custom css.
	jQuery( '#accordion-section-custom_css > h3' ).addClass( 'dashicons-before dashicons-admin-appearance' );
	jQuery( '#sub-accordion-section-custom_css .customize-section-title > h3' ).append( '<span class="dashicons-before dashicons-admin-appearance" style="padding-right:.2em; padding-top: 2px; float:left;"></span>' );

	// Add icons to static front page.
	jQuery( '#accordion-section-static_front_page > h3' ).addClass( 'dashicons-before dashicons-flag' );
	jQuery( '#sub-accordion-section-static_front_page .customize-section-title > h3' ).append( '<span class="dashicons-before dashicons-flag" style="padding-right:.2em; padding-top: 2px; float:left;"></span>' );

	// Add icons to site identity.
	jQuery( '#accordion-section-title_tagline > h3' ).addClass( 'dashicons-before dashicons-art' );
	jQuery( '#sub-accordion-section-title_tagline .customize-section-title > h3' ).append( '<span class="dashicons-before dashicons-art" style="padding-right:.2em; padding-top: 2px; float:left;"></span>' );

	// Add icons to widgets.
	jQuery( '#accordion-panel-widgets > h3' ).addClass( 'dashicons-before dashicons-welcome-widgets-menus' );
	jQuery( '#sub-accordion-panel-widgets .panel-title' ).prepend( '<span class="dashicons-before dashicons-welcome-widgets-menus" style="position: relative; padding-right:.2em; top: 2px;"></span>' );

	// Add icons to woocommerce.
	jQuery( '#accordion-panel-woocommerce > h3' ).addClass( 'dashicons-before dashicons-cart' );
	jQuery( '#sub-accordion-panel-woocommerce .panel-title' ).prepend( '<span class="dashicons-before dashicons-cart" style="position: relative; padding-right:.2em; top: 2px;"></span>' );

	// Add icons to menus.
	jQuery( '#accordion-panel-nav_menus > h3' ).addClass( 'dashicons-before dashicons-menu' );
	jQuery( '#sub-accordion-panel-nav_menus .panel-title' ).prepend( '<span class="dashicons-before dashicons-menu" style="position: relative; padding-right:.2em; top: 2px;"></span>' );

});
