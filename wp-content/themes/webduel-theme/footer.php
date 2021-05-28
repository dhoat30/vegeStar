
<footer class="grey-bc footer">

  <div class="footer-menu-row row-container ">
    <div class="quick-nav">
      <h6 class="footer-menu-title">
        Quick Links
      </h6>
      <?php
                  wp_nav_menu( array( 
                      'theme_location' => 'footer-quick-links'
                    )); 
            ?>
    </div>

    <div class="contact">
      <h6 class="footer-menu-title">
          Contact
      </h6>
              <?php 

        $argsContact = array(
            'pagename' => 'contact', 
            'posts_per_page' => 1
          
        );
        $contact = new WP_Query( $argsContact );

        while($contact->have_posts()){ 
            $contact->the_post(); 

            ?>
            <ul>
              <li><a href="tel:<?php echo get_field('phone_number');?>"><i class="fas fa-phone-square-alt dark-red"></i><?php echo get_field('phone_number');?></a></li>
              <li><a href="tel:<?php echo get_field('toll_free_phone');?>"><i class="fas fa-phone-square-alt dark-red"></i><?php echo get_field('phone_number');?></a></li>
              <li><a href="mailto:<?php echo get_field('email_');?>"><i class="fas fa-envelope dark-red"></i><?php echo get_field('email_');?></a></li>
              <li><a href="<?php echo get_field('facebook');?>"><i class="fab fa-facebook-square dark-red"></i>Facebook</a></li>
            </ul>
            <?php 
        wp_reset_postdata();
        }
        ?>
     

    </div>



    <div class="newsletter">
      <h6 class="footer-menu-title">
        Get Monthly Catalogue

      </h6>
      <div class="mailchimp-form">
        <?php 
        if(strstr($_SERVER['SERVER_NAME'], 'localhost')){
          echo do_shortcode('[mc4wp_form id="106"]');

        }
        else{
          echo do_shortcode('[mc4wp_form id="26989"]');
        }
        ?>
      </div>

    </div>


  </div>

 
  <div class="copyright-container row-container">
    <div>© Copyright 2019 Hospo Supplies. All rights reserved. <a href="https://webduel.co.nz" rel="nofollow"
        target="_blank" class="dark-green rm-txt-dec"> Built By WebDuel</a></div>
  </div>
</footer>


<div class="go-to-header hide" id='go-to-header'>
  <a href="#header"><i class="fad fa-caret-square-up"></i></a>
</div>

<?php wp_footer();?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnify/2.3.3/js/jquery.magnify.min.js"
  integrity="sha512-YKxHqn7D0M5knQJO2xKHZpCfZ+/Ta7qpEHgADN+AkY2U2Y4JJtlCEHzKWV5ZE87vZR3ipdzNJ4U/sfjIaoHMfw=="
  crossorigin="anonymous" defer></script>

<!-- Optional mobile plugin (uncomment the line below to enable): -->
<!-- <script src="/js/jquery.magnify-mobile.js"></script> -->
<script>
  
  jQuery(document).ready(function ($) {
    $('.zoom').magnify({
      magnifiedWidth: 1500
    });
  });
</script>

</body>

</html>