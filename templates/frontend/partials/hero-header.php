<?php
/**
 * Hero header: large typography, optional cover art / gradient.
 * @var string $title
 * @var string $description
 * @var string $image_html Optional.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$image_html = isset( $image_html ) ? $image_html : '';
?>
<header class="ssp-hero-header">
	<?php if ( $image_html ) : ?>
		<div class="ssp-hero-header__art"><?php echo $image_html; ?></div>
	<?php endif; ?>
	<h1 class="ssp-hero-header__title"><?php echo esc_html( $title ); ?></h1>
	<?php if ( ! empty( $description ) ) : ?>
		<p class="ssp-hero-header__description"><?php echo esc_html( $description ); ?></p>
	<?php endif; ?>
</header>
