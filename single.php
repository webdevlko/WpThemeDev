<!-- 1-> if we click on blog home on single post then wordpress look single.php file -->
<?php get_header();?>

 <!-- Hero Section of start Single page.php-->
<!--Started PHP to  while loop -->
<?php 

// while loop till the post
while(have_posts(  )){
    
    // WP Function for getting the post 
    the_post(  );   
    pageBanner( );
    ?>

   
<!-- Below code will work using LOC-13 -->
<!-- 
<div class="page-banner">
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
        <p><a class="metabox__blog-home-link" href="<?php echo site_url('/blogs' );?>"><i class="fa fa-home" aria-hidden="true"></i>  Blog Home</a> <span class="metabox__main">Posted by <?php the_author_posts_link();?> on <?php the_time('n.j.y');?> in <?php echo get_the_category_list( ' and ' );?></span>
        </p>
      </div>

   <div class="generic-content">
    <?php the_content( );?>
   </div>

   <!-- After hero section ends -->
  

    <!--Started again PHP to close the while loop -->
<?php }

get_footer( );
?>