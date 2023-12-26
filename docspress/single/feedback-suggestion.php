<?php
/**
 * Single docs feedback suggestion template
 *
 * This template can be overridden by copying it to yourtheme/docspress/single/feedback-suggestion.php.
 *
 * @author nK
 * @package docspress/Templates
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// phpcs:disable
$admin_email = docspress()->get_option( 'show_feedback_suggestion_email', 'docspress_single', '' ) ? : get_option( 'admin_email' );

if (
	! docspress()->get_option( 'show_feedback_buttons', 'docspress_single', true ) ||
	! docspress()->get_option( 'show_feedback_suggestion', 'docspress_single', false ) ||
	! $admin_email
) {
	return;
}

$from = '';

if ( is_user_logged_in() ) {
	$user = wp_get_current_user();

	if ( $user->display_name ) {
		$from = $user->display_name;
	}

	if ( $user->user_email ) {
		$from .= ( $from ? ' <' : '' ) . $user->user_email . ( $from ? '>' : '' );
	}
}
// phpcs:enable

?>

<form class="vlt-docspress-single__feedback-suggestion docspress-single-feedback-suggestion" action="" method="post" style="display: none;">

	<h3><?php echo esc_html__( 'How can we improve this documentation?', '@@textdomain' ); ?></h3>

	<div class="vlt-form-group">
		<input name="from" type="text" value="<?php echo esc_attr( $from ); ?>" placeholder="<?php echo esc_attr__( 'Your Name or Email (Optional)', '@@textdomain' ); ?>">
	</div>

	<div class="vlt-form-group">
		<textarea name="suggestion" placeholder="<?php echo esc_attr__( 'Your suggestions', '@@textdomain' ); ?>" required></textarea>
	</div>

	<div class="vlt-form-group m-0">
		<button class="vlt-btn vlt-btn--primary"><?php echo esc_attr__( 'Send', '@@textdomain' ); ?></button>
	</div>

	<input type="hidden" name="id" value="<?php echo esc_attr( get_the_ID() ); ?>">
	<input type="hidden" name="action" value="docspress_suggestion">


</form>
<!-- /.vlt-docspress-single__feedback-suggestion -->
