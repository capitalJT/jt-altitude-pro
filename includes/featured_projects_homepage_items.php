<?php
    $project_client = get_field('project_client');
    $project_url = get_field('project_url');
    $project_button_text = get_field('project_button_text');
    $homepage_toggle = get_field('homepage_toggle');

?>

<div class="container featured-projects-homepage-item mb-4">
    <div class="row align-items-center">

	    <?php if( get_field('homepage_toggle') ): ?>

		    <?php
		    /* This is where I'm going to set image left / right toggle. */
		    /* https://www.advancedcustomfields.com/resources/true-false/ */
		    /* The True / False field allows you to select a value that is either 1 or 0. */
		    ?>

            <div class="col-12 col-md-7 has-img">
			    <?php if ( has_post_thumbnail() ) : ?>
                    <a class="has-hover" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                        <img class="thumbnail" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_post_thumbnail_caption(); ?>" />
                    </a>
			    <?php endif; ?>
            </div>
            <div class="col-12 col-md-5 has-text">

                <a href="<?php echo get_permalink(); ?>"><h3 class="article-title"><?php echo the_title();?></h3></a>

			    <?php if ($project_client): ?>
                    <div class="project-client"><h4><?php echo $project_client; ?></h4></div>
			    <?php endif; ?>

			    <?php if ( has_excerpt()): ?>
                    <div class="project-excerpt mb-4"><?php echo the_excerpt();?></div>
			    <?php endif; ?>

<!--			    --><?php //if ($project_url) : ?>
<!--                    <a class="project-url btn btn-primary" href="--><?php //echo $project_url;?><!--">--><?php //echo $project_button_text;?><!--</a>-->
<!--			    --><?php //endif; ?>

                <a class="btn btn-primary" href="<?php echo get_permalink(); ?>">Learn More</a>

<!--			    --><?php //echo edit_post_link('(Edit)', '<span class="btn btn-warning my-2">', '</span>'); ?>

            </div>

	    <? else: ?>

            <div class="col-12 col-md-7 has-image order-md-last">
			    <?php if ( has_post_thumbnail() ) : ?>
                    <a class="has-hover" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                        <img class="thumbnail" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_post_thumbnail_caption(); ?>" />
                    </a>
			    <?php endif; ?>
            </div>
            <div class="col-12 col-md-5 has-text order-md-first">

                <a href="<?php echo get_permalink(); ?>"><h1 class="article-title"><?php echo the_title();?></h1></a>

			    <?php if ($project_title): ?>
                    <div class="project-title"><?php echo $project_title;?></div>
			    <?php endif; ?>

			    <?php if ( has_excerpt()): ?>
                    <div class="project-excerpt mb-4"><?php echo the_excerpt();?></div>
			    <?php endif; ?>

			    <?php if ($project_url) : ?>
                    <a class="project-url btn btn-primary" href="<?php echo $project_url;?>"><?php echo $project_button_text;?></a>
			    <?php endif; ?>

			    <?php echo edit_post_link('(Edit)', '<span class="btn btn-warning my-2">', '</span>'); ?>

            </div>

	    <?php endif; ?>
    </div>

</div>

