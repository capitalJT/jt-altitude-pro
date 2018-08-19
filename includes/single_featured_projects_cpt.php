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
      <div class="img-description"><?php echo $image_description; ?></div>  
    </div>

    <div class="taxonomies mb-4">
      <div class="product-type mb-2">
          <p><?php echo get_the_term_list( $post->ID, 'product-type', 'Type of product: ', ', ', '' ); ?></p>

          <?php
              $terms = get_terms('product-type');
              if ( !empty( $terms ) && !is_wp_error( $terms ) ){

//                  echo '<div class="d-block">Type of product:</div>';
//                  echo '<ul>';
//                  foreach ( $terms as $term ) {
//                      echo '<li>' . $term->name . '</li>';
//                  }
//                  echo '</ul>';

	              echo '<div class="d-inline-block">Type of product: </div>';
	              echo '<div class="entry-terms d-inline-block ml-1">';
	              foreach ( $terms as $term ) {
		              $entry_terms .= $term->name . ', ';
	              }
	              $entry_terms = rtrim( $entry_terms, ', ' );
	              echo $entry_terms . '</div>';
              }
          ?>
      </div>
      <div class="mood">
          <?php echo get_the_term_list( $post->ID, 'mood', 'The mood this puts me in: ', ', ', '' ); ?>
      </div>
    </div>
    
    <div class="single-project-content"><?php the_content(); ?></div>

    <a class="btn btn-primary" href="<?php echo $project_url; ?>"><?php echo $project_button_text; ?></a>

    <?php echo edit_post_link('(Edit)', '<span class="btn btn-warning my-2">', '</span>'); ?>

  </article>
<?php endwhile; ?>