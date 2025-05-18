<?php

get_header();
pageBanner(
  array(
    'title'=> 'Past Events',
    'subtitle' => 'A recap of past eveting --via pageBannerfunction'
  )
);
?>

<!-- Below code will show using above LOC-4 to 9   -->
<!-- <div class="page-banner">
  <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/ocean.jpg') ?>);"></div>
  <div class="page-banner__content container container--narrow">
    <h1 class="page-banner__title">Past Events</h1>
    <div class="page-banner__intro">
      <p>Recap of our past events</p>
    </div>
  </div>  
</div>  -->


    <div class="page-banner__intro">
      <p><?php the_archive_description(); ?></p>
    </div>
  </div>  
</div>

<div class="container container--narrow page-section">
<?php

// We do not write always custom query for custom post type. We can use default query for custom post type.
// We can use default query for custom post type by using the below code.

$today = date('Ymd');
$pastEvents = new WP_Query(array(
  // 'posts_per_page' => 2, // Number of posts to show
  // 'orderby' => 'post_date' // Default sorting by date
  // 'orderby' => 'title', // Sorting by custom field value
  // 'posts_per_page' => -1, // -1 for all posts
  // 'post_type' => 'event',
  // 'order' => 'ASC', // Default is DESC
  // 'orderby' => 'rand' // Random order

  // Sorting by event date setting || Above one testing purpose
   
  // 'posts_per_page' => -1, // "-1" will show all posts
   

   'paged' => get_query_var('paged' , 1),
   'post_type' => 'event',
    'posts_per_page' => -1,
   'meta_key' => 'event_date',
   'orderby' => 'meta_value_num',
   'order' => 'ASC',
  //  Below code will remove the past events to display
  'meta_query' => array(
    array(
      'key' => 'event_date',
    //   condition event date is less than today because we want to show past events
      'compare' => '<',
      'value' => $today,
      'type' => 'numeric'
    )
  )


));

// Earlier above code
// $pastEvents = new WP_Query(array(
// 'post_type' => 'event',


// ));

// look only for past events post type
  while($pastEvents->have_posts()) {
    $pastEvents->the_post(); 
  // Importing data from template-parts/content-event.php file
  get_template_part('template-parts/content', 'event');
    
    }
        //Default pagination code only work when default query is used
        // So we need to use custom query for pagination   
  echo paginate_links(array(
    'total' => $pastEvents->max_num_pages,
  ));
?>
</div>

<?php get_footer();

?>