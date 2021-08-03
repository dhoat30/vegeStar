<!DOCTYPE html>
<html <?php language_attributes();?>>
<head>
        <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-KQXDHV5');</script>
    <!-- End Google Tag Manager -->

    <meta charset="<?php bloginfo('charset');?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="profile" href="https://gmpg.org/xfn/11"/>
    <?php wp_head(); ?>
    

       
</head>
<?php 
    global $template;
    //check the template 
    if(is_post_type_archive()) {
        $archive = 'product-archive'; 
    }

?>
<body id="header"<?php body_class( );?> data-archive='<?php echo $archive ?>'>
    
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KQXDHV5"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->


    <section class="header off-white" >
        <div class="top-banner row-container">
            <h1 class="welcome-wrapper font-s-regular thin">
                Welcome to Vege Star!
            </h1>
            <ul class="link-container">
                <!-- wishlist -->
                <li class="wishlist">
                    <a href="<?php echo get_home_url().'/wishlist' ?>"   class="text-decoration-none white thin">
                            <i class="fal fa-heart"></i>
                            <span>Wishlist</span>
                    </a> 
                
                </li>
                
                <!-- login area -->
                <li class="login-area playfair-fonts font-s-regular profile-trigger ">
                
                        <?php 
                            if(is_user_logged_in()){
                                global $current_user; wp_get_current_user();  
                                ?> <a href="" class="profile-name-value text-decoration-none white thin">
                                    <i class="fal fa-user"></i> 
                                    <span>  
                                        <?php echo  $current_user->display_name;?>
                                        <i class="fal fa-chevron-down regular arrow-icon"></i>
                                    </span>
                                </a>   
                                    
                                
                                        <nav>
                                            <?php
                                                wp_nav_menu( array( 
                                                    'theme_location' => 'top-navbar', 
                                                    'container_class' => "my-account-nav"
                                                )); 
                                            ?>
                                        </nav>  
                                        
                                <?php
                            }
                            else{
                                ?><a href="<?php echo get_site_url(); ?>/my-account/" class="text-decoration-none dark-grey thin" data-root-url='<?php echo get_home_url()?>/account-profile' id="show_login">
                                    <i class="fal fa-user"></i>
                                    <span>Login</span> 
                            </a>
                                <?php
                            }
                        ?>
                    
                </li>
                
                <!-- shopping cart -->
                <li class="shopping-cart playfair-fonts font-s-regular desktop-visible">
                    <a href="#" class="text-decoration-none dark-grey cart-items-header thin">
                        <i class="fal fa-shopping-cart"></i>
                        <span class="cart-item-count thin">Cart (<?php echo WC()->cart->get_cart_contents_count(); ?>)</span>
                    </a>
                </li>
            </div>
        </div>


        <!--main navbar --> 
      
        <?php 

            $argsLogo = array(
                'pagename' => 'contact', 
                'posts_per_page' => 1

            );
            $logo = new WP_Query( $argsLogo );

            while($logo->have_posts()){ 
                $logo->the_post(); 
                $patternImage = get_field('pattern');
                ?>

        <nav class="navbar" style='background: url(<?php print_r($patternImage['sizes']['medium_large'])?>); width: 100%; height: auto; background-size: cover; '>
            <div class="container row-container">
                <div class="logo-container">

                        
                            <a href="<?php echo get_site_url(); ?>">
                                <?php 
                                $image = get_field('logo');
                                $size = 'full'; // (thumbnail, medium, large, full or custom size)
                                ?>
                                <img src="<?php  print_r($image['sizes']['medium']);?>" alt="">
                                
                            </a>
                            <?php
                            }
                            wp_reset_postdata();


                        ?>
                </div>

                <div class="links row-container">
                <?php
                wp_nav_menu(
                        array(
                            'theme_location' => 'main_menu', 
                            'container_id' => 'top-navbar'
                        ));
                ?>
                </div>

                <!-- search code -->
                <div class="search-icon"><svg focusable="false" aria-label="Search" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="30px"><path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"></path></svg></div>
                <div class="search-code playfair-fonts font-s-regular dark-grey">
                    <i class="fal fa-times"></i>
                    <?php if (strstr($_SERVER['SERVER_NAME'], 'localhost')) {
                        echo  do_shortcode('[ivory-search id="79" title="Default Search Form"]');
                        }
                        else{
                            echo do_shortcode('[ivory-search id="230974" title="Default Search Form"]');
                        }
                        
                        ?>

                </div>
            </div>

                 
    </section>

 <!--Logo   -->
 

<!-- cart popup -->
      
        <div class="cart-popup-container box-shadow">
            
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
			
		</div>


<!-- login form  -->
<form id="login" action="login" method="post">
        <h1>Site Login</h1>
        <p class="status"></p>
        <label for="username">Username</label>
        <input id="username" type="text" name="username">
        <label for="password">Password</label>
        <input id="password" type="password" name="password">
        <a class="lost" href="<?php echo wp_lostpassword_url(); ?>">Lost your password?</a>
           
        <div class="flex">
            <input class="submit_button" type="submit" value="Login" name="submit">
            <a class="btn-dk-red-border button rm-txt-dec center-align" href="<?php echo get_site_url();?>/my-account">Register</a>
        </div>

        
        <a class="close" href="">(close)</a>
        <?php wp_nonce_field( 'ajax-login-nonce', 'security' ); ?>
    </form>
