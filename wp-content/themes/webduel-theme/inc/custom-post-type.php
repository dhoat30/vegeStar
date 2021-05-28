<?php 
//custom post register

//custom post register


add_post_type_support( "sliders", "thumbnail" ); 

add_post_type_support( "category", "thumbnail" ); 
add_post_type_support( "usp", "thumbnail" );
// add_post_type_support( "shop-my-fav", "thumbnail" );
 add_post_type_support( "brand", "thumbnail" );

function register_custom_type2(){ 
    //brand logo
    register_post_type("contact-info", array(
      "supports" => array("title", 'thumbnail'), 
      "public" => true, 
      "show_ui" => true, 
      "hierarchical" => true,
      "labels" => array(
         "name" => "Contact Info", 
         "add_new_item" => "Add New Contact Info", 
         "edit_item" => "Edit Contact Info", 
         "all_items" => "All Contact Info", 
         "singular_name" => "Contact Info"
      ), 
      "menu_icon" => "dashicons-info-outline"
   )
   ); 

// sliders psot type
   register_post_type("sliders", array(
      "supports" => array("title", "page-attributes"), 
      "public" => true, 
      "show_ui" => true, 
      "hierarchical" => true,
      "labels" => array(
         "name" => "Sliders", 
         "add_new_item" => "Add New Slider", 
         "edit_item" => "Edit Slider", 
         "all_items" => "All Sliders", 
         "singular_name" => "Slider"
      ), 
      "menu_icon" => "dashicons-slides"
   )
   ); 

//    //category post type
   register_post_type("category", array(
      "supports" => array("title"), 
      "public" => true, 
      "show_ui" => true, 
      "hierarchical" => true,
      "labels" => array(
         "name" => "Categories", 
         "add_new_item" => "Add New Category", 
         "edit_item" => "Edit Category", 
         "all_items" => "All Categories", 
         "singular_name" => "Category"
      ), 
      "menu_icon" => "dashicons-category"
   )
   );

//    //blogs post type
   register_post_type("usp", array(
      'show_in_rest' => true,
      "supports" => array("title", 'editor'), 
      "public" => true, 
      "show_ui" => true, 
      "hierarchical" => true,
      "labels" => array(
         "name" => "USPs", 
         "add_new_item" => "Add New USP", 
         "edit_item" => "Edit USP", 
         "all_items" => "All USPs", 
         "singular_name" => "USP"
      ), 
      "menu_icon" => "dashicons-text-page"
   )
   );

//    //loving post type
//    register_post_type("shop-my-fav", array(
//       "supports" => array("title", "page-attributes"), 
//       "public" => true, 
//       "show_ui" => true, 
//       "hierarchical" => true,
//       "labels" => array(
//          "name" => "Shop My Favs", 
//          "add_new_item" => "Add New Shop My Fav", 
//          "edit_item" => "Edit Shop My Fav", 
//          "all_items" => "All Shop My Favs", 
//          "singular_name" => "Shop My Fav"
//       ), 
//       "menu_icon" => "dashicons-welcome-write-blog"
//    )
//    );
   
//    //shop by brand page post type
   register_post_type("brand", array(
      "supports" => array("title"), 
      "public" => true, 
      "show_ui" => true, 
      "hierarchical" => true,
      "labels" => array(
         "name" => "Brands", 
         "add_new_item" => "Add New Brand", 
         "edit_item" => "Edit Brand", 
         "all_items" => "All Brands", 
         "singular_name" => "Brand"
      ), 
      "menu_icon" => "dashicons-shield"
   )
   );

//       // typrewriter effect 

//    register_post_type("typewriter_effect", array(
//       "supports" => array("title"), 
//       "public" => true, 
//       "show_ui" => true, 
//       "hierarchical" => true,
//       "labels" => array(
//          "name" => "Typewriter Effect Titles", 
//          "add_new_item" => "Add New Typewriter Effect Title", 
//          "edit_item" => "Edit Typewriter Effect Title", 
//          "all_items" => "All Typewriter Effect Titles", 
//          "singular_name" => "Typewriter Effect Title"
//       ), 
//       "menu_icon" => "dashicons-welcome-write-blog"
//    )
//    );
  
 }

add_action("init", "register_custom_type2"); 




//custom taxonomy
function wpdocs_register_private_taxonomy() {
   $args = array(
       'label'        => __( 'slider', 'textdomain' ),
       'public'       => true,
       'rewrite'      => true,
       'hierarchical' => true
   );
    
   register_taxonomy( 'slider', 'sliders', $args );

//    $argsBlog = array(
//       'label'        => __( 'Blog Categories', 'textdomain' ),
//       'public'       => true,
//       'rewrite'      => true,
//       'hierarchical' => true,
//       'show_in_rest' => true
//   );
   
//   register_taxonomy( 'blog-category', 'blogs', $argsBlog );

// //   taxonomy for Typewriter effect
// $argsTypewriter = array(
//    'label'        => __( 'Typewriter Categories', 'textdomain' ),
//    'public'       => true,
//    'rewrite'      => true,
//    'hierarchical' => true,
//    'show_in_rest' => true
// );

register_taxonomy( 'typewriter-effect', 'typewriter_effect', $argsTypewriter );

}
add_action( 'init', 'wpdocs_register_private_taxonomy', 0 );