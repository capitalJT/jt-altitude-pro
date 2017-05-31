<?php 
  $title = get_field('title');
  $description = get_field('description');
?>


<header class="entry-header">
  <h1 class="entry-title" itemprop="headline"><?php echo the_title();?></h1> 
</header>

<article class="single-case-study">
  <div><?php echo $title; ?></div>
  <div><?php the_post_thumbnail('large'); ?></div>
  <div><?php the_content(); ?></div>
  
  <section class="article-content">
    <?php echo the_field('body_content');?>
  </section>
  
  
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