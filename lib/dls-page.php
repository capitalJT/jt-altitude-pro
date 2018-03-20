<?php 

/**
* Template Name: DLS Template
*/

add_action('genesis_loop', 'dls_loop');

function dls_loop(){


	/* START - Digital Page Sections */
	$dls_args = array(
		'post_type'  => 'dls_pg_sections',
		'orderby'=> 'menu_order',
		'order', 'ASC',
	);

	$dlsSections = new WP_Query($dls_args);
	if(($dlsSections -> have_posts()) && (is_page( 'dls' ))) {
		while($dlsSections -> have_posts()): $dlsSections ->the_post();
			get_template_part( '/includes/dls_cpt' );
		endwhile;
	}
	/* END - Digital Page Sections */

	/* START - Digital Elements */
	$elements_args = array(
		'post_type'  => 'dls_elements',
		'orderby'=> 'menu_order',
		'order', 'ASC',
	);

	$dlsElements = new WP_Query($elements_args);
	if(($dlsElements -> have_posts()) && (is_page( 'elements' ))) {
		while($dlsElements -> have_posts()): $dlsElements ->the_post();
			get_template_part( '/includes/dls_cpt' );
		endwhile;
	}
	/* END - Digital Elements */

	/* START - Digital Components */
	$components_args = array(
		'post_type'  => 'dls_components',
		'orderby'=> 'menu_order',
		'order', 'ASC',
	);

	$dlsComponents = new WP_Query($components_args);
	if(($dlsComponents -> have_posts()) && (is_page( 'components' ))) {
		while($dlsComponents -> have_posts()): $dlsComponents ->the_post();
			get_template_part( '/includes/dls_cpt' );
		endwhile;
	}
	/* END - Digital Components */

	/* START - Digital Templates */
	$templates_args = array(
		'post_type'  => 'dls_templates',
		'orderby'=> 'menu_order',
		'order', 'ASC',
	);

	$dlsTemplates = new WP_Query($templates_args);
	if(($dlsTemplates -> have_posts()) && (is_page( 'templates' ))) {
		while($dlsTemplates -> have_posts()): $dlsTemplates ->the_post();
			get_template_part( '/includes/dls_cpt' );
		endwhile;
	}
	/* END - Digital Templates */

		/* START - Digital Resources */
	$resources_args = array(
		'post_type'  => 'dls_resources',
		'orderby'=> 'menu_order',
		'order', 'ASC',
	);

	$dlsResources = new WP_Query($resources_args);
	if(($dlsResources -> have_posts()) && (is_page( 'resources' ))) {
		while($dlsResources -> have_posts()): $dlsResources ->the_post();
			get_template_part( '/includes/dls_cpt' );
		endwhile;
	}
	/* END - Digital Resources */
}

// remove Primary Sidebar from the Primary Sidebar area
remove_action( 'genesis_sidebar', 'genesis_do_sidebar' );

// Digital custom menu
add_action( 'genesis_after_header', 'dls_menu' );
function dls_menu() {
    genesis_widget_area( 'digital-menu', array(
		'before' => '<div class="dls-menu digital-menu second-level-menu widget-area"><div class="wrap">',
		'after'  => '</div></div>', 
	) );
}

// Digital custom sidebar
add_action( 'genesis_after_content', 'dls_sidebar' );
function dls_sidebar() {
    genesis_widget_area( 'digital-sidebar', array(
		'before' => '<aside class="dls-sidebar digital-sidebar sidebar sidebar-primary widget-area"><div class="wrap">',
		'after'  => '</div></aside>', 
	) );
}

genesis();