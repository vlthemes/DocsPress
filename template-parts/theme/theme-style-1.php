<?php

/**
 * @author: VLThemes
 * @version: @@version
 */

global $post;

$title = get_the_title();
$subtitle = get_the_excerpt() ? get_the_excerpt() : '';
$demo_url = get_post_meta( $post->ID, 'demo_url', true ) ? get_post_meta( $post->ID, 'demo_url', true ) : '';
$sales = get_post_meta( $post->ID, 'sales', true ) ? get_post_meta( $post->ID, 'sales', true ) : 0;
$price = get_post_meta( $post->ID, 'price', true ) ? get_post_meta( $post->ID, 'price', true ) : false;
$trending = get_post_meta( $post->ID, 'trending', true ) ? true : false;

$post_class = 'vlt-theme-card';

if ( apply_filters( 'vlthemes/theme-transform', true ) ) {
	$post_class .= ' has-transform';
}

if ( apply_filters( 'vlthemes/theme-top-bar', true ) ) {
	$post_class .= ' has-top-bar';
}

?>

<article <?php post_class( $post_class ); ?>>

	<div class="vlt-theme-card__media">

		<?php if ( apply_filters( 'vlthemes/theme-top-bar', true ) ) : ?>

			<div class="vlt-theme-card__bar">
				<span></span>
				<span></span>
				<span></span>
			</div>

		<?php endif; ?>

		<div class="vlt-theme-card__image">

			<div class="vlt-theme-card__overlay">

				<?php if ( $demo_url ) : ?>
					<a href="<?php echo esc_url( $demo_url ); ?>" target="_blank"><?php esc_html_e( 'Live Theme', '@@textdomain' ); ?></a>
				<?php endif; ?>

				<a href="<?php the_permalink(); ?>"><?php esc_html_e( 'Details', '@@textdomain' ); ?></a>

			</div>

			<?php the_post_thumbnail( 'full', array( 'loading' => 'lazy' ) ); ?>

		</div>

	</div>

	<div class="vlt-theme-card__content">

		<h5 class="vlt-theme-card__title">

			<?php

				if ( $trending === 'yes' ) {
					echo '<i class="fa-solid fa-fw fa-bookmark"></i>';
				}

			?>

			<a href="<?php the_permalink(); ?>"><?php echo $title ? esc_html( $title ) : get_the_title(); ?></a>

		</h5>

		<?php if ( ! empty( $subtitle ) ) : ?>

			<p class="vlt-theme-card__subtitle"><?php echo esc_html( $subtitle ); ?></p>

		<?php endif; ?>

	</div>

	<div class="vlt-theme-card__footer vlt-display-2">

		<div class="vlt-theme-card__category">

			<?php if ( docs_get_post_taxonomy( get_the_ID(), 'theme_category' ) ) : ?>

				<?php echo docs_get_post_taxonomy( get_the_ID(), 'theme_category', ', ' ); ?>

			<?php endif; ?>

		</div>

		<?php if ( $sales || $price ) : ?>

			<div class="vlt-theme-card__stats">

				<?php if ( $sales ) : ?>
					<span><?php printf( __( '%s sales', '@@textdomain' ), $sales ); ?></span>
				<?php endif; ?>

				<?php if ( $price ) : ?>
					<span><?php printf( __( '$%s', '@@textdomain' ), $price ); ?></span>
				<?php endif; ?>

			</div>

		<?php endif; ?>

	</div>

</article>