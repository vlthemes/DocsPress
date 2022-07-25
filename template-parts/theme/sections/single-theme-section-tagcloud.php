<?php

/**
 * @author: VLThemes
 * @version: @@version
 */

$show_tagcloud = get_the_term_list( $post->ID, 'theme_category' ) ||
	get_the_term_list( $post->ID, 'theme_colors' ) ||
	get_the_term_list( $post->ID, 'theme_tags' ) ||
	get_the_term_list( $post->ID, 'theme_styles' ) ||
	get_the_term_list( $post->ID, 'theme_plugins' ) ||
	get_the_term_list( $post->ID, 'theme_layouts' ) ||
	get_the_term_list( $post->ID, 'theme_elements' ) ||
	get_the_term_list( $post->ID, 'theme_author' );

if ( $show_tagcloud ) :

?>

<section class="vlt-single-theme-section vlt-single-theme-section--tagcloud has-background-shade-3">

	<div class="container">

		<div class="vlt-theme-tagcloud">

			<?php if ( get_the_term_list( $post->ID, 'theme_category' ) ) : ?>
				<span>
					<?php printf( __( '<span class="vlt-theme-tagcloud__title">Categories:</span> %s', '@@textdomain' ), get_the_term_list( $post->ID, 'theme_category', '', '' ) ); ?>
				</span>
			<?php endif; ?>

			<?php if ( get_the_term_list( $post->ID, 'theme_colors' ) ) : ?>
				<span>
					<?php printf( __( '<span class="vlt-theme-tagcloud__title">Colors:</span> %s', '@@textdomain' ), get_the_term_list( $post->ID, 'theme_colors', '', '' ) ); ?>
				</span>
			<?php endif; ?>

			<?php if ( get_the_term_list( $post->ID, 'theme_tags' ) ) : ?>
				<span>
					<?php printf( __( '<span class="vlt-theme-tagcloud__title">Tags:</span> %s', '@@textdomain' ), get_the_term_list( $post->ID, 'theme_tags', '', '' ) ); ?>
				</span>
			<?php endif; ?>

			<?php if ( get_the_term_list( $post->ID, 'theme_styles' ) ) : ?>
				<span>
					<?php printf( __( '<span class="vlt-theme-tagcloud__title">Styles:</span> %s', '@@textdomain' ), get_the_term_list( $post->ID, 'theme_styles', '', '' ) ); ?>
				</span>
			<?php endif; ?>

			<?php if ( get_the_term_list( $post->ID, 'theme_plugins' ) ) : ?>
				<span>
					<?php printf( __( '<span class="vlt-theme-tagcloud__title">Plugins:</span> %s', '@@textdomain' ), get_the_term_list( $post->ID, 'theme_plugins', '', '' ) ); ?>
				</span>
			<?php endif; ?>

			<?php if ( get_the_term_list( $post->ID, 'theme_layouts' ) ) : ?>
				<span>
					<?php printf( __( '<span class="vlt-theme-tagcloud__title">Layouts:</span> %s', '@@textdomain' ), get_the_term_list( $post->ID, 'theme_layouts', '', '' ) ); ?>
				</span>
			<?php endif; ?>

			<?php if ( get_the_term_list( $post->ID, 'theme_elements' ) ) : ?>
				<span>
					<?php printf( __( '<span class="vlt-theme-tagcloud__title">Elements:</span> %s', '@@textdomain' ), get_the_term_list( $post->ID, 'theme_elements', '', '' ) ); ?>
				</span>
			<?php endif; ?>

			<?php if ( get_the_term_list( $post->ID, 'theme_authors' ) ) : ?>
				<span>
					<?php printf( __( '<span class="vlt-theme-tagcloud__title">Authors:</span> %s', '@@textdomain' ), get_the_term_list( $post->ID, 'theme_authors', '', '' ) ); ?>
				</span>
			<?php endif; ?>

		</div>

	</div>

</section>

<?php endif; ?>