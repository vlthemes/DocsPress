<?php
/**
 * Single docs content title template
 *
 * This template can be overridden by copying it to yourtheme/docspress/single/content-title.php.
 *
 * @author  nK
 * @package docspress/Templates
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

?>

<header class="entry-header">

	<?php the_title( '<h1 class="entry-title" itemprop="headline">', '</h1>' ); ?>

	<div class="vlt-post-meta">
		<span><i class="icofont icofont-eye-alt"></i><?php echo docs_get_post_views( get_the_ID() ); ?><?php docs_get_post_views( get_the_ID() ) < 2 ? esc_html_e( ' view', '@@textdomain' ) : esc_html_e( ' views', '@@textdomain' ); ?></span>
		<span><i class="icofont icofont-ui-calendar"></i><a href="<?php the_permalink(); ?>"><time datetime="<?php the_modified_date( 'c' ); ?>"><?php echo the_modified_date(); ?></time></a></span>
	</div>
	<!-- /.vlt-post-meta -->

</header><!-- .entry-header -->
