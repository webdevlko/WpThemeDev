<!DOCTYPE html>
<html <?php language_attributes( );?>>
<head>

  <!-- For charcter understing -->
    <meta charset="<?php bloginfo( 'charset' )?>;">

      <!-- Mobile Responsive code start -->
    <meta name="viewport" content="width=device-width initial-scale=1">
     <!-- Mobile Responsive code end (Notion_WPCore_11) -->

     
   
    <?php wp_head() ;?>
</head>
<body <?php body_class( ) ;?>>
<header class="site-header">
      <div class="container">
        <h1 class="school-logo-text float-left">
          <!-- Making logo to link with home page -->
          <a href="<?php echo site_url();?>"><strong>Fictional</strong> University</a>
        </h1>
        <span class="js-search-trigger site-header__search-trigger"><i class="fa fa-search" aria-hidden="true"></i></span>
        <i class="site-header__menu-trigger fa fa-bars" aria-hidden="true"></i>
        <div class="site-header__menu group">
          <nav class="main-navigation">

          <?php 
          // wp_nav_menu( array(
          //   'theme_location' => 'headerMenuLocation'
          // )
          // )
          
          // ;?>
            <ul>
              <li <?php if (is_page( 'about-us') or wp_get_post_parent_id(0) == 7) echo 'class="current-menu-item"';?>><a href="<?php echo site_url( '/about-us' )?>">About Us</a></li>

              <li <?php if (get_post_type()  == 'program') echo 'class ="current-menu-item"' ;?>><a href="<?php echo get_post_type_archive_link('program');?>">Programs</a></li>
              
              <!-- Events menu -->
              <li <?php if (get_post_type()== 'event' OR is_page('past_events')) echo 'class = "current-menu-items"' ;?>><a href="<?php echo get_post_type_archive_link('event') ;?>">Events</a></li>

              <!-- Campus menu start -->
              <li <?php if(get_post_type() == 'campus') echo 'class=""current-menu-item';?>><a href="<?php echo get_post_type_archive_link('campus')  ;?>">Campuses</a></li>
              <!--  -->

              <li <?php if(get_post_type()== 'post') echo 'class="current-menu-item"';?>><a href="<?php echo site_url( '/blogs' )?>">Blog</a></li>
            </ul>
          </nav>
          <div class="site-header__util">
            <a href="#" class="btn btn--small btn--orange float-left push-right">Login</a>
            <a href="#" class="btn btn--small btn--dark-orange float-left">Sign Up</a>
            <span class="search-trigger js-search-trigger"><i class="fa fa-search" aria-hidden="true"></i></span>
          </div>
        </div>
      </div>
    </header>