<?php
/*
Template Name: Single Case Study
*/

remove_action('genesis_loop', 'genesis_do_loop');

add_action('genesis_loop', 'singleWork_loop');

function singleWork_loop() {

    $work_args = array(
		'post_type'  => 'work',
		'orderby'=> 'menu_order',
		'order', 'ASC',
	);

	$work = new WP_Query($work_args);

	if ($work -> have_posts()) {
		get_template_part( '/includes/single_work_cpt' );
	}
}

genesis();