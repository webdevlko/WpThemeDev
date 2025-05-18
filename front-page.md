<?php get_header();?>

<div class="page-banner">
    <!-- Static way to add the image in HTML -->
      <div class="page-banner__bg-image" style="background-image: url(images/library-hero.jpg)"></div> 

    <!-- WP Way to add the image the call the image path using below code -->
    <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/library-hero.jpg') ;?>)"></div>

      <div class="page-banner__content container t-center c-white">
        <h1 class="headline headline--large">Welcome!</h1>
        <h2 class="headline headline--medium">We think you&rsquo;ll like it here.</h2>
        <h3 class="headline headline--small">Why don&rsquo;t you check out the <strong>major</strong> you&rsquo;re interested in?</h3>
        <a href="#" class="btn btn--large btn--blue">Find Your Major</a>
      </div>
    </div>

    <div class="full-width-split group">
      <div class="full-width-split__one">
        <div class="full-width-split__inner">
          <h2 class="headline headline--small-plus t-center">Upcoming Events</h2>
      <!-- //Adding custom query for events post showing start-->

        <?php 
        $homepageEvents = new WP_Query(array(
          'posts_per_page' => 2,
          'post_type' => 'event'
        ));

        while($homepageEvents->have_posts()){
          $homepageEvents->the_post(  ); ?>

          <div class="event-summary">
            <a class="event-summary__date t-center" href="#">

              <!-- Displaying date from custom fieldss -->

              


             <!-- Displaying date from custom fields -->
<span class="event-summary__month">
  <?php 
  $eventDate = get_post_field('event_date'); // Retrieve the custom field
  if ($eventDate) {
    $eventDate = new DateTime($eventDate); // Convert to DateTime object
    echo $eventDate->format('M'); // Display the month
  } else {
    echo 'N/A'; // Fallback if event_date is missing
  }
  ?>
</span>
<span class="event-summary__day">
  <?php 
  if ($eventDate) {
    echo $eventDate->format('d'); // Display the day
  } else {
    echo '--'; // Fallback if event_date is missing
  }
  ?>
</span>
              <span class="event-summary__day">
                <!-- For date -->
              <?php 
              echo $eventDate->format('d');
              ;?></span>
            </a>
            <div class="event-summary__content">
              <h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink( ) ;?>"><?php the_title();?></a></h5>
              <p>
                
              <!-- Custom Excerpert -->
              
              <?php if( has_excerpt(  )){
              echo get_the_excerpt(  );
              }
              else{
                // two arugumenet what I want to trim and how many words I want to trim
                echo wp_trim_words(get_the_content(  ), 18);
              }
              
              ?> 
              <a href="<?php the_permalink( ) ;?>" class="nu gray">Learn more</a></p>
            </div>
          </div>
        <?php }
      
        ?>

     
          <!-- Deleted second static dynamic -->

          <p class="t-center no-margin"><a href="<?php echo get_post_type_archive_link( 'event' ) ;?>" class="btn btn--blue">View All Events</a></p>
        </div>
      </div>

      <div class="full-width-split__two">
        <div class="full-width-split__inner">
          <h2 class="headline headline--small-plus t-center">From Our Blogs</h2>


          <!-- While Loop Testing -->
          <?php 
        //Custom Query <--- Whenever we want to write custom query we need to assign variable to it
        // WP_Query is a class which is used to write custom query
        // $homepagePosts is a variable which is assigned to WP_Query class
        // we can pass the argument to WP_Query class to get the data what we want
        // we can pass the argument in array format
        // below $homepagePosts is a object
        
        $homepagePosts = new WP_Query(array(
          'posts_per_page' => 2
          // we can add post type like
          // 'post_type' => 'page'
          // 'category_name' => 'awards'
        ));

        // Demo below Animal is a class , speak is a method which alreay written in Animal class
        // $dog = new Animal();
        // $dog->speak(); look inside in dog object

          while ($homepagePosts->have_posts()) {
            $homepagePosts->the_post(  ); ?>
            
            <!-- Entering HTML in Loop [data what we want] -->
            <div class="event-summary">
            <a class="event-summary__date event-summary__date--beige t-center" href="<?php the_permalink( ) ;?>">
              <!-- time function for days and month as per PHP format -->
              <span class="event-summary__month"><?php the_time('M'); ?></span>
              <span class="event-summary__day"><?php the_time('d'); ?></span>
            </a>
            <div class="event-summary__content">
              <h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink( ) ;?>"><?php the_title( ) ;?></a></h5>

              <!-- Trim function will work like expercert || if excerpt hain to show kare nahi to default 18 words show kare-->
              <p><?php if( has_excerpt(  )){
              echo get_the_excerpt(  );
              }
              else{
                // two arugumenet what I want to trim and how many words I want to trim
                echo wp_trim_words(get_the_content(  ), 18);
              }
              
              ?> <a href="<?php the_permalink( ) ;?>" class="nu gray">Read more</a></p>
            </div>
          </div>
          <!-- whenever custom query writes we need to write below code to reset the data in database -->
          <?php } wp_reset_postdata(  );
          // Stop HTML in Loop
          ?>
              
          <p class="t-center no-margin"><a href="<?php echo site_url( '/blogs' )?>" class="btn btn--yellow">View All Blog Posts</a></p>
        </div>
      </div>
    </div>

    <div class="hero-slider">
      <div data-glide-el="track" class="glide__track">
        <div class="glide__slides">
          <div class="hero-slider__slide" style="background-image: url(<?php echo get_theme_file_uri( '/images/bus.jpg') ;?>)">

            <div class="hero-slider__interior container">
              <div class="hero-slider__overlay">
                <h2 class="headline headline--medium t-center">Free Transportation</h2>
                <p class="t-center">All students have free unlimited bus fare.</p>
                <p class="t-center no-margin"><a href="#" class="btn btn--blue">Learn more</a></p>
              </div>
            </div>
          </div>
          <div class="hero-slider__slide" style="background-image: url(<?php echo get_theme_file_uri('/images/apples.jpg');?>)">
            <div class="hero-slider__interior container">
              <div class="hero-slider__overlay">
                <h2 class="headline headline--medium t-center">An Apple a Day</h2>
                <p class="t-center">Our dentistry program recommends eating apples.</p>
                <p class="t-center no-margin"><a href="#" class="btn btn--blue">Learn more</a></p>
              </div>
            </div>
          </div>
          <div class="hero-slider__slide" style="background-image: url(<?php echo get_theme_file_uri('/images/bread.jpg');?>)">
            <div class="hero-slider__interior container">
              <div class="hero-slider__overlay">
                <h2 class="headline headline--medium t-center">Free Food</h2>
                <p class="t-center">Fictional University offers lunch plans for those in need.</p>
                <p class="t-center no-margin"><a href="#" class="btn btn--blue">Learn more</a></p>
              </div>
            </div>
          </div>
        </div>
        <div class="slider__bullets glide__bullets" data-glide-el="controls[nav]"></div>
      </div>
    </div>

<?php get_footer( );?>