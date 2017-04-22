<?php 
  $description = get_field('description');
  // $downloadLink = get_field('download_link');
  // $downloadCTA = "Download!";
  ?>
<article class="article-list-item">
  
  <a href="<?php echo get_permalink(); ?>"><h1 class="article-title"><?php echo the_title();?></h1></a>

  <div><?php the_post_thumbnail('full'); ?></div>
  <div><?php the_content(); ?></div>

  <?php  
    if ($description){ ?>
      <div class="article-description"><?php echo $description;?></div>
    <?php
    }
  ?>
  
  <section class="article-content"><?php echo the_field('body_content');?></section>
  
  
  <!-- <?php if ($downloadLink){ ?>
  <footer>
    <span class="downloadlink">
      <a href="<?php echo $downloadLink;?>" target="_blank">
        <button type="submit"><?php echo $downloadCTA; ?></button>
      </a>
    </span> 
  </footer>
  <?php } ?> -->
  
  <?php echo edit_post_link('(Edit)', '<span>', '</span>'); ?>
</article>