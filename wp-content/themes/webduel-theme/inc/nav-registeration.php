<?php 
 //add nav menu
 function inspiry_config(){ 
    register_nav_menus( 
       array(
           "top-navbar" => "Top Navbar",
          "main_menu" => "Main Menu",
          "footer-quick-links" => 'Footer Quick Links'
          
       )
       );  

       add_theme_support( "title-tag");

         add_post_type_support( "gd_list", "thumbnail" );   
         
         add_theme_support( 'woocommerce' );
  }
 
  add_action("after_setup_theme", "inspiry_config", 0);
?>