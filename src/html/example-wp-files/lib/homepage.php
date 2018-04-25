<?php 

/**
* Template Name: Homepage
*/
add_action('genesis_loop', 'homepage_loop');

function homepage_loop(){

	$homepage_args = array(
		'post_type'  => 'home_page_sections',
		'posts_per_page' => '12',
	);

	$homepagesections = new WP_Query($homepage_args);
	if(($homepagesections -> have_posts()) && (is_page( 'home' ))) {
		while($homepagesections -> have_posts()): $homepagesections ->the_post();
		?>
		
		<section class="homepage-section section-one" style="background-image: url('<?php echo get_field('section_one_bgimg'); ?>');">
			<a class="" href="dls/<?php echo the_field('section_one_anchor');?>">
				<div class="homepage-section-text-wrapper">
					<span class="section-title"><?php echo the_field('section_one_title');?></span>
					<span class="section-blurb"><?php echo the_field('section_one_blurb');?></span>
					<span class="section-cta"><?php echo the_field('section_one_cta');?></span>
				</div>
			</a>
		</section>

		<section class="homepage-section section-two" style="background-image: url('<?php echo get_field('section_two_bgimg'); ?>');">
			<a href="dls/<?php echo the_field('section_two_anchor');?>">
				<div class="homepage-section-text-wrapper">
					<span class="section-title"><?php echo the_field('section_two_title');?></span>
					<span class="section-blurb"><?php echo the_field('section_two_blurb');?></span>
					<span class="section-cta"><?php echo the_field('section_two_cta');?></span>
				</div>	
			</a>
		</section>

		<section class="homepage-section section-three" style="background-image: url('<?php echo get_field('section_three_bgimg'); ?>');">
			<a href="dls/<?php echo the_field('section_three_anchor');?>">
				<div class="homepage-section-text-wrapper">
					<span class="section-title"><?php echo the_field('section_three_title');?></span>
					<span class="section-blurb"><?php echo the_field('section_three_blurb');?></span>
					<span class="section-cta"><?php echo the_field('section_three_cta');?></span>
				</div>	
			</a>
		</section>

		<?php
		// echo edit_post_link( $link, $class );
		endwhile;
	}
}
genesis();