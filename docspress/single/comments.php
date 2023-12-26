<?php
/**
 * Single docs comments template
 *
 * This template can be overridden by copying it to yourtheme/docspress/single/comments.php.
 *
 * @author nK
 * @package docspress/Templates
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// If comments are open or we have at least one comment, load up the comment template.
if ( comments_open() || get_comments_number() ) { ?>

	<div class="vlt-doc-comments">

		<?php comments_template(); ?>

	</div>
	<!-- /.vlt-doc-comments -->

<?php }
