<?php

namespace SeriouslySimplePodcasting\Controllers;

use SeriouslySimplePodcasting\ShortCodes\Episode_Detail;
use SeriouslySimplePodcasting\ShortCodes\Player;
use SeriouslySimplePodcasting\ShortCodes\Podcast;
use SeriouslySimplePodcasting\ShortCodes\Podcast_Episode;
use SeriouslySimplePodcasting\ShortCodes\Podcast_Home;
use SeriouslySimplePodcasting\ShortCodes\Podcast_Library;
use SeriouslySimplePodcasting\ShortCodes\Podcast_Playlist;
use SeriouslySimplePodcasting\ShortCodes\Podcast_Search;
use SeriouslySimplePodcasting\ShortCodes\Series_Profile;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Shortcodes Controller
 *
 * @author      Serhiy Zakharchenko
 * @category    Class
 * @package     SeriouslySimplePodcasting/Controllers
 * @since       2.10.0
 */
class Shortcodes_Controller extends Controller {

	/**
	 * Constructor
	 *
	 * @param string $file Plugin base file.
	 * @param string $version Plugin version number
	 */
	public function __construct( $file, $version ) {
		parent::__construct( $file, $version );

		$this->register_hooks_and_filters();
	}

	/**
	 * Register all relevant front end hooks and filters
	 */
	public function register_hooks_and_filters() {
		// Add shortcodes
		add_action( 'init', array( $this, 'register_shortcodes' ), 1 );
	}

	/**
	 * Register plugin shortcodes
	 * @return void
	 */
	public function register_shortcodes () {
		add_shortcode( 'ss_player', array( new Player(), 'shortcode' ) );
		add_shortcode( 'ss_podcast', array( new Podcast(), 'shortcode' ) );
		add_shortcode( 'podcast_episode', array( new Podcast_Episode(), 'shortcode' ) );
		add_shortcode( 'podcast_playlist', array( new Podcast_Playlist(), 'shortcode' ) );
		add_shortcode( 'ssp_podcast_home', array( new Podcast_Home(), 'shortcode' ) );
		add_shortcode( 'ssp_episode_detail', array( new Episode_Detail(), 'shortcode' ) );
		add_shortcode( 'ssp_series_profile', array( new Series_Profile(), 'shortcode' ) );
		add_shortcode( 'ssp_podcast_library', array( new Podcast_Library(), 'shortcode' ) );
		add_shortcode( 'ssp_podcast_search', array( new Podcast_Search(), 'shortcode' ) );
	}

}
