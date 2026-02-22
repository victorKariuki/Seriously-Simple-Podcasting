<?php
/**
 * Layout end: close main + player bar.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
	</main>
	<?php ssp_renderer()->render( 'frontend/partials/player-bar', array() ); ?>
</div>
