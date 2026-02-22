<?php

namespace SeriouslySimplePodcasting\ShortCodes;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Podcast app Search shortcode.
 *
 * @package Simple Podcasting
 */
class Podcast_Search implements Shortcode {

	/**
	 * Shortcode output for search (discovery) view.
	 *
	 * @param array $params Shortcode parameters.
	 * @return string HTML output.
	 */
	public function shortcode( $params ) {
		$search_query = get_query_var( 's', '' );
		if ( isset( $_GET['s'] ) ) {
			$search_query = sanitize_text_field( wp_unslash( $_GET['s'] ) );
		}

		$episodes = array();
		$series   = array();
		if ( $search_query ) {
			$episode_query = new \WP_Query( array(
				'post_type'      => ssp_post_types(),
				'post_status'    => 'publish',
				'posts_per_page' => 20,
				's'              => $search_query,
			) );
			$episodes = $episode_query->get_posts();
			$series   = get_terms( array(
				'taxonomy'   => ssp_series_taxonomy(),
				'hide_empty' => true,
				'search'     => $search_query,
			) );
			if ( ! is_array( $series ) ) {
				$series = array();
			}
		}

		$data = array(
			'search_query' => $search_query,
			'episodes'     => $episodes,
			'series'       => $series,
		);
		return ssp_renderer()->fetch( 'frontend/search', $data );
	}
}
