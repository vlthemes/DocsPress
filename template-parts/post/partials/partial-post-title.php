<?php

/**
 * @author: VLThemes
 * @version: @@version
 */

?>

<h3 class="vlt-post-title">

	<?php

		if ( is_sticky() ) {

			echo '<i class="ri-bookmark-line"></i>';

		}

	?>

	<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>

</h3>
<!-- /.vlt-post-title -->