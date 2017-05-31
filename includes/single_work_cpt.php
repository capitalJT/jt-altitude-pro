<?php 
  $client = get_field('client');
  $image_description = get_field('image_description');
  $skills = get_field('skills');
  $ext_url = get_field('ext_url');
  $ext_url_text = get_field('ext_url_text');
?>

<header class="entry-header">
  <h1 class="entry-title" itemprop="headline"><?php echo the_title();?></h1> 
</header>

<?php while ( have_posts() ) : the_post(); ?>
  <article class="single-work">
    <div class="client-name"><?php echo $client; ?></div>
    <div class="post-thumbail"><?php the_post_thumbnail('large'); ?></div>
    <div class="img-description"><?php echo $image_description; ?></div>
    <div class="skill"><?php echo $skills; ?></div>
    <div class="content"><?php the_content(); ?>  </div>
    <div class="ext-url">
      <a class="button" href="<?php echo $ext_url; ?>" target="_blank"><?php echo $ext_url_text; ?></a>
    </div>
    <?php echo edit_post_link('(Edit)', '<span>', '</span>'); ?>
  </article>
<?php endwhile; ?>