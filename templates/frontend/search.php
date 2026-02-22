<?php
/**
 * Podcast app Search view.
 * @var string    $search_query
 * @var WP_Post[] $episodes
 * @var WP_Term[] $series
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
include SSP_PLUGIN_PATH . 'templates/frontend/partials/layout-start.php';
$pages_option = get_option( 'ss_podcasting_pages', array() );
$search_page_id = isset( $pages_option['search'] ) ? (int) $pages_option['search'] : 0;
$search_form_url = $search_page_id ? get_permalink( $search_page_id ) : home_url( '/' );
?>
<div class="ssp-app ssp-app-search">
	<div class="ssp-app__content">
		<h1 class="ssp-app__page-title"><?php esc_html_e( 'Search', 'seriously-simple-podcasting' ); ?></h1>
		<form role="search" method="get" class="ssp-search-form" action="<?php echo esc_url( $search_form_url ); ?>">
			<label class="screen-reader-text" for="ssp-search-input"><?php esc_html_e( 'Search episodes and shows', 'seriously-simple-podcasting' ); ?></label>
			<input type="search" id="ssp-search-input" class="ssp-search-form__input" name="s" value="<?php echo esc_attr( $search_query ); ?>" placeholder="<?php esc_attr_e( 'Search episodes and shows...', 'seriously-simple-podcasting' ); ?>" />
			<button type="submit" class="ssp-search-form__submit"><?php esc_html_e( 'Search', 'seriously-simple-podcasting' ); ?></button>
		</form>
		<?php if ( $search_query ) : ?>
			<?php if ( ! empty( $episodes ) || ! empty( $series ) ) : ?>
				<?php if ( ! empty( $series ) ) : ?>
					<section class="ssp-app__section">
						<h2 class="ssp-app__heading"><?php esc_html_e( 'Shows', 'seriously-simple-podcasting' ); ?></h2>
						<div class="ssp-app__grid">
							<?php foreach ( $series as $term ) : ?>
								<a href="<?php echo esc_url( get_term_link( $term ) ); ?>" class="ssp-media-card">
									<?php
									$image_id = get_term_meta( $term->term_id, 'podcast_image', true );
									if ( $image_id ) {
										echo wp_get_attachment_image( $image_id, 'medium', false, array( 'class' => 'ssp-art-thumbnail' ) );
									} else {
										echo '<span class="ssp-art-thumbnail ssp-art-thumbnail--placeholder"></span>';
									}
									?>
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
				<p class="ssp-app__empty"><?php esc_html_e( 'No episodes or shows found.', 'seriously-simple-podcasting' ); ?></p>
			<?php endif; ?>
		<?php endif; ?>
	</div>
</div>
<?php include SSP_PLUGIN_PATH . 'templates/frontend/partials/layout-end.php'; ?>
