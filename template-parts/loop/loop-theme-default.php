<?php

/**
 * @author: VLThemes
 * @version: @@version
 */

?>


<div class="vlt-themes-list">

<!-- 	<div class="vlt-themes-list-preloader d-none"><span class="double-bounce-one"></span><span class="double-bounce-two"></span></div>

	<div class="vlt-themes-list-alert vlt-alert-message d-none"></div>

	<div class="row" style="--bs-gutter-x: 45px; --bs-gutter-y: 70px;">
		 -->
		<?php

			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/theme/theme', 'style-1' );

			endwhile;
			wp_link_pages();

		?>

	<!-- </div> -->

</div>
<!-- /.vlt-isotope-grid -->