<?php

// archive page code 
// add shortcode for woocommerce fitlers above the main content
add_action('woocommerce_before_main_content', 'add_woocommerce_filter', 10); 

function add_woocommerce_filter(){
  // check if the page is category page
  if(is_archive()){
    echo '<div class="section-ft-size margin-elements"> Filters </div>';
    if(strstr($_SERVER['SERVER_NAME'], 'localhost')){
      echo do_shortcode('	[br_filters_group group_id=204]');
    }
    else{
      echo do_shortcode('[br_filters_group group_id=231070]');
    }
    
    echo '<br> <br>';
    }
}

// archive page styling 
//add row-container div
add_action('woocommerce_before_main_content', 'add_row_container', 5); 

//add closing div for archive page
add_action('woocommerce_after_main_content', 'closing_div', 20); 

//add row container div
function add_row_container(){
  echo '<div class="row-container margin-row">';
}



// closing div
function closing_div(){
  echo '</div>'; 
}


//remove related product from summary 
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
// add related products 
add_action('woocommerce_after_main_content', 'add_row_container', 10); 
add_action('woocommerce_after_main_content', 'closing_div', 30);

  add_action('woocommerce_after_main_content','woocommerce_output_related_products', 20 );




// remove side bar
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar');

// remove product tabs
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
// add product tabs
add_action('woocommerce_single_product_summary', 'woocommerce_output_product_data_tabs', 40);

// remove product meta
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );

// add product meta under the title 
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 8);

// increase number of products shown in related section 
/**
 * Change number of related products output
 */ 
function woo_related_products_limit() {
  global $product;
	
	$args['posts_per_page'] = 4;
	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'jk_related_products_args', 20 );
  function jk_related_products_args( $args ) {
	$args['posts_per_page'] = 6; // 4 related products
	$args['columns'] = 6; // arranged in 2 columns
	return $args;
}

// account navbar order

function my_account_menu_order() {
  $menuOrder = array(
    'dashboard'          => __( 'Dashboard', 'woocommerce' ),
    'orders'             => __( 'Your Orders', 'woocommerce' ),
    'edit-address'       => __( 'Addresses', 'woocommerce' ),
    'edit-account'    	=> __( 'Account Details', 'woocommerce' ),
    'customer-logout'    => __( 'Logout', 'woocommerce' ),
  );
  return $menuOrder;
}
add_filter ( 'woocommerce_account_menu_items', 'my_account_menu_order' );

// checkout styling


add_action('woocommerce_checkout_before_order_review_heading', function(){
  echo '<div class="order-review-container">';
});
add_action('woocommerce_review_order_after_payment', 'closing_div');

// remove woocommerce tabs
remove_action('woocommerce_single_product_summary', 'woocommerce_output_product_data_tabs', 40);

// add desciption here
add_action('woocommerce_single_product_summary', 'add_description', 9); 
function add_description(){
  global $product;
  echo '<p class="font-s-regular margin-elements">'; 
  echo strip_tags($product->get_description());
  echo '</p>';

}
