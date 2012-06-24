<?php
/*
Template Name: Portfolio
*/

/** Force the full width layout layout on the Portfolio page */
add_filter( 'genesis_pre_get_option_site_layout', 'latitude_portfolio_layout' );
function latitude_portfolio_layout( $opt ) {
	return 'full-width-content';
}

/** Remove the standard loop */
remove_action( 'genesis_loop', 'genesis_do_loop' );

/** Add the portfolio widget area */
add_action( 'genesis_loop', 'latitude_portfolio_widget' );
function latitude_portfolio_widget() {
	dynamic_sidebar( 'Portfolio Page' );
}

genesis();