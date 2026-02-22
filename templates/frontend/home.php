<?php
/**
 * Podcast app Home / Browse view.
 * @var WP_Post[] $episodes
 * @var WP_Term[] $series
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
include SSP_PLUGIN_PATH . 'templates/frontend/partials/layout-start.php';
?>
<div class="ssp-app ssp-app-home">
	<div class="ssp-app__content">
		<?php if ( ! empty( $series ) ) : ?>
		<section class="ssp-app__section">
			<h2 class="ssp-app__heading"><?php esc_html_e( 'Podcasts', 'seriously-simple-podcasting' ); ?></h2>
			<div class="ssp-app__grid ssp-app__grid--series">
				<?php foreach ( $series as $term ) : ?>
				<a href="<?php echo esc_url( get_term_link( $term ) ); ?>" class="ssp-media-card">
					<span class="ssp-art-thumbnail ssp-art-thumbnail--placeholder"></span>
					<span class="ssp-media-card__title"><?php echo esc_html( $term->name ); ?></span>
				</a>
				<?php endforeach; ?>
			</div>
		</section>
		<?php endif; ?>
		<section class="ssp-app__section">
			<h2 class="ssp-app__heading"><?php esc_html_e( 'Recent episodes', 'seriously-simple-podcasting' ); ?></h2>
			<?php if ( ! empty( $episodes ) ) : ?>
			<div class="ssp-app__grid ssp-app__grid--episodes">
				<?php foreach ( $episodes as $episode ) : ?>
				<a href="<?php echo esc_url( get_permalink( $episode->ID ) ); ?>" class="ssp-media-card">
					<?php echo ssp_episode_image( $episode->ID, 'medium' ); ?>
					<span class="ssp-media-card__title"><?php echo esc_html( get_the_title( $episode->ID ) ); ?></span>
				</a>
				<?php endforeach; ?>
			</div>
			<?php else : ?>
			<p class="ssp-app__empty"><?php esc_html_e( 'No episodes found.', 'seriously-simple-podcasting' ); ?></p>
			<?php endif; ?>
		</section>
	</div>
</div>
<?php include SSP_PLUGIN_PATH . 'templates/frontend/partials/layout-end.php'; ?>
