<?php

/**
 * @author: VLThemes
 * @version: @@version
 */

?>

<div class="vlt-post-meta vlt-post-meta--small">
	<span><i class="ri-calendar-2-line"></i><a href="<?php the_permalink(); ?>"><time datetime="<?php the_modified_date( 'c' ); ?>"><?php the_modified_date(); ?></time></a></span>
</div>
<!-- /.vlt-post-meta -->