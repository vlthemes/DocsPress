<?php
/**
 * Docs archive loop title template
 *
 * This template can be overridden by copying it to yourtheme/docspress/archive/loop-title.php.
 *
 * @author nK
 * @package docspress/Templates
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// phpcs:disable
$articles = get_pages(
	array(
		'child_of' => get_the_ID(),
		'post_type' => 'docs',
	)
);
$articles_count = count( $articles );
// phpcs:enable

?>

<a href="<?php the_permalink(); ?>" class="vlt-doc-item-title docspress-archive-list-item-title">
	<?php the_post_thumbnail( 'docspress_archive' ); ?>
	<span>
		<span>
			<?php
			// translators: %s articles count.
			printf( esc_html( _n( '%s Article', '%s Articles', $articles_count, '@@textdomain' ) ), esc_html( $articles_count ) );
			?>
		</span>
		<h5><?php the_title(); ?></h5>
	</span>
</a>
