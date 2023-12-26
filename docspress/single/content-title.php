<?php
/**
 * Single docs content title template
 *
 * This template can be overridden by copying it to yourtheme/docspress/single/content-title.php.
 *
 * @author nK
 * @package docspress/Templates
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<header class="vlt-docspress-single__header entry-header">

	<?php docspress()->get_template_part( 'single/content-breadcrumbs' ); ?>

	<?php the_title( '<h1 class="vlt-doc-title">', '</h1>' ); ?>

</header>
<!-- /.vlt-docspress-single-content__header -->