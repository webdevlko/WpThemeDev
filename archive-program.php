    <?php

    get_header(); 
    pageBanner(array(
        'title' =>"All Programs",
        'subtitle' => "There is something for everyone, have a look around testing"
        
    ));
    ?>

<!-- Calling below code in using function LOC-4 -->
    <!-- <div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/ocean.jpg') ?>);"></div>
    <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title">All Programs</h1>
        <div class="page-banner__intro">
        <p>There is sometihing for everyone have a look around</p>
        </div>
    </div>  
    </div>  -->


        <div class="page-banner__intro">
        <p><?php the_archive_description(); ?></p>
        </div>
    </div>  
    </div>

    <div class="container container--narrow page-section">
    

    <ul class="link-list min-list">
    <?php
    // We do not write always custom query for custom post type. We can use default query for custom post type.
    // We can use default query for custom post type by using the below code.
    while(have_posts()) {
        the_post(  ); ?>
    <li><a href="<?php the_permalink(); ?>"><?php the_title();?></a></li>  
    <?php }
    ?>
    </ul>

    </div>

    <?php get_footer();

    ?>