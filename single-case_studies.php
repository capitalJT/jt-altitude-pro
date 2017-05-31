<?php
/*
Template Name: Single Case Study
*/

remove_action('genesis_loop', 'genesis_do_loop');

add_action('genesis_loop', 'singleCaseStudy_loop');

function singleCaseStudy_loop() {

    $casestudy_args = array(
		'post_type'  => 'case_studies',
		'orderby'=> 'menu_order',
		'order', 'ASC',
	);

	$casestudies = new WP_Query($casestudy_args);

	if ($casestudies -> have_posts()) {
		get_template_part( '/includes/single_case_study_cpt' );
	}
}

genesis();