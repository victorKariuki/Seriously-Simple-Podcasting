<?php
/**
 * Media card component.
 * @var string $url
 * @var string $title
 * @var string $image_html
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<a href="<?php echo esc_url( $url ); ?>" class="ssp-media-card">
	<span class="ssp-media-card__image-wrap"><?php echo $image_html; ?></span>
	<span class="ssp-media-card__title"><?php echo esc_html( $title ); ?></span>
</a>
