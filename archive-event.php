<?php

get_header();
// Removing below code for pageBanner() function and calling the function in header section of each page
pageBanner(array(
  'title' => 'All Events',
  'subtitle' => 'See what is going on in our world testing',
  // 'photo' => get_theme_file_uri('/images/ocean.jpg') // || it will be dynamic
));
?>

<!-- Removing this and calling LOC-5 above || it will be dynamic -->
<!-- <div class="page-banner">
  <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/ocean.jpg') ?>);"></div>
  <div class="page-banner__content container container--narrow">
    <h1 class="page-banner__title">All Events</h1>
    <div class="page-banner__intro">
      <p>See what is going on in our world</p>
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
  while(have_posts()) {
    the_post(); 
    // <!-- geting date from tempatle parts -->
  get_template_part( 'template-parts/content', 'event');  
        }
  echo paginate_links();
?>

<hr class="section-break">

<p>Looking for past events! <a href="<?php echo site_url('/past-event');?>">Check out our past events archive</a> </p>
</div>

<?php get_footer();

?>

