<?php

/**
 * @author: VLThemes
 * @version: @@version
 */

?>

<div class="vlt-page-title vlt-page-title--theme">

	<div class="container">

		<div class="d-flex">

			<?php if ( function_exists( 'get_field' ) && get_field( 'theme_thumbnail' ) ) : ?>

				<div class="vlt-page-title__image">

					<?php echo wp_get_attachment_image( get_field( 'theme_thumbnail' ), 'full', false, array( 'loading' => 'lazy' ) ); ?>

				</div>

			<?php endif; ?>


			<div class="vlt-page-title__content">

				<h1 class="vlt-page-title__title"><?php the_title(); ?></h1>

				<?php echo docs_get_breadcrumbs(); ?>

			</div>

		</div>

	</div>

</div>
<!-- /.vlt-page-title -->