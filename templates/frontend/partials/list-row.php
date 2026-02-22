<?php
/**
 * List row component.
 * @var string $url
 * @var string $image_html
 * @var string $title
 * @var string $meta
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$meta = isset( $meta ) ? $meta : '';
?>
<a href="<?php echo esc_url( $url ); ?>" class="ssp-list-row__link">
	<span class="ssp-list-row__image"><?php echo $image_html; ?></span>
	<span class="ssp-list-row__title"><?php echo esc_html( $title ); ?></span>
	<?php if ( $meta ) : ?><span class="ssp-list-row__meta"><?php echo esc_html( $meta ); ?></span><?php endif; ?>
</a>
