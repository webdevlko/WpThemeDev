<!-- 1-> if we click on blog home on single post then wordpress look single.php file -->
<?php get_header();?>

<!--Started PHP to  while loop -->
<?php 

// while loop till the post
while(have_posts(  )){
    
    // WP Function for getting the post 
    the_post(  ); 
    pageBanner();
    ?>

    <!-- Hero Section of start Single page.php || Below code using above LOC-12-->

<!-- <div class="page-banner">
      <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri( '/images/ocean.jpg' );?>)"></div>
      <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title"><?php the_title( );?></h1>
        <div class="page-banner__intro">
          <p>DON'T FORGET ME UUPDATE LATER</p>
        </div>
      </div>
    </div> -->

 
   <!-- End of the Hero Section -->

   <!-- after hero section code-->

   <div class="container container--narrow page-section">

      <div class="metabox metabox--position-up metabox--with-home-link">
        <p><a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link( 'campus' );?>"><i class="fa fa-home" aria-hidden="true"></i>  All Campus </a> <span class="metabox__main">Posted by <?php the_author_posts_link();?> on <?php the_time('n.j.y');?> in <?php echo get_the_category_list( ' and ' );?></span>
        </p>
      </div>

    <div class="generic-content">
      <?php the_content( );?>
    </div>
<!-- Copying code from front-page.php "upcoming event sections" -->
<?php 
          
    //code for professor related post start

    $relatedPrograms = new WP_Query(array(
      // 'posts_per_page' => 2, // Number of posts to show
      // 'orderby' => 'post_date' // Default sorting by date
      // 'orderby' => 'title', // Sorting by custom field value
      // 'posts_per_page' => -1, // -1 for all posts
      // 'post_type' => 'event',
      // 'order' => 'ASC', // Default is DESC
      // 'orderby' => 'rand' // Random order

      // Sorting by event date setting || Above one testing purpose
       
      'posts_per_page' => -1, // "-1" will show all posts
      //  'posts_per_page' => 2,
       'post_type' => 'program',
       'orderby' => 'title',
       'order' => 'ASC',
      //  Below code will remove the past events to display
      'meta_query' => array(
       
        // this filter on the basis of program
        array(
          'key' => 'related_campus', // this is the custom field name in the event post type
          'compare' => 'LIKE',
          'value' => '"' . get_the_ID() . '"' // begin with double quotes to get the exact match of the program id and concatenate with the program id
         
        )
        
      )

    ));

     if ($relatedPrograms->have_posts()) {
    echo '<hr class="section-break">';
  echo '<h2 class="headline headline--medium">Programs Available At This Campus </h2>';

  echo '<ul class="min-list link-list">';
    while($relatedPrograms->have_posts()) {
      $relatedPrograms->the_post(); ?>
     <li>
        <a  href="<?php the_permalink( );?>"><?php the_title();?></a>
     </li>
    <?php }
    echo '</ul>';

     }
    // end of the professor related post

    //to reset the post data to the main query || we need to reset the post data in order to use get_id() , get_the_title() etc. functions again
    wp_reset_postdata( );
        ?>
   </div>



   <!-- After hero section ends -->
  

    <!--Started again PHP to close the while loop -->
<?php }

get_footer( );
?>