<?php

/**
 * @author: VLThemes
 * @version: @@version
 */

?>

<article <?php post_class( 'vlt-single-theme' ); ?>>

	<?php the_content(); ?>

	<div class="clearfix"></div>

</article>
<!-- /.vlt-page -->

<?php

	get_template_part( 'template-parts/theme/sections/single-theme-section', 'tagcloud' );
	get_template_part( 'template-parts/theme/sections/single-theme-section', 'plugins' );
	get_template_part( 'template-parts/theme/sections/single-theme-section', 'theme-features' );
	get_template_part( 'template-parts/theme/sections/single-theme-section', 'related-themes' );