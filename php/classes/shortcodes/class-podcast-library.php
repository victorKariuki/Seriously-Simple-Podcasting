<?php

namespace SeriouslySimplePodcasting\ShortCodes;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Podcast app Library shortcode.
 *
 * @package Simple Podcasting
 */
class Podcast_Library implements Shortcode {

	/**
	 * Shortcode output for library (saved/followed) view.
	 *
	 * @param array $params Shortcode parameters.
	 * @return string HTML output.
	 */
	public function shortcode( $params ) {
		$repo     = ssp_frontend_controller()->episode_repository;
		$query    = $repo->get_episodes_query( array(
			'episodes_number' => 100,
			'episode_types'   => 'all_podcast_types',
		) );
		$episodes = $query->get_posts();
		$series   = get_terms( array(
			'taxonomy'   => ssp_series_taxonomy(),
			'hide_empty' => true,
		) );
		$data = array(
			'episodes' => $episodes,
			'series'   => is_array( $series ) ? $series : array(),
		);
		return ssp_renderer()->fetch( 'frontend/library', $data );
	}
}
