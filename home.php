<?php


add_action( 'genesis_meta', 'latitude_home_genesis_meta' );
/**
 * Add widget support for homepage. If no widgets active, display the default loop.
 *
 */
function latitude_home_genesis_meta() {

	if ( is_active_sidebar( 'featured' ) || is_active_sidebar( 'welcome' ) || is_active_sidebar( 'home-middle-1' ) || is_active_sidebar( 'home-middle-2' ) || is_active_sidebar( 'home-middle-3' ) ) {

		remove_action( 'genesis_loop', 'genesis_do_loop' );
		add_action( 'genesis_loop', 'latitude_home_loop_helper' );
		add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

	}
}


function latitude_home_loop_helper() {

	if ( is_active_sidebar( 'featured' ) ) {
		echo '<div class="featured">';
		dynamic_sidebar( 'featured' );
		echo '</div><!-- end .featured -->';
	}
	
	if ( is_active_sidebar( 'welcome' ) ) {
			echo '<div class="welcome">';
			dynamic_sidebar( 'welcome' );
			echo '</div><!-- end .welcome -->';
		}
	
	echo '<div class="home-middle">';
	
	if ( is_active_sidebar( 'home-middle-1' ) ) {
		echo '<div class="home-middle-1">';
		dynamic_sidebar( 'home-middle-1' );
		echo '</div><!-- end .home-middle-1 -->';
	}
	
	if ( is_active_sidebar( 'home-middle-2' ) ) {
		echo '<div class="home-middle-2">';
		dynamic_sidebar( 'home-middle-2' );
		echo '</div><!-- end .home-middle-2 -->';
	}
	
	if ( is_active_sidebar( 'home-middle-3' ) ) {
		echo '<div class="home-middle-3">';
		dynamic_sidebar( 'home-middle-3' );
		echo '</div><!-- end .home-middle-3 -->';
	}
	
	echo '</div><!-- end .home-middle -->';
	
}


genesis();