<?php
/**
 * Art thumbnail: 1:1 ratio, subtle shadow.
 * @var string $image_html
 * @var string $alt
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$image_html = isset( $image_html ) ? $image_html : '';
$alt        = isset( $alt ) ? $alt : '';
?>
<span class="ssp-art-thumbnail">
	<?php if ( $image_html ) : ?>
		<?php echo $image_html; ?>
	<?php else : ?>
		<span class="ssp-art-thumbnail__placeholder" aria-hidden="true"></span>
	<?php endif; ?>
</span>
