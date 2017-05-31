<?php 
  $skills = get_field('skills');
?>

<a class="work-list-item" href="<?php echo get_permalink(); ?>">
	<div class="text">
		<h3 class="work-title"><?php echo the_title();?></h3>

		<?php if ($skills) : ?>
			<div class="work-skills"><?php echo $skills;?></div>
		<?php endif; ?>
	</div>
	

	<div class="thumbnail">
	<?php the_post_thumbnail('full'); ?>
	</div>

	<div class="overlay"></div>

	<?php echo edit_post_link('(Edit)', '<span>', '</span>'); ?>
</a>