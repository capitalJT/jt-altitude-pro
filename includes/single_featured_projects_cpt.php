<?php 
  $project_title = get_field('project_title');
  $project_url = get_field('project_url');
  $project_button_text = get_field('project_button_text');
?>

<header class="entry-header">
    <h1 class="entry-title" itemprop="headline"><?php echo the_title();?></h1>
    <h2><?php echo $project_title; ?></h2>
</header>

<?php while ( have_posts() ) : the_post(); ?>
  <article class="single-project">

    <div class="single-project-thumbnail">
      <?php the_post_thumbnail('large'); ?>
      <div class="img-description mb-4"><?php the_post_thumbnail_caption(); ?></div>
    </div>

    <div class="taxonomies mb-4">
      <div class="product-type">
          <div><?php echo get_the_term_list( $post->ID, 'product-type', 'Type of product: ', ', ', '' ); ?></div>
      </div>
      <div class="mood">
          <div><?php echo get_the_term_list( $post->ID, 'mood', 'The mood this puts me in: ', ', ', '' ); ?></div>
      </div>
    </div>
    
    <div class="single-project-content"><?php the_content(); ?></div>

    <a class="btn btn-primary" href="<?php echo $project_url; ?>"><?php echo $project_button_text; ?></a>

    <?php echo edit_post_link('(Edit)', '<span class="btn btn-warning my-2">', '</span>'); ?>

  </article>
<?php endwhile; ?>