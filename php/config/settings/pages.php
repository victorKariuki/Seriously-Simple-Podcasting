<?php
/**
 * Podcast app pages settings – custom section (no standard fields).
 * Content is rendered by Settings_Controller::render_pages_crud_section().
 *
 * @package Simple Podcasting
 */

return array(
	'title'       => __( 'Manage Podcast Pages', 'seriously-simple-podcasting' ),
	'description' => __( 'Create and assign WordPress pages for the podcast app: Home, Episode, Series, Library, and Search. These pages use shortcodes so the full podcast UI works without relying on your theme.', 'seriously-simple-podcasting' ),
	'fields'      => array(),
);
