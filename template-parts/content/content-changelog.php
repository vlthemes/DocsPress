<?php

/**
 * @author: VLThemes
 * @version: @@version
 */

?>

<article <?php post_class( 'vlt-changelog' ); ?>>

	<div class="vlt-changelog-title">
		<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
	</div>

	<div class="vlt-changelog-meta">
		<span><a href="<?php the_permalink(); ?>"><time datetime="<?php the_time( 'c' ); ?>"><?php echo get_the_date(); ?></time></a></span>
	</div>

</article>
<!-- /.vlt-changelog -->