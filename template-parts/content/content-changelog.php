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
	<!-- /.vlt-changelog-title -->

	<div class="vlt-changelog-meta">
		<span><i class="fas fa-calendar-plus"></i><a href="<?php the_permalink(); ?>"><time datetime="<?php the_modified_date( 'c' ); ?>"><?php the_modified_date(); ?></time></a></span>
	</div>
	<!-- /.vlt-changelog-meta -->

</article>
<!-- /.vlt-changelog -->