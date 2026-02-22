<?php
/**
 * Sidebar navigation for podcast app.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$pages_option = get_option( 'ss_podcasting_pages', array() );
$home_url     = isset( $pages_option['podcast_home'] ) && $pages_option['podcast_home'] ? get_permalink( $pages_option['podcast_home'] ) : home_url( '/' );
$library_url  = isset( $pages_option['library'] ) && $pages_option['library'] ? get_permalink( $pages_option['library'] ) : $home_url;
$search_url   = isset( $pages_option['search'] ) && $pages_option['search'] ? get_permalink( $pages_option['search'] ) : $home_url;
?>
<nav class="ssp-sidebar-nav" aria-label="<?php esc_attr_e( 'Podcast app', 'seriously-simple-podcasting' ); ?>">
	<ul class="ssp-sidebar-nav__list">
		<li class="ssp-sidebar-nav__item"><a class="ssp-sidebar-nav__link" href="<?php echo esc_url( $home_url ); ?>"><?php esc_html_e( 'Home', 'seriously-simple-podcasting' ); ?></a></li>
		<li class="ssp-sidebar-nav__item"><a class="ssp-sidebar-nav__link" href="<?php echo esc_url( $library_url ); ?>"><?php esc_html_e( 'Library', 'seriously-simple-podcasting' ); ?></a></li>
		<li class="ssp-sidebar-nav__item"><a class="ssp-sidebar-nav__link" href="<?php echo esc_url( $search_url ); ?>"><?php esc_html_e( 'Search', 'seriously-simple-podcasting' ); ?></a></li>
	</ul>
</nav>
