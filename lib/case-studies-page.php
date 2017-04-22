<?php 

/**
* Template Name: Case Study Template
*/

add_action('genesis_loop', 'casestudy_loop');

function casestudy_loop(){
	/* START - Case Studies */
	$casestudy_args = array(
		'post_type'  => 'case_studies',
		'orderby'=> 'menu_order',
		'order', 'ASC',
	);

	$casestudies = new WP_Query($casestudy_args);

	if ($casestudies -> have_posts()) {
		while($casestudies -> have_posts()): $casestudies ->the_post();
			get_template_part( '/includes/case_study_cpt' );
		endwhile;
	}
	/* END - Case Studies */
}

genesis();