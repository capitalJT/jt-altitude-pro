<?php 

/**
* Template Name: OnAir Template
*/

add_action('genesis_loop', 'onair_loop');

function onair_loop(){


	/* START - On-Air Page Sections */
	$onair_args = array(
		'post_type'  => 'onair_page_sections',
		'orderby'=> 'menu_order',
		'order', 'ASC',
	);

	$onairsections = new WP_Query($onair_args);
	if(($onairsections -> have_posts()) && (is_page( 'on-air' ))) {
		while($onairsections -> have_posts()): $onairsections ->the_post();
			get_template_part( '/includes/dls_cpt' );
		endwhile;
	}
	/* END - On-Air Page Sections */

	/* START - On-Air Elements */
	$elements_args = array(
		'post_type'  => 'onair_elements',
		'orderby'=> 'menu_order',
		'order', 'ASC',
	);

	$onairelements = new WP_Query($elements_args);
	if(($onairelements -> have_posts()) && (is_page( 'elements' ))) {
		while($onairelements -> have_posts()): $onairelements ->the_post();
			get_template_part( '/includes/dls_cpt' );
		endwhile;
	}
	/* END - On-Air Elements */

	/* START - On-Air Structures */
	$structures_args = array(
		'post_type'  => 'onair_structures',
		'orderby'=> 'menu_order',
		'order', 'ASC',
	);

	$onairstructures = new WP_Query($structures_args);
	if(($onairstructures -> have_posts()) && (is_page( 'structures' ))) {
		while($onairstructures -> have_posts()): $onairstructures ->the_post();
			get_template_part( '/includes/dls_cpt' );
		endwhile;
	}
	/* END - On-Air Structures */

	/* START - On-Air Demos */
	$demos_args = array(
		'post_type'  => 'onair_demos',
		'orderby'=> 'menu_order',
		'order', 'ASC',
	);

	$onairdemos = new WP_Query($demos_args);
	if(($onairdemos -> have_posts()) && (is_page( 'demos' ))) {
		while($onairdemos -> have_posts()): $onairdemos ->the_post();
			get_template_part( '/includes/dls_cpt' );
		endwhile;	
	}
	/* END - On-Air Demos */
}

// remove Primary Sidebar from the Primary Sidebar area
remove_action( 'genesis_sidebar', 'genesis_do_sidebar' );

// On-Air custom menu
add_action( 'genesis_after_header', 'dls_onair_menu' );
function dls_onair_menu() {
    genesis_widget_area( 'onair-menu', array(
		'before' => '<div class="dls-menu onair-menu second-level-menu widget-area"><div class="wrap">',
		'after'  => '</div></div>', 
	) );
}

// On-Air custom sidebar
add_action( 'genesis_after_content', 'dls_onair_sidebar' );
function dls_onair_sidebar() {
    genesis_widget_area( 'onair-sidebar', array(
		'before' => '<aside class="dls-sidebar onair-sidebar sidebar sidebar-primary widget-area"><div class="wrap">',
		'after'  => '</div></aside>', 
	) );  
}

genesis();