<?php

/**
 * @author: VLThemes
 * @version: 1.0.0
 */

?>

<article <?php post_class( 'vlt-page vlt-page--empty' ); ?>>
	<?php if ( is_home() && current_user_can( 'publish_posts' ) ): ?>
		<p><?php esc_html_e( 'Ready to publish your first post?', 'docs' ); ?></p>
		<a href="<?php echo esc_url( admin_url( 'post-new.php' ) ); ?>" class="vlt-btn vlt-btn--primary"><?php esc_html_e( 'Get started here', 'docs' ); ?></a>
	<?php elseif ( is_search() ): ?>
		<p><?php esc_html_e( 'Sorry, but nothing matched your search terms.', 'docs' ); ?></p>
	<?php else: ?>
		<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for.', 'docs' ); ?></p>
	<?php endif; ?>
</article>
<!-- /.vlt-page -->