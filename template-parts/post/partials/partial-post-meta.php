<?php

/**
 * @author: VLThemes
 * @version: @@version
 */

$post_type = get_post_type();
$category_tax = $post_type == 'knowbase' ? 'category_knowbase' : 'category';

?>

<div class="vlt-post-meta">

	<span><i class="ri-calendar-2-line"></i><a href="<?php the_permalink(); ?>"><time datetime="<?php the_time( 'c' ); ?>"><?php echo get_the_date(); ?></time></a></span>

	<?php if ( docspress_get_post_taxonomy( get_the_ID(), $category_tax ) ) : ?>
		<span><i class="ri-price-tag-3-line"></i><?php echo docspress_get_post_taxonomy( get_the_ID(), $category_tax, ', ' ); ?></span>
	<?php endif; ?>

</div>
<!-- /.vlt-post-meta -->