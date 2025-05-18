 <?php get_header();?>

<?php 

// while loop till the post
while(have_posts( )){
    
    // WP Function for getting the post 
    the_post(  ); ?>

    <!-- above we close the php in order to insert the HTML -->
    <h2><a href="<?php the_permalink( ) ;?>"><?php the_title(  ) ;?></a></h2>
    <p><?php the_content( ) ;?></p>
    <hr>


    <!--Started again PHP to close the while loop -->
<?php }

get_footer( );

?>