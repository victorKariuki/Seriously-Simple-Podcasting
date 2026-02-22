<?php
/**
 * Podcast app Episode detail view.
 * @var WP_Post $episode
 * @var int     $episode_id
 * @var array   $player_data
 * @var string  $player_html
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
include SSP_PLUGIN_PATH . 'templates/frontend/partials/layout-start.php';
?>
<div class="ssp-app ssp-app-episode-detail">
	<div class="ssp-app__content">
		<article class="ssp-episode-detail">
			<div class="ssp-episode-detail__artwork">
				<?php echo ssp_episode_image( $episode_id, 'large' ); ?>
			</div>
			<div class="ssp-episode-detail__body">
				<h1 class="ssp-episode-detail__title"><?php echo esc_html( get_the_title( $episode_id ) ); ?></h1>
				<?php if ( ! empty( $player_html ) ) : ?>
					<div class="ssp-episode-detail__player"><?php echo $player_html; ?></div>
				<?php endif; ?>
				<div class="ssp-episode-detail__content">
					<?php echo apply_filters( 'the_content', $episode->post_content ); ?>
				</div>
			</div>
		</article>
	</div>
</div>
<?php include SSP_PLUGIN_PATH . 'templates/frontend/partials/layout-end.php'; ?>
