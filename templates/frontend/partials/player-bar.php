<?php
/**
 * Floating / persistent player bar placeholder.
 * When an episode is playing, Castos player can be rendered here or via JS.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="ssp-player-bar" id="ssp-player-bar" aria-label="<?php esc_attr_e( 'Now playing', 'seriously-simple-podcasting' ); ?>">
	<div class="ssp-player-bar__inner">
		<div class="ssp-player-bar__artwork"></div>
		<div class="ssp-player-bar__info">
			<span class="ssp-player-bar__title"><?php esc_html_e( 'Nothing playing', 'seriously-simple-podcasting' ); ?></span>
		</div>
		<div class="ssp-player-bar__controls">
			<button type="button" class="ssp-player-bar__btn ssp-player-bar__play" aria-label="<?php esc_attr_e( 'Play', 'seriously-simple-podcasting' ); ?>"></button>
		</div>
		<div class="ssp-player-bar__progress">
			<div class="ssp-player-bar__progress-fill"></div>
		</div>
		<div class="ssp-player-bar__volume">
			<button type="button" class="ssp-player-bar__btn ssp-player-bar__mute" aria-label="<?php esc_attr_e( 'Volume', 'seriously-simple-podcasting' ); ?>"></button>
		</div>
	</div>
</div>
