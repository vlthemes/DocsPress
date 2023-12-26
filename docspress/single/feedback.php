<?php
/**
 * Single docs feedback template
 *
 * This template can be overridden by copying it to yourtheme/docspress/single/feedback.php.
 *
 * @author nK
 * @package docspress/Templates
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! docspress()->get_option( 'show_feedback_buttons', 'docspress_single', true ) ) {
	return;
}

// phpcs:disable
$show_counts = docspress()->get_option( 'show_feedback_buttons_likes', 'docspress_single', true );

?>

<div class="vlt-doc-feedback docspress-single-feedback">

	<?php
		$positive = 0;
		$negative = 0;
		$positive_title = '';
		$negative_title = '';

		if ( $show_counts ) {
			$positive = (int) get_post_meta( get_the_ID(), 'positive', true );
			$negative = (int) get_post_meta( get_the_ID(), 'negative', true );

			// translators: %s - likes number.
			$positive_title = $positive ? sprintf( _n( '%d person found this useful', '%d persons found this useful', $positive, '@@textdomain' ), number_format_i18n( $positive ) ) : __( 'No votes yet', '@@textdomain' );

			// translators: %s - dislikes number.
			$negative_title = $negative ? sprintf( _n( '%d person found this not useful', '%d persons found this not useful', $negative, '@@textdomain' ), number_format_i18n( $negative ) ) : __( 'No votes yet', '@@textdomain' );
		}
		// phpcs:enable
	?>

	<span><?php echo esc_html__( 'Was this page helpful?', '@@textdomain' ); ?></span>

	<div class="vlt-doc-feedback__vote docspress-single-feedback-vote">

		<a href="#" data-id="<?php the_ID(); ?>" data-type="positive" data-tippy-content="<?php echo esc_attr( $positive_title ); ?>" data-tippy-placement="top">
			<i class="ri-thumb-up-fill"></i>
		</a>

		<a href="#" data-id="<?php the_ID(); ?>" data-type="negative" data-tippy-content="<?php echo esc_attr( $negative_title ); ?>" data-tippy-placement="top">
			<i class="ri-thumb-down-fill"></i>
		</a>

	</div>

</div>
<!-- /.vlt-doc-feedback -->