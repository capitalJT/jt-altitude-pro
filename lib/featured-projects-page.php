<?php 

/**
* Template Name: Featured Projects Template
*/

add_action('genesis_loop', 'featured_projects_loop');

function featured_projects_loop(){
	/* START - Featured Projects */
	$featured_projects_args = array(
		'post_type'  => 'featured-projects',
		'orderby' => 'menu_order',
		'order' => 'DESC',
	);

	$featured_projects = new WP_Query($featured_projects_args);

	if ($featured_projects -> have_posts()) {
		while($featured_projects -> have_posts()): $featured_projects ->the_post();
			get_template_part( '/includes/featured_projects_cpt' );
		endwhile;
	}
	/* END - Featured Projects */
}

genesis();