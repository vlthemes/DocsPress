<?php

/**
 * @author: VLThemes
 * @version: @@version
 */

?>

<article <?php post_class( 'vlt-page vlt-page--empty' ); ?>>

	<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

		<p><?php esc_html_e( 'Ready to publish your first post?', '@@textdomain' ); ?></p>
		<a href="<?php echo esc_url( admin_url( 'post-new.php' ) ); ?>" class="vlt-btn vlt-btn--primary"><?php esc_html_e( 'Get started here', '@@textdomain' ); ?></a>

	<?php elseif ( is_search() ): ?>

		<p><?php esc_html_e( 'Sorry, but nothing matched your search terms.', '@@textdomain' ); ?></p>

	<?php else: ?>

		<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for.', '@@textdomain' ); ?></p>

	<?php endif; ?>

</article>
<!-- /.vlt-page -->