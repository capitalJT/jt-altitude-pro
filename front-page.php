<?php
/**
 * This file adds the Home Page to the Altitude Pro Theme.
 *
 * @author StudioPress
 * @package Altitude
 * @subpackage Customizations
 */

add_action( 'genesis_meta', 'altitude_front_page_genesis_meta' );
/**
 * Add widget support for homepage. If no widgets active, display the default loop.
 *
 */
function altitude_front_page_genesis_meta() {

	if ( is_active_sidebar( 'front-page-1' ) || is_active_sidebar( 'front-page-2' ) || is_active_sidebar( 'front-page-3' ) || is_active_sidebar( 'front-page-4' ) || is_active_sidebar( 'front-page-5' ) || is_active_sidebar( 'front-page-6' ) || is_active_sidebar( 'front-page-7' ) ) {

		//* Enqueue scripts
		add_action( 'wp_enqueue_scripts', 'altitude_enqueue_altitude_script' );
		function altitude_enqueue_altitude_script() {

			// wp_enqueue_script( 'altitude-script', get_bloginfo( 'stylesheet_directory' ) . '/js/home.js', array( 'jquery' ), '1.0.0' );
			wp_enqueue_script( 'localScroll', get_stylesheet_directory_uri() . '/dist/scripts/vendor/jquery.localScroll.min.js', array( 'scrollTo' ), '1.2.8b', true );
			wp_enqueue_script( 'scrollTo', get_stylesheet_directory_uri() . '/dist/scripts/vendor/jquery.scrollTo.min.js', array( 'jquery' ), '1.4.5-beta', true );

		}

		//* Add front-page body class
		add_filter( 'body_class', 'altitude_body_class' );
		function altitude_body_class( $classes ) {

   			$classes[] = 'front-page';
  			return $classes;

		}

		//* Force full width content layout
		add_filter( 'genesis_site_layout', '__genesis_return_full_width_content' );

		//* Remove breadcrumbs
		remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );

		//* Remove the default Genesis loop
		remove_action( 'genesis_loop', 'genesis_do_loop' );

		//* Add homepage widgets
		add_action( 'genesis_loop', 'altitude_front_page_widgets' );

		//* Add featured-section body class
		if ( is_active_sidebar( 'front-page-1' ) ) {

			//* Add image-section-start body class
			add_filter( 'body_class', 'altitude_featured_body_class' );
			function altitude_featured_body_class( $classes ) {

				$classes[] = 'featured-section';				
				return $classes;

			}

		}

	}

}

//* Add markup for front page widgets
function altitude_front_page_widgets() {

	genesis_widget_area( 'front-page-1', array(
		'before' => '<div id="front-page-1" class="front-page-1"><div class="image-section"><div class="flexible-widgets widget-area' . altitude_widget_area_class( 'front-page-1' ) . '"><div class="wrap">',
		'after'  => '</div></div></div></div>',
	) );

	genesis_widget_area( 'front-page-2', array(
		'before' => '<div id="front-page-2" class="front-page-2"><div class="solid-section"><div class="flexible-widgets widget-area' . altitude_widget_area_class( 'front-page-2' ) . '"><div class="wrap">',
		'after'  => '</div></div></div></div>',
	) );

	genesis_widget_area( 'front-page-3', array(
		'before' => '<div id="front-page-3" class="front-page-3"><div class="image-section"><div class="flexible-widgets widget-area' . altitude_widget_area_class( 'front-page-3' ) . '"><div class="wrap">',
		'after'  => '</div></div></div></div>',
	) );

	genesis_widget_area( 'front-page-4', array(
		'before' => '<div id="front-page-4" class="front-page-4"><div class="solid-section"><div class="flexible-widgets widget-area' . altitude_widget_area_class( 'front-page-4' ) . '"><div class="wrap">',
		'after'  => '</div></div></div></div>',
	) );

	genesis_widget_area( 'front-page-5', array(
		'before' => '<div id="front-page-5" class="front-page-5"><div class="image-section"><div class="flexible-widgets widget-area' . altitude_widget_area_class( 'front-page-5' ) . '"><div class="wrap">',
		'after'  => '</div></div></div></div>',
	) );

	genesis_widget_area( 'front-page-6', array(
		'before' => '<div id="front-page-6" class="front-page-6"><div class="solid-section"><div class="flexible-widgets widget-area' . altitude_widget_area_class( 'front-page-6' ) . '"><div class="wrap">',
		'after'  => '</div></div></div></div>',
	) );

	genesis_widget_area( 'front-page-7', array(
		'before' => '<div id="front-page-7" class="front-page-7"><div class="image-section"><div class="flexible-widgets widget-area' . altitude_widget_area_class( 'front-page-7' ) . '"><div class="wrap">',
		'after'  => '</div></div></div></div>',
	) );

}


//* Add Featured Projects to home page
add_action('genesis_after_content', 'featured_projects_loop');

function featured_projects_loop(){
	/* START - Featured Projects */
	$featured_projects_args = array(
		'post_type'  => 'featured-projects',
		'showposts' => '3',
		'orderby' => 'menu_order',
		'order' => 'ASC',
	);

	$featured_projects = new WP_Query($featured_projects_args);

	if  ( ($featured_projects -> have_posts()) && is_front_page() ) {

		echo '<div class="d-block clearboth text-center">';
		echo '<h3 class="title">Featured Projects</h3>';
		while($featured_projects -> have_posts()): $featured_projects ->the_post();
			get_template_part( '/includes/featured_projects_homepage_items' );
		endwhile;

		echo '<a class="btn btn-primary mx-auto" href="' . get_permalink( get_page_by_path( 'featured-projects' ) ) . '"><div class="jt">View All Featured Projects</div></a>';
		echo '</div>';
	}
	/* END - Featured Projects */
}


genesis();
