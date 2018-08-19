<?php
    $project_title = get_field('project_title');
    $project_url = get_field('project_url');
    $project_button_text = get_field('project_button_text');
?>

<article class="featured-project-list-item">
  
    <a href="<?php echo get_permalink(); ?>"><h1 class="article-title"><?php echo the_title();?></h1></a>

	<?php if ( has_post_thumbnail()): ?>
        <div class="thumbnail">
			<?php the_post_thumbnail('full'); ?>
        </div>
	<?php endif; ?>

	<?php if ($project_title) : ?>
        <div class="project-title"><?php echo $project_title;?></div>
	<?php endif; ?>

	<?php if ($project_url) : ?>
        <a class="project-url" href="<?php echo $project_url;?>">  <?php echo $project_button_text;?></a>
	<?php endif; ?>

  <?php echo edit_post_link('(Edit)', '<span>', '</span>'); ?>
</article>