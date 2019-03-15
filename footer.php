<?php

	get_template_part( 'template-parts/footer/footer' );
	do_action( 'docs/after_site' );

	if ( is_active_sidebar( 'subscribe_popup_sidebar' ) ) {
		echo '<div style="display: none;" id="vlt-subscribe-popup">';
		dynamic_sidebar( 'subscribe_popup_sidebar' );
		echo '</div>';
	}

?>

<?php wp_footer(); ?>

</body>
</html>