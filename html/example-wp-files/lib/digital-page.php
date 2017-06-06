<?php 

/**
* Template Name: Digital Template
*/

add_action('genesis_loop', 'digital_loop');

function digital_loop(){


	/* START - Digital Page Sections */
	$digital_args = array(
		'post_type'  => 'digital_pg_sections',
		'orderby'=> 'menu_order',
		'order', 'ASC',
	);

	$digitalsections = new WP_Query($digital_args);
	if(($digitalsections -> have_posts()) && (is_page( 'digital' ))) {
		while($digitalsections -> have_posts()): $digitalsections ->the_post();
			get_template_part( '/includes/dls_cpt' );
		endwhile;
	}
	/* END - Digital Page Sections */

	/* START - Digital Elements */
	$elements_args = array(
		'post_type'  => 'digital_elements',
		'orderby'=> 'menu_order',
		'order', 'ASC',
	);

	$digitalelements = new WP_Query($elements_args);
	if(($digitalelements -> have_posts()) && (is_page( 'elements' ))) {
		while($digitalelements -> have_posts()): $digitalelements ->the_post();
			get_template_part( '/includes/dls_cpt' );
		endwhile;
	}
	/* END - Digital Elements */

	/* START - Digital Components */
	$components_args = array(
		'post_type'  => 'digital_components',
		'orderby'=> 'menu_order',
		'order', 'ASC',
	);

	$digitalcomponents = new WP_Query($components_args);
	if(($digitalcomponents -> have_posts()) && (is_page( 'components' ))) {
		while($digitalcomponents -> have_posts()): $digitalcomponents ->the_post();
			get_template_part( '/includes/dls_cpt' );
		endwhile;
	}
	/* END - Digital Components */

	/* START - Digital Templates */
	$templates_args = array(
		'post_type'  => 'digital_templates',
		'orderby'=> 'menu_order',
		'order', 'ASC',
	);

	$digitaltemplates = new WP_Query($templates_args);
	if(($digitaltemplates -> have_posts()) && (is_page( 'templates' ))) {
		while($digitaltemplates -> have_posts()): $digitaltemplates ->the_post();
			get_template_part( '/includes/dls_cpt' );
		endwhile;
	}
	/* END - Digital Templates */

		/* START - Digital Resources */
	$resources_args = array(
		'post_type'  => 'digital_resources',
		'orderby'=> 'menu_order',
		'order', 'ASC',
	);

	$digitalresources = new WP_Query($resources_args);
	if(($digitalresources -> have_posts()) && (is_page( 'resources' ))) {
		while($digitalresources -> have_posts()): $digitalresources ->the_post();
			get_template_part( '/includes/dls_cpt' );
		endwhile;
	}
	/* END - Digital Resources */
}

// remove Primary Sidebar from the Primary Sidebar area
remove_action( 'genesis_sidebar', 'genesis_do_sidebar' );

// Digital custom menu
add_action( 'genesis_after_header', 'dls_digital_menu' );
function dls_digital_menu() {
    genesis_widget_area( 'digital-menu', array(
		'before' => '<div class="dls-menu digital-menu second-level-menu widget-area"><div class="wrap">',
		'after'  => '</div></div>', 
	) );
}

// Digital custom sidebar
add_action( 'genesis_after_content', 'dls_digital_sidebar' );
function dls_digital_sidebar() {
    genesis_widget_area( 'digital-sidebar', array(
		'before' => '<aside class="dls-sidebar digital-sidebar sidebar sidebar-primary widget-area"><div class="wrap">',
		'after'  => '</div></aside>', 
	) );
}

genesis();