<?php get_header();
pageBanner(
  array(
    'title'=> 'Welcome to our blog',
    'subtitle' => 'Keep up with our latest post testing'
  )
);

?>

<!-- Hero Section of Blog Page Start || Calling below code using LOC-3 function pageBanner() -->
<!-- <div class="page-banner">
      <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri( '/images/ocean.jpg' );?>)"></div>
      <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title">Welcome to our blog</h1>
        <div class="page-banner__intro">
          <p>Keep up with our latest post</p>
        </div>
      </div>
    </div> -->
<!-- Hero Section of Blog Page End -->

<!-- section-1  Start with center content-->

<div class="container container--narrow page-section">

<!-- we use while when we need once repeat -->
    <?php 

// 1- While loop Started-> inside loop each post detail will show
    while(have_posts()){
//1- all loops will show working of loop 

    the_post(  );  ?>

<!-- 2- Writing HTML inside loop -->
<div class='post-item'>
  <!-- for Heading on each blog  -->
  <h2 class="headline headline--medium headline-post-title"><a href="<?php the_permalink( );?>"><?php the_title( );?></a></h2>

<!-- for author date & excerpt data -->
 <div class="metabox">
<p>Posted by <?php the_author_posts_link();?> on <?php the_time('n.j.y');?> in <?php echo get_the_category_list( ' and ' );?></p>
 </div>

 <div class="generic-content">
<?php the_excerpt( );?>
<p><a class="btn btn--blue" href="<?php the_permalink( );?>">Continue Reading</a></p>
 </div>



</div>
<!-- While loop ends -->
<?php }

// <!-- Pagination Start -->
echo paginate_links( );
?>
</div>

<!-- section-1 end -->

<?php get_footer( );?>