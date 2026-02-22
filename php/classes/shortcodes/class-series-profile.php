<?php

namespace SeriouslySimplePodcasting\ShortCodes;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Podcast app Series / Show profile shortcode.
 *
 * @package Simple Podcasting
 */
class Series_Profile implements Shortcode {

	/**
	 * Shortcode output for series (show) profile view.
	 *
	 * @param array $params Shortcode parameters (optional 'series' => slug or term id).
	 * @return string HTML output.
	 */
	public function shortcode( $params ) {
		$atts = shortcode_atts( array(
			'series' => '',
		), $params, 'ssp_series_profile' );

		$series_slug = $atts['series'];
		if ( ! $series_slug ) {
			$series_slug = get_query_var( 'series_slug', '' );
		}
		if ( ! $series_slug ) {
			$series_slug = get_query_var( 'podcast_series', '' );
		}

		$term = null;
		if ( $series_slug ) {
			if ( is_numeric( $series_slug ) ) {
				$term = get_term( (int) $series_slug, ssp_series_taxonomy() );
			} else {
				$term = get_term_by( 'slug', $series_slug, ssp_series_taxonomy() );
			}
		}
		if ( ! $term || is_wp_error( $term ) ) {
			return ssp_renderer()->fetch( 'frontend/series-profile', array( 'series' => null, 'episodes' => array() ) );
		}

		$repo     = ssp_frontend_controller()->episode_repository;
		$query    = $repo->get_episodes_query( array(
			'episodes_number' => 50,
			'podcast_term'    => $term->term_id,
			'episode_types'   => 'all_podcast_types',
		) );
		$episodes = $query->get_posts();

		$data = array(
			'series'   => $term,
			'episodes' => $episodes,
		);
		return ssp_renderer()->fetch( 'frontend/series-profile', $data );
	}
}
