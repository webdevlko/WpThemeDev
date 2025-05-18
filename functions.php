<?php
// 1-Function first for CSS and JS enqueue

function university_files(){
    // First is any name we could write and second is wp functions for folder calling 
    //1-First file CSS callings
    wp_enqueue_style('university_main_styles', get_theme_file_uri('/build/style-index.css') );

    //2-Second file second file calling
    wp_enqueue_style('university_extra_styles', get_theme_file_uri('/build/index.css') );

    //3-Fontawosme calling via URL
     wp_enqueue_style('font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css') ;

    //4-Fontawosme calling via URL
     wp_enqueue_style('custom-google-fonts', 'https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i') ; 
    // for adding more CSS just copy above lines 

    // 5-Adding JS - Jquery
    // wp_enqueue_style('main-university-js', get_theme_file_uri('/build/index.js'), array('jquery'));

    // 6(a) adding NULL if main JS not depend not other JS
    // wp_enqueue_script('main-university-js', get_theme_file_uri('/build/index.js'), array('jquery'));

    // 6(b)argument, file location and do you want to load this before closing tag then say yes
     wp_enqueue_script('main-university-js', get_theme_file_uri('/build/index.js'), array('jquery'), '1.0', true);
}


// Calling a function in WP, first argument is wp fucntion, second calling custom function name
add_action('wp_enqueue_scripts', 'university_files');



//2-Adding Theme Setup Functions

function university_featuress(){
    //1-Register Nav Option in themes
    register_nav_menu('headerMenuLocation','Header Menu Location');

    // 2-Registering Footer Menu
    register_nav_menu('footerLocationOne','Footer Location One');
    register_nav_menu('footerLocationTwo','Footer Location Two');

    // register_nav_menu("firstIsMenuLocation", "forDashboardMenuLocation"

    //2-Adding title of each page and post
    add_theme_support('title-tag');
    add_theme_support( 'post-thumbnails' );
    // 3-Adding custom image size function for post thumbnail, name, width, height, crop
    add_image_size('professorLandscape', 400, 260, true);
    // add_image_size('professorLandscape', 400, 260, array('left', 'top'));
    add_image_size('professorPortrait', 480, 650, true);
    add_image_size( 'pageBanner' , 1500, 350, true );

}

add_filter( 'after_setup_theme', "university_featuress" );

//3-Ajustment in event archive page

function university_adjust_queries($query){
    if(!is_admin() AND is_post_type_archive('program') AND is_main_query(  )) {  
             
        $query ->set('posts_per_page', -1);

    } 
    if(!is_admin() AND is_post_type_archive('program') AND is_main_query(  )) {  
        $query ->set('orderby', 'title');
        $query ->set('order', 'ASC');
        $query ->set('posts_per_page', -1);
    } 
        // Looking inside the WP query object || Calling its method name set 
        if (!is_admin() AND is_post_type_archive('event') AND $query->is_main_query()) {
            
            $today = date('Ymd');
            $query->set('meta_key', 'event_date');
            $query->set('orderby', 'meta_value_num');
            $query->set('order', 'ASC');
            //below code is for removing past events from the event archive page
            $query->set('meta_query', array(
                      array(
                        'key' => 'event_date',
                        'compare' => '>=',
                        'value' => $today,
                        'type' => 'numeric'
                      )
                    ));
          }

}
    

add_action( 'pre_get_posts','university_adjust_queries' );


//4-Creating resuable and recycle Dynamic Banner image and subtitle via adding code 
// || Without "= NULL" it is complulsory to pass the arguments in the function calling LOC13 page.php
// || with = NULL it is not complusory to pass the arguments in the function calling LOC13 page.php
function pageBanner($args = NULL ){
//logic here started

// if title is not passed then we will use default under below{} title and subtitle
if(!isset($args['title'])){
    $args['title'] = get_the_title(); // calling the title of the page or post
} 

// if subtitle is not passed then we will use default  under below{} subtitle
if(!isset($args['subtitle'])){
    $args['subtitle'] = get_field('page_banner_subtitle'); //calling ACF subtitle of the page or post
}

// if image not uploaded default image will be used
if(!isset($args['photo'])){
    if(get_field('page_banner_background_image')){
        $args['photo'] = get_field('page_banner_background_image')['sizes']['pageBanner'];
    }else{
        $args['photo'] = get_theme_file_uri('/images/ocean.jpg');
    }
}

//logic end here s
?>
<!-- Adding Repeat HTML Code here for all pages hereo section for banner Images and subtitles -->
<!-- Hero Section of start Single page.php-->

<div class="page-banner">
        <!-- Adding dynamic images -->
        <div class="page-banner__bg-image" style="background-image: url(<?php echo $args['photo'] ?>);"></div>
        <div class="page-banner__content container container--narrow">
            <h1 class="page-banner__title"><?php echo $args['title'];?></h1>
            <div class="page-banner__intro">
            <!-- Dynamic Subtitle -->
             <p><?php echo $args['subtitle'];?></p>
            </div>
        </div>
</div>
       

    <!-- End of the Hero Section -->

<?php }
// <!-- End--This is the function for creating dynamic banner image and subtitle via adding code  -->



