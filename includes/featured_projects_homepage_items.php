<?php
    $project_title = get_field('project_title');
    $project_url = get_field('project_url');
    $project_button_text = get_field('project_button_text');
?>

<div class="feature-projects-homepage-item mb-5">
  
    <a href="<?php echo get_permalink(); ?>"><h1 class="article-title"><?php echo the_title();?></h1></a>

    <div class="thumbnail">
        <?php the_post_thumbnail('full'); ?>
    </div>

    <?php if ($project_title): ?>
        <div class="project-title"><?php echo $project_title;?></div>
    <?php endif; ?>

	<?php if ( has_excerpt()): ?>
        <div class="project-excerpt"><?php echo the_excerpt();?></div>
	<?php endif; ?>

    <?php if ($project_url) : ?>
        <a class="project-url btn btn-primary" href="<?php echo $project_url;?>"><?php echo $project_button_text;?></a>
    <?php endif; ?>


    <?php echo edit_post_link('(Edit)', '<span class="btn btn-warning my-2">', '</span>'); ?>
</div>

