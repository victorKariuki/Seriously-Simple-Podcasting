<?php
/**
 * Podcast app Library view.
 * @var WP_Post[] $episodes
 * @var WP_Term[] $series
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
include SSP_PLUGIN_PATH . 'templates/frontend/partials/layout-start.php';
?>
<div class="ssp-app ssp-app-library">
	<div class="ssp-app__content">
		<h1 class="ssp-app__page-title"><?php esc_html_e( 'Your Library', 'seriously-simple-podcasting' ); ?></h1>
		<?php if ( ! empty( $episodes ) || ! empty( $series ) ) : ?>
			<?php if ( ! empty( $series ) ) : ?>
				<section class="ssp-app__section">
					<h2 class="ssp-app__heading"><?php esc_html_e( 'Podcasts', 'seriously-simple-podcasting' ); ?></h2>
					<div class="ssp-app__grid">
						<?php foreach ( $series as $term ) : ?>
							<a href="<?php echo esc_url( get_term_link( $term ) ); ?>" class="ssp-media-card">
								<span class="ssp-art-thumbnail ssp-art-thumbnail--placeholder"></span>
								<span class="ssp-media-card__title"><?php echo esc_html( $term->name ); ?></span>
							</a>
						<?php endforeach; ?>
					</div>
				</section>
			<?php endif; ?>
			<?php if ( ! empty( $episodes ) ) : ?>
				<section class="ssp-app__section">
					<h2 class="ssp-app__heading"><?php esc_html_e( 'Episodes', 'seriously-simple-podcasting' ); ?></h2>
					<ul class="ssp-list-rows">
						<?php foreach ( $episodes as $episode ) : ?>
							<li class="ssp-list-row">
								<a href="<?php echo esc_url( get_permalink( $episode->ID ) ); ?>" class="ssp-list-row__link">
									<?php echo ssp_episode_image( $episode->ID, 'thumbnail' ); ?>
									<span class="ssp-list-row__title"><?php echo esc_html( get_the_title( $episode->ID ) ); ?></span>
								</a>
							</li>
						<?php endforeach; ?>
					</ul>
				</section>
			<?php endif; ?>
		<?php else : ?>
			<p class="ssp-app__empty"><?php esc_html_e( 'You have not followed any podcasts yet.', 'seriously-simple-podcasting' ); ?></p>
		<?php endif; ?>
	</div>
</div>
<?php include SSP_PLUGIN_PATH . 'templates/frontend/partials/layout-end.php'; ?>
<?php include SSP_PLUGIN_PATH . 'templates/frontend/partials/layout-end.php'; ?>
