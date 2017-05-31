<?php 
  $description = get_field('description');
?>

<article class="article-list-item">
  
  <a href="<?php echo get_permalink(); ?>"><h1 class="article-title"><?php echo the_title();?></h1></a>

  <div class="thumbnail">
    <?php the_post_thumbnail('full'); ?>
  </div>

  <?php if ($description) : ?>
    <div class="article-description"><?php echo $description;?></div>
  <?php endif; ?>

  <?php echo edit_post_link('(Edit)', '<span>', '</span>'); ?>
</article>