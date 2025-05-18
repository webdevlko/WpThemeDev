<!-- 1-> if we click on blog home on single post then wordpress look single.php file -->

<?php get_header();?>

<?php 

// while loop till the post
while(have_posts(  )){
    
    // WP Function for getting the post 
    the_post(  ); ?>

    <!-- above we close the php in order to insert the HTML | Whereever the content is showing static need to put dynamic data-->
    <div class="page-banner">
      <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri( '/images/ocean.jpg' );?>)"></div>
      <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title"><?php the_title( );?></h1>
        <div class="page-banner__intro">
          <p>DON'T FORGET ME UUPDATE LATER</p>
        </div>
      </div>
    </div>


    <div class="container container--narrow page-section">


   
    <!-- Breaducm Start Here -->
   
  <!-- If statement to show only if child page is viewing|| On parent page breadcum not showing -->
   <?php 
  $theParent = wp_get_post_parent_id(get_the_ID());

    if($theParent){ ?>

      <div class="metabox metabox--position-up metabox--with-home-link">
        <p>
          <a class="metabox__blog-home-link" href="<?php echo get_permalink($theParent);?>"><i class="fa fa-home" aria-hidden="true"></i> 
          <!-- Creating menu dynamic -->
           <!-- the_title(  ); will output current post or page -->
            <!-- echo get_the_title(5) allow in enter page or post ID  -->
         Back to <?php echo get_the_title($theParent) ;?></a> <span class="metabox__main"><?php the_title(  );?></span>
        </p>
      </div>
 
   <!-- End of PHP and loop as showing lesson 1 loop -->
   <?php }
   
   ?>

      <!-- Bredcum end here -->

    

      <!-- Right side bar for few content -->

      <div class="page-links">
        <h2 class="page-links__title"><a href="#">About Us</a></h2>
        <ul class="min-list">
          <!-- <li class="current_page_item"><a href="#">Our History</a></li>
          <li><a href="#">Our Goals</a></li> -->

          <!-- To Show the menus use below factors -->
           <?php 
          //  normal array
           $animal = array('cat', 'dog', 'pig');

          //  Associative array for sound of each dogs, we have associalted voices of each animals
          $animalSound = array (
            'cat' => 'meow', 
            'dog' => 'bark',
            'pig' => 'oink'
          );


          echo $animalSound ['dog'];
           wp_list_pages();
           
           ?>
           
        </ul>
      </div>
      

      <div class="generic-content">
        <p> <?php the_content();?> </p>
      </div>
    
 
    <hr>


    <!--Started again PHP to close the while loop -->
<?php }
get_footer( );
?>