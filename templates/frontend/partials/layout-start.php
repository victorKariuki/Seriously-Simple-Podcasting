<?php
/**
 * Layout start: sidebar + main content wrapper.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="ssp-app-layout">
	<aside class="ssp-app-layout__sidebar">
		<?php ssp_renderer()->render( 'frontend/partials/sidebar-nav', array() ); ?>
	</aside>
	<main class="ssp-app-layout__main" role="main">
