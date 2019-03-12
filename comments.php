<?php

/**
 * @author: VLThemes
 * @version: 1.0
 */

if ( post_password_required() ) {
	return;
}

?>

<div class="vlt-comments">

	<?php if ( have_comments() ) : ?>

		<h3 class="vlt-comments__title" ><?php comments_number( esc_html__( 'No Comments', '@@textdomain' ) , esc_html__( 'One Comment', '@@textdomain' ), esc_html__( '% Comments', '@@textdomain' ) ); ?></h3>

		<ul class="vlt-comments__list">
			<?php
				wp_list_comments( array(
					'avatar_size' => 60,
					'style' => 'ul',
					'short_ping' => true,
					'reply_text' => esc_html__( 'Reply', '@@textdomain' ),
					'callback' => 'docs_callback_custom_comment',
				) );
			?>
		</ul>

		<?php echo docs_get_comment_navigation(); ?>

	<?php endif; ?>

	<div class="vlt-comment-form">

		<?php
			$commenter = wp_get_current_commenter();
			$args = array(
				'label_submit' => esc_html__( 'Submit Comment', '@@textdomain' ),
				'title_reply' => esc_html__( 'Leave a Comment', '@@textdomain' ),
				'title_reply_before' => '<h3 class="vlt-comment-form__title">',
				'title_reply_after' => '</h3>',
				'cancel_reply_before' => '',
				'cancel_reply_after' => '',
				'title_reply_to' => esc_html__( 'Leave a Reply', '@@textdomain' ),
				'cancel_reply_link' => esc_html__( 'Cancel Reply', '@@textdomain' ),
				'submit_button' => '<button type="submit" id="%2$s" class="%3$s">%4$s</button>',
				'class_submit' => 'vlt-btn vlt-btn--primary',
				'comment_field' => '<div class="vlt-form-group"><textarea id="comment" name="comment" rows="6" placeholder="' . esc_attr__( 'Comment', '@@textdomain' ) . '"></textarea></div>',
				'fields' => array(
					'author' => '<div class="vlt-form-row three-col"><div class="vlt-form-group"><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" placeholder="'.esc_attr__( 'Name*', '@@textdomain' ).'"></div>',
					'email' => '<div class="vlt-form-group"><input id="email" name="email" type="text" value="' . esc_attr( $commenter['comment_author_email'] ) . '" placeholder="' . esc_attr__( 'E-mail*', '@@textdomain' ) . '"></div>',
					'url' => '<div class="vlt-form-group"><input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" maxlength="200" placeholder="' . esc_attr__( 'Website', '@@textdomain' ) . '"></div></div>',
				),
			);
		?>

		<?php comment_form( $args ); ?>

	</div>
	<!-- /.vlt-comments__reply -->

</div>
<!-- /.vlt-comments -->