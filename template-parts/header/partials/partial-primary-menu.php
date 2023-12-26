<?php

/**
 * @author: VLThemes
 * @version: @@version
 */

wp_nav_menu( array(
	'theme_location' => 'primary-menu',
	'container' => false,
	'depth' => 3,
	'link_before' => '<span class="menu-item-text">',
	'link_after' => '</span>',
	'menu_class' => 'sf-menu',
	'fallback_cb' => 'docspress_fallback_menu'
) );