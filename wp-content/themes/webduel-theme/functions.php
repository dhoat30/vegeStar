<?php 
/**
 * Inspiry functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package inspiry

 */
require get_theme_file_path('/inc/woocommerce.php');


require get_theme_file_path('/inc/custom-post-type.php');

require get_theme_file_path('/inc/nav-registeration.php');




 //enqueue scripts

 function inspiry_scripts(){ 
   wp_enqueue_script("jQuery");
   wp_enqueue_script('font-awesome', 'https://kit.fontawesome.com/986e8fd322.js', NULL, '1.0', false);
   wp_enqueue_style("google-fonts", "https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,900&display=swap", false);
  
   if (strstr($_SERVER['SERVER_NAME'], 'localhost')) {
      wp_enqueue_script('main', 'http://localhost:3000/bundled.js',  array( 'jquery' ), '1.0', true);
    } else {
      wp_enqueue_script('our-vendors-js', get_theme_file_uri('/bundled-assets/vendors~scripts.aebecbb789db7969773b.js'),  array( 'jquery' ), '1.0', true);
      wp_enqueue_script('main', get_theme_file_uri('/bundled-assets/scripts.d5eadd070386cfd2d4bc.js'), NULL, '1.0', true);
      wp_enqueue_style('our-main-styles', get_theme_file_uri('/bundled-assets/styles.d5eadd070386cfd2d4bc.css'));      
      wp_enqueue_style('our-vendor-styles', get_theme_file_uri('/bundled-assets/styles.aebecbb789db7969773b.css'));

    }
    wp_localize_script("main", "inspiryData", array(
      "root_url" => get_site_url(),
      "nonce" => wp_create_nonce("wp_rest")
    ));
}
add_action( "wp_enqueue_scripts", "inspiry_scripts" ); 

  //admin bar
  if ( ! current_user_can( "manage_options" ) ) {
   show_admin_bar( false );
}
//sidebar


add_action( "widgets_init", "mat_widget_areas" );
function mat_widget_areas() {
    register_sidebar( array(
        "name" => "Theme Sidebar",
        "id" => "mat-sidebar",
        "description" => "The main sidebar shown on the right in our awesome theme",
        "before_widget" => '<li id="%1$s" class="widget %2$s">',
		"after_widget"  => "</li>",
		"before_title"  => '<h3 class="widget-title">',
		"after_title"   => "</h3>",
    ));
}



//custom post register

add_theme_support("post-thumbnails");






//preload css 
function add_rel_preload($html, $handle, $href, $media) {
    
  if (is_admin())
      return $html;

   $html = <<<EOT
<link rel='preload' as='style' onload="this.onload=null;this.rel='stylesheet'" id='$handle' href='$href' type='text/css' media='all' />
EOT;
  return $html;
}
add_filter( 'style_loader_tag', 'add_rel_preload', 10, 4 );

//yoast seo- add description if it doesn't exist 

add_filter( 'wpseo_metadesc', 'change_yoast_desc', 10, 2);

function change_yoast_desc ( $desc , $presentation ){
  global $product;
if(!$desc && $product){
  $desc = wp_trim_words($product->get_description(), 160);
}
  
	return $desc;
}

// ajax add to cart 
add_action('wp_ajax_woocommerce_ajax_add_to_cart', 'woocommerce_ajax_add_to_cart');
add_action('wp_ajax_nopriv_woocommerce_ajax_add_to_cart', 'woocommerce_ajax_add_to_cart');
        
function woocommerce_ajax_add_to_cart() {

            $product_id = apply_filters('woocommerce_add_to_cart_product_id', absint($_POST['product_id']));
            $quantity = empty($_POST['quantity']) ? 1 : wc_stock_amount($_POST['quantity']);
            $variation_id = absint($_POST['variation_id']);
            $passed_validation = apply_filters('woocommerce_add_to_cart_validation', true, $product_id, $quantity);
            $product_status = get_post_status($product_id);

            if ($passed_validation && WC()->cart->add_to_cart($product_id, $quantity, $variation_id) && 'publish' === $product_status) {

                do_action('woocommerce_ajax_added_to_cart', $product_id);

                if ('yes' === get_option('woocommerce_cart_redirect_after_add')) {
                    wc_add_to_cart_message(array($product_id => $quantity), true);
                }

                WC_AJAX :: get_refreshed_fragments();
            } else {
                $data = array(
                    'error' => true,
                    'product_url' => apply_filters('woocommerce_cart_redirect_after_error', get_permalink($product_id), $product_id));

                echo wp_send_json($data);
            }

            wp_die();
        }

        //add to cart ajax
       /**
 * Show cart contents / total Ajax
 */

add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );

function woocommerce_header_add_to_cart_fragment( $fragments ) {
  global $woocommerce;

  ob_start();

  ?>
   <div class="cart-box">
            <div class="top-banner dark-green-bc">
                <div class="items">
                    <span> <i class="fal fa-shopping-cart white regular"></i></span>
                    <span class="white regular font-s-regular ">ITEMS IN YOUR CART</span>    
                </div>
                <div class="close-button-container">
                    <span class="close-button white font-s-regular ">CLOSE <i class="fal fa-times white font-s-regular "></i></span>
                </div>
            </div>
                <div class="flex-card">
                        <?php

                        foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                            $product = $cart_item['data'];
                            $product_id = $cart_item['product_id'];
                            $quantity = $cart_item['quantity'];
                            $price = WC()->cart->get_product_price( $product );
                            $subtotal = WC()->cart->get_product_subtotal( $product, $cart_item['quantity'] );
                            $link = $product->get_permalink( $cart_item );
                            // Anything related to $product, check $product tutorial
                            $meta = wc_get_formatted_cart_item_data( $cart_item );
                           
                            ?>
                    <!-- front end cart items cards -->
                    <div class="product-card">
                        <?php 

                                // condition to check if the product is simple
                        if($product->name == "Free Sample"){
                                    // pulling information of an original product in a form of an objec†
                        $originalProduct = wc_get_product( $cart_item["free_sample"] );
                        
                        ?>
                        <a href="<?php echo get_the_permalink($originalProduct->get_id()); ?>" class="rm-txt-dec">
                            
                            <div class="img-container">
                                <img src="<?php echo wp_get_attachment_image_url( $originalProduct->image_id, 'woocommerce_thumbnail' );?>" alt="<?php echo $originalProduct->get_name()?>">
                            </div>
                            <div class="title-container">
                                    <h5 class="font-s-regular regular"> <?php echo $quantity;?> X  Free Sample (<?php echo $originalProduct->get_name(); 
                                    ?> )
                                    </h5>
                            </div>
                            
                            <div class="price-container">
                            <h6 class="font-s-regular roboto-font bold">$<?php echo number_format($product->price * $quantity) ?></h6>
                            </div>
                            <!-- <i class="fal fa-times remove-cart-item-btn" data-productID="<?php echo $product_id;?>"></i> -->
                        </a>

                        <?php
                        }
                        else{
                            ?>
                            <a href="<?php echo $link?>" class="rm-txt-dec">
                                
                                <div class="img-container">
                                    <img src="<?php echo get_the_post_thumbnail_url($product_id, 'medium');?>" alt="<?php echo $product->name?>">
                                </div>
                                <div class="title-container">
                                        <h5 class="font-s-regular regular"> <?php echo $quantity;?> X  <?php echo $product->name
                                        ?> 
                                        </h5>
                                </div>
                                
                                <div class="price-container">
                                <h6 class="font-s-regular roboto-font bold">$<?php echo number_format($product->price * $quantity, 2); ?></h6>
                                </div>
                                
                                <!-- <i class="fal fa-times remove-cart-item-btn" data-productID="<?php echo $product_id;?>"></i> -->
                            </a>
                            <?php
                        }
                        ?>
                    </div>
                
                    <?php
                    
                    }
                    
                    ?>
			    </div>
                <div class="pop-up-footer">
                    <div class="total-container dark-green-bc">
                        
                        <div class="total roboto-font white">
                            Total: $<?php 
                            $totalAmount = str_replace(".00", "", (string)number_format (WC()->cart->total, 2, ".", ""));
                            echo number_format($totalAmount); ?>
                        </div>
                    </div>
                    <div class="cont-shopping">
                            <a class="rm-txt-dec button btn-dk-red-border btn-full-width center-align" href="#">Continue Shopping</a>
                        </div>
                    <div class="checkout-btn">
                        <a class="rm-txt-dec button btn-dk-red btn-full-width center-align checkout-btn-header" href="<?php echo get_site_url();?>/cart">Checkout</a>
                    </div>
                </div>
            </div>
 <?php
$fragments['.cart-box'] = ob_get_clean();
  return $fragments;
}

// add to cart ajax slider down
add_action( 'wp_footer', 'trigger_for_ajax_add_to_cart' );
function trigger_for_ajax_add_to_cart() {
    ?>
        <script type="text/javascript">
     
            (function($){
                $('body').on( 'added_to_cart', function(){
                
                    // Your code goes here
                    $('.cart-popup-container').slideDown();
                    $('.header .shopping-cart a i').toggleClass('fa-chevron-up');
                    // setTimeout(function(){  $('.cart-popup-container').slideUp('slow');}, 3000);

                   // $('.cart-popup-container .fa-times').on('click', closeCart)
                
                      
                });
            })(jQuery);

          
        </script>
    <?php
}

// show cart item number in the header on add to cart
add_filter('woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_item_fragment');

function woocommerce_header_add_to_cart_item_fragment( $fragments ) {
    global $woocommerce;

    ob_start();

    ?>
    <span class="cart-item-count">Cart (<?php echo WC()->cart->get_cart_contents_count(); ?>)</span>
    <?php

    $fragments['span.cart-item-count'] = ob_get_clean();

    return $fragments;

}

// remove item from cart pop up 
function remove_item_from_cart() {
    $cart = WC()->instance()->cart;
    $id = $_POST['product_id'];
    $cart_id = $cart->generate_cart_id($id);
    $cart_item_id = $cart->find_product_in_cart($cart_id);

    if($cart_item_id){
       $cart->set_quantity($cart_item_id, 0);
       return true;
    } 
    return false;
    }

    add_action('wp_ajax_remove_item_from_cart', 'remove_item_from_cart');
    add_action('wp_ajax_nopriv_remove_item_from_cart', 'remove_item_from_cart');
    

//   ajax login 
function ajax_login_init(){

    wp_register_script('ajax-login-script', get_template_directory_uri() . '/ajax-login-script.js', array('jquery') ); 
    wp_enqueue_script('ajax-login-script');

    wp_localize_script( 'ajax-login-script', 'ajax_login_object', array( 
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'redirecturl' => home_url(),
        'loadingmessage' => __('Sending user info, please wait...')
    ));

    // Enable the user with no privileges to run ajax_login() in AJAX
    add_action( 'wp_ajax_nopriv_ajaxlogin', 'ajax_login' );
}

// Execute the action only if the user isn't logged in
if (!is_user_logged_in()) {
    add_action('init', 'ajax_login_init');
}

function ajax_login(){

    // First check the nonce, if it fails the function will break
    check_ajax_referer( 'ajax-login-nonce', 'security' );

    // Nonce is checked, get the POST data and sign user on
    $info = array();
    $info['user_login'] = $_POST['username'];
    $info['user_password'] = $_POST['password'];
    $info['remember'] = true;

    $user_signon = wp_signon( $info, false );
    if ( is_wp_error($user_signon) ){
        echo json_encode(array('loggedin'=>false, 'message'=>__('Wrong username or password.')));
    } else {
        echo json_encode(array('loggedin'=>true, 'message'=>__('Login successful, redirecting...')));
    }

    die();
}