<!-- 1-> if we click on blog home on single post then wordpress look single.php file -->

<?php get_header();?>

<?php 

// 1- While loop Started || for showing each page content differently
while(have_posts(  )){
    
    // WP Function for getting the post 
    the_post(  ); 

    // calling function from functions.php to display the hero section of the page
    pageBanner(array(
      // commenting one by one to check the output | Defualt values will show on output if comment out | frontend calling function pageBanner() in functions.php
      'title' => 'hello this is the title',
      'subtitle' => 'hello this is the subtitle',
      'photo' => 'https://images.unsplash.com/photo-1486870591958-9b9d0d1dda99?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'
    ));
    ?>
    

    <!-- pageBanner(); giving below code|  above we close the php in order to insert the HTML | Wherever the content is showing static need to put dynamic data-->
    <!-- <div class="page-banner">
      <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri( '/images/ocean.jpg' );?>)"></div>
      <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title"><?php the_title( );?></h1>
        <div class="page-banner__intro">
          <p>DON'T FORGET ME UUPDATE LATER</p>
        </div>
      </div>
    </div> -->


    <div class="container container--narrow page-section">


   
    <!-- Breaducm Start Here -->
   
  <!-- If statement to show only if child page is viewing|| On parent page breadcum not showing -->

  <!-- 2-Title name showing loop Started -->
   <?php 
  //  Below variable meaning Returns the ID of the post’s parent( Retrieves the ID of the current item in the WordPress Loop.)
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
 
   <!--   2-Title name showing loop Ended --> 
   <?php } ?>

         

      <!-- Right side bar for few content -->
      <!-- Wrarping whole page link div , to show simple page without any side menu |19-#3a-->

      <!-- Side bar loop started here -->
       <?php 
      //  Retrieves an array of pages (or hierarchical post type items)= get_pages
        $testArray = get_pages(array(
          'child_of' => get_the_ID()
        ));

      //Ya to Parent ho ya Child ho 
       if($theParent or $testArray){  ?>
      <div class="page-links">
        <!-- Creating Side menu title dynamic -->
        <h2 class="page-links__title"><a href="<?php echo get_permalink($theParent);?>"><?php echo get_the_title($theParent);?></a></h2>
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

          // echo $animalSound ['dog'];

          //Condition to check if on parent page or on child page , in order to give correct ID to child page
          if($theParent){
            $findChildrenOf = $theParent;
          } else{
            $findChildrenOf = get_the_ID();
          }

          // We use associative array in wp list || 
           wp_list_pages(array(
            'title_li' => NULL,             //remove odd items in menu top bar
            'child_of' => $findChildrenOf,
            'sort_column' => 'menu_order'

           ));
           
           ?>
           
        </ul>
      </div>
      <?php } ?>  <!-- Side bar loop started here -->

      <!-- For Generic Content -->

      <div class="generic-content">
        <p> <?php the_content();?> </p>
      </div>
    

    <hr>


    
<?php } // 1- While loop Ended

// Footer Section
get_footer( );
?>