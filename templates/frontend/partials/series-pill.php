<?php
/**
 * Series pill: small rounded tag for category/series.
 * @var string $label
 * @var string $url Optional link.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$url = isset( $url ) ? $url : '';
?>
<?php if ( $url ) : ?>
	<a href="<?php echo esc_url( $url ); ?>" class="ssp-series-pill"><?php echo esc_html( $label ); ?></a>
<?php else : ?>
	<span class="ssp-series-pill"><?php echo esc_html( $label ); ?></span>
<?php endif; ?>
