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
      <div class="img-description mb-4 small"><?php the_post_thumbnail_caption(); ?></div>
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


    <?php
        /* Only display to logged in users */
        if ( is_user_logged_in() ) {

	        /* Displaying the image caption and description */
	        $thumb_img = get_post( get_post_thumbnail_id() ); // Get post by ID
	        echo '<p>The Caption: ' . $thumb_img->post_excerpt . '<br>'; // Display Caption
	        echo 'The Description: ' . $thumb_img->post_content . '</p> '; // Display Description

	        /* Displaying the image alt text */
	        $thumb_img_meta = get_post_meta( get_post_thumbnail_id() ); // Get post meta by ID
	        echo $thumb_img_meta['_wp_attachment_image_alt']['0']; // Display Alt text

        } else {
            echo '';
        }
    ?>

  </article>
<?php endwhile; ?>




