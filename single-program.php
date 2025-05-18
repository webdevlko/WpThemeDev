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
        <p><a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link( 'program' );?>"><i class="fa fa-home" aria-hidden="true"></i>  All Programs </a> <span class="metabox__main">Posted by <?php the_author_posts_link();?> on <?php the_time('n.j.y');?> in <?php echo get_the_category_list( ' and ' );?></span>
        </p>
      </div>

    <div class="generic-content">
      <?php the_content( );?>
    </div>
<!-- Copying code from front-page.php "upcoming event sections" -->
<?php 
          
    

          // code for displaying the events & related to the program start
          $today = date('Ymd');
          $homepageEvents = new WP_Query(array(
            
            // Sorting by program date setting || Above one testing purpose
             
            // 'posts_per_page' => -1, // "-1" will show all posts
             'posts_per_page' => 2,
             'post_type' => 'event',
             'meta_key' => 'event_date',
             'orderby' => 'meta_value_num',
             'order' => 'ASC',
            //  Below code will remove the past events to display
            'meta_query' => array(
              // this filter on the basis of event date
              array(
                'key' => 'event_date',
                'compare' => '>=',
                'value' => $today,
                'type' => 'numeric'
              ),
              // this filter on the basis of program
              array(
                'key' => 'relations_programs', // this is the custom field name in the event post type
                'compare' => 'LIKE',
                'value' => '"' . get_the_ID() . '"' // begin with double quotes to get the exact match of the program id and concatenate with the program id
               
              )
              
            )

          ));

           if ($homepageEvents->have_posts()) {
          echo '<hr class="section-break">';
        echo '<h2 class="headline headline--medium">Upcoming ' . get_the_title() . ' Events</h2>';

          while($homepageEvents->have_posts()) {
          $homepageEvents->the_post(); 
          //Importing data from template-parts/content-event.php file
          get_template_part('template-parts/content','event');           
           }
           }

          //  code for displaying the events & related to the program end
          wp_reset_postdata(); // to reset the post data to the main query || It make clean slate
          $relatedCampuses = get_field('related_campus');

          if($relatedCampuses) { 
            echo '<hr class="section-break">';
            echo '<h2 class="headline headline--medium">' . get_the_title() . ' is Available At These Campuses</h2>';

            // Display one link for each campuses
            foreach($relatedCampuses as $campus) {  
              // echo get_the_title($campus); // this will give the title of the campus
              // echo get_permalink($campus); // this will give the permalink of the campus
              // echo $campus->post_type; // this will give the post type of the campus
              // echo $campus->ID; // this will give the ID of the campus
              ?>
               <ul class="min-list link-list">
                <li>
                  <a href="<?php echo get_permalink($campus);?>">
                  <?php echo get_the_title($campus);?></a>
                </li>
               </ul>
              <?php

            }
            
           }
            
        ?>
   </div>



   <!-- After hero section ends -->
  

    <!--Started again PHP to close the while loop -->
<?php }

get_footer( );
?>