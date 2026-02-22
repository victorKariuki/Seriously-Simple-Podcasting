<?php

namespace SeriouslySimplePodcasting\ShortCodes;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Podcast app Episode detail shortcode.
 *
 * @package Simple Podcasting
 */
class Episode_Detail implements Shortcode {

	/**
	 * Shortcode output for single episode detail view.
	 *
	 * @param array $params Shortcode parameters (optional 'episode' => post ID).
	 * @return string HTML output.
	 */
	public function shortcode( $params ) {
		$atts = shortcode_atts( array(
			'episode' => 0,
		), $params, 'ssp_episode_detail' );

		$episode_id = (int) $atts['episode'];
		if ( ! $episode_id ) {
			global $post;
			if ( isset( $post->ID ) && in_array( $post->post_type, ssp_post_types(), true ) ) {
				$episode_id = (int) $post->ID;
			}
		}
		if ( ! $episode_id ) {
			$episode_id = (int) get_query_var( 'podcast_episode', 0 );
		}
		if ( ! $episode_id ) {
			return '';
		}

		$episode = get_post( $episode_id );
		if ( ! $episode || ! in_array( $episode->post_type, ssp_post_types(), true ) ) {
			return '';
		}

		$repo         = ssp_frontend_controller()->episode_repository;
		$player_data  = $repo->get_player_data( $episode_id );
		$players_controller = ssp_frontend_controller()->players_controller;
		$player_html  = $players_controller->render_html_player( $episode_id, true, 'shortcode' );

		$data = array(
			'episode'       => $episode,
			'episode_id'    => $episode_id,
			'player_data'   => $player_data,
			'player_html'   => $player_html,
		);
		return ssp_renderer()->fetch( 'frontend/episode-detail', $data );
	}
}
