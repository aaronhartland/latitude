<?php
/** Start the engine */
require_once( TEMPLATEPATH . '/lib/init.php' );

/** Child theme (do not remove) */
define( 'CHILD_THEME_NAME', 'Latitude Theme' );
define( 'CHILD_THEME_URL', 'http://www.aaronhartland.com/themes/latitude' );

/** Add new featured image sizes */
add_image_size('home-middle', 296, 106, TRUE);
add_image_size( 'portfolio', 202, 140, TRUE );

/** Add suport for custom background */
add_custom_background();

/** Add support for custom header */
add_theme_support( 'genesis-custom-header', array( 'width' => 960, 'height' => 120, 'textcolor' => 'ffffff', 'admin_header_callback' => 'latitude_admin_style' ) );

/**
 * Register a custom admin callback to display the custom header preview with the
 * same style as is shown on the front end.
 *
 */
function latitude_admin_style() {

	$headimg = sprintf( '.appearance_page_custom-header #headimg { background: url(%s) no-repeat; font-family: Oswald, arial, serif; min-height: %spx; text-transform: uppercase; }', get_header_image(), HEADER_IMAGE_HEIGHT );
	$h1 = sprintf( '#headimg h1, #headimg h1 a { color: #%s; font-size: 48px; font-weight: normal; line-height: 60px; margin: 35px 0 0; text-decoration: none; }', esc_html( get_header_textcolor() ) );
	$desc = sprintf( '#headimg #desc { display: none; }', esc_html( get_header_textcolor() ) );

	printf( '<style type="text/css">%1$s %2$s %3$s</style>', $headimg, $h1, $desc );
	
}


/** Add support for structural wraps */
add_theme_support( 'genesis-structural-wraps', array( 'header', 'nav', 'subnav', 'inner', 'footer-widgets', 'footer' ) );

/** Add support for 3-column footer widgets */
add_theme_support( 'genesis-footer-widgets', 3 );

/** Reposition the secondary navigation */
remove_action( 'genesis_after_header', 'genesis_do_subnav' );
add_action( 'genesis_before_header', 'genesis_do_subnav' );


/** Customize the post info function */
add_filter('genesis_post_info', 'post_info_filter');
function post_info_filter($post_info) {
if (!is_page()) {
    $post_info = '[post_date] by [post_author_posts_link] &middot; [post_comments] [post_edit]';
    return $post_info;
}}

/** Customize the post meta function */
add_filter('genesis_post_meta', 'post_meta_filter');
function post_meta_filter($post_meta) {
if (!is_page()) {
    $post_meta = '[post_categories] &middot; [post_tags]';
    return $post_meta;
}}


/** Register widget areas */
genesis_register_sidebar( array(
	'id'			=> 'featured',
	'name'			=> __( 'Featured', 'latitude' ),
	'description'	=> __( 'This is the featured section.', 'latitude' ),
) );
genesis_register_sidebar( array(
	'id'			=> 'welcome',
	'name'			=> __( 'Welcome', 'latitude' ),
	'description'	=> __( 'This is the welcome section.', 'latitude' ),
) );
genesis_register_sidebar( array(
	'id'			=> 'home-middle-1',
	'name'			=> __( 'Home Middle #1', 'latitude' ),
	'description'	=> __( 'This is the first column of the home middle section.', 'latitude' ),
) );
genesis_register_sidebar( array(
	'id'			=> 'home-middle-2',
	'name'			=> __( 'Home Middle #2', 'latitude' ),
	'description'	=> __( 'This is the second column of the home middle section.', 'latitude' ),
) );
genesis_register_sidebar( array(
	'id'			=> 'home-middle-3',
	'name'			=> __( 'Home Middle #3', 'latitude' ),
	'description'	=> __( 'This is the third column of the home middle section.', 'latitude' ),
) );
genesis_register_sidebar( array(
	'id'			=> 'portfolio',
	'name'			=> __( 'Portfolio Page', 'latitude' ),
	'description'	=> __( 'This is the portfolio page template.', 'latitude' ),
) );