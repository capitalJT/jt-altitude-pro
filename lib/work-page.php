<?php 

/**
* Template Name: Work Template
*/

add_action('genesis_loop', 'work_loop');

function work_loop(){
	/* START - Case Studies */
	$work_args = array(
		'post_type'  => 'work',
		'orderby'=> 'menu_order',
		'order', 'ASC',
	);

	$work = new WP_Query($work_args);

	if ($work -> have_posts()) { ?>
		<ul class="work-list">
			<?php while($work -> have_posts()): $work ->the_post(); ?>
				<li class="work-list-item"><?php get_template_part( '/includes/work_cpt' );?></li>
			<?php endwhile; ?>
		</ul>
	<?php }
	/* END - Case Studies */
}

genesis();