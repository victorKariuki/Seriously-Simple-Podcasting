<?php
/**
 * Podcast app Series / Show profile view.
 * @var WP_Term|null $series
 * @var WP_Post[]    $episodes
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
include SSP_PLUGIN_PATH . 'templates/frontend/partials/layout-start.php';
?>
<div class="ssp-app ssp-app-series-profile">
	<div class="ssp-app__content">
		<?php if ( $series ) : ?>
			<header class="ssp-hero-header">
				<h1 class="ssp-hero-header__title"><?php echo esc_html( $series->name ); ?></h1>
				<?php if ( $series->description ) : ?>
					<p class="ssp-hero-header__description"><?php echo esc_html( $series->description ); ?></p>
				<?php endif; ?>
			</header>
			<section class="ssp-app__section">
				<h2 class="ssp-app__heading"><?php esc_html_e( 'Episodes', 'seriously-simple-podcasting' ); ?></h2>
				<?php if ( ! empty( $episodes ) ) : ?>
					<ul class="ssp-list-rows">
						<?php foreach ( $episodes as $episode ) : ?>
							<li class="ssp-list-row">
								<a href="<?php echo esc_url( get_permalink( $episode->ID ) ); ?>" class="ssp-list-row__link">
									<?php echo ssp_episode_image( $episode->ID, 'thumbnail' ); ?>
									<span class="ssp-list-row__title"><?php echo esc_html( get_the_title( $episode->ID ) ); ?></span>
									<span class="ssp-list-row__meta"><?php echo esc_html( get_the_date( '', $episode->ID ) ); ?></span>
								</a>
							</li>
						<?php endforeach; ?>
					</ul>
				<?php else : ?>
					<p class="ssp-app__empty"><?php esc_html_e( 'No episodes in this show.', 'seriously-simple-podcasting' ); ?></p>
				<?php endif; ?>
			</section>
		<?php else : ?>
			<p class="ssp-app__empty"><?php esc_html_e( 'Show not found.', 'seriously-simple-podcasting' ); ?></p>
		<?php endif; ?>
	</div>
</div>
<?php include SSP_PLUGIN_PATH . 'templates/frontend/partials/layout-end.php'; ?>
