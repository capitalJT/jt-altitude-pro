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

	if ( is_active_sidebar( 'front-page-1' ) || is_active_sidebar( 'front-page-2' ) || is_active_sidebar( 'front-page-3' ) || is_active_sidebar( 'front-page-4' ) ) {

		//* Enqueue scripts
		add_action( 'wp_enqueue_scripts', 'altitude_enqueue_altitude_script' );
		function altitude_enqueue_altitude_script() {

			// wp_enqueue_script( 'altitude-script', get_bloginfo( 'stylesheet_directory' ) . '/js/home.js', array( 'jquery' ), '1.0.0' );
			wp_enqueue_script( 'localScroll', get_stylesheet_directory_uri() . '/dist/js/vendor/jquery.localScroll.min.js', array( 'scrollTo' ), '1.2.8b', true );
			wp_enqueue_script( 'scrollTo', get_stylesheet_directory_uri() . '/dist/js/vendor/jquery.scrollTo.min.js', array( 'jquery' ), '1.4.5-beta', true );

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

function jt_reviews_widget() {
	genesis_widget_area( 'front-page-4', array(
		'before' => '<div id="front-page-4" class="front-page-4"><div class="solid-section"><div class="flexible-widgets widget-area' . altitude_widget_area_class( 'front-page-4' ) . '"><div class="wrap">',
		'after'  => '</div></div></div></div>',
	) );

	echo '<div class="front-page-contact-form text-white">';
		echo '<div class="inner-wrapper">';
			echo '<div class="container">';
				echo '<div class="col-12 py-4">';
					echo '<div class="w-50 mx-auto">';
						echo '<h3 class="text-center">Contact Me</h3>';
						echo '<p class="text-center">Please use the form below to contact me for whatever you need:
Creating a new website, updating your old site, auditing your brand, employment opportunities, etc.</p>';
							if (in_array($_SERVER['REMOTE_ADDR'], array('127.0.0.1', '::1'))) {
								// code for localhost here
								echo do_shortcode("[wpforms id=\"568\" title=\"false\" description=\"false\"]");
							} else {
								echo do_shortcode("[wpforms id=\"302\" title=\"false\" description=\"false\"]");
							}
					echo '</div>';
				echo '</div>';
			echo '</div>';
		echo '</div>';
	echo '</div>';
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

	// I add this widget below the footer because featured projects displays below the content
	// TODO: Find a cleaner solution for this
	add_action('genesis_before_footer', 'jt_reviews_widget');

}

genesis();
