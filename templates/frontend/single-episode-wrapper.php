<?php
/**
 * Wrapper template for single episode when "Use podcast app layout" is enabled.
 * Outputs minimal wrapper and the episode detail shortcode (global $post is the episode).
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class( 'ssp-app-body' ); ?>>
<?php wp_body_open(); ?>
<div class="ssp-app-wrapper">
	<?php echo do_shortcode( '[ssp_episode_detail]' ); ?>
</div>
<?php wp_footer(); ?>
</body>
</html>
