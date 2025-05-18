    <!-- 1-> if we click on blog home on single post then wordpress look single.php file -->
    <?php get_header();?>

    <!--Started PHP to  while loop -->
    <?php 

    // while loop till the post
    while(have_posts(  )){
        // WP Function for getting the post 
        the_post(  ); 
        // calling function from functions.php to display the hero section of the page
        pageBanner( ); 
        ?>

    <!-- Hero Section of start Single page.php-->
      <!-- Using resable 4 reuseable code of functions.php -->


    <!-- End of the Hero Section -->

    <!-- after hero section code-->

    <div class="container container--narrow page-section">

    <!-- Remove this section for professor post -->
    <!-- <div class="metabox metabox--position-up metabox--with-home-link">
            <p><a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('event') ;?>"><i class="fa fa-home" aria-hidden="true"></i>  Professors Home</a> <span class="metabox__main"><?php  the_title(); ?></span>
            </p>
        </div> -->

    <div class="generic-content">
          <div class="row group">

          <!-- //first column -->
            <div class="one-third"> 
                <?php the_post_thumbnail('professorPortrait' );?>
            </div>

            <!-- //second column -->
            <div class="two-third"> 
                    <?php the_content( );?>
            </div>
          </div>
    </div>

        <!-- Related Programe Start -->
        <?php 
        // related programs are stored in the custom field 'relations_programs'
        $relatedPrograms = get_field('relations_programs'); 

        if($relatedPrograms){

        //php built in function to check what type varaible it is
        //var_dump($relatedPrograms); // this will print the array of related programs
        // print_r($relatedPrograms); // this will print the array of related programs

        // loop through to display one realted post details || how to use foreach loop in php
        // https://www.w3schools.com/php/php_looping_foreach.asp
        echo '<hr class="section-break">';
        echo '<h2 class="headline headline--medium"> Subject(s) Taught</h2>';
        echo '<ul class="link-list min-list">';
        foreach($relatedPrograms as $program){
        // echo get_the_title($program); ?>
        <!-- Free to write HTML -->
        <li><a href="<?php echo get_the_permalink($program);?>"><?php echo get_the_title($program);?></a></li>

        <?php }
        echo '</ul>'; 
        }


        ?>
    </div>

    <!-- After hero section ends -->
    

        <!--Started again PHP to close the while loop -->
    <?php }

    get_footer( );
   