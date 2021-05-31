<?php 
/* Template Name: Places * Template Post Type: post*/ /*The template for displaying full width single posts. */
get_header(); 

?>
<!-- slider -->
<section class="home-page">
    <div class="slider-container">


        <div class="slider">
           


            <?php 

                                        $args = array(
                                            'post_type' => 'sliders',
                                            'tax_query' => array(
                                                array(
                                                    'taxonomy' => 'slider',
                                                    'field'    => 'slug',
                                                    'terms'    => array( 'home-page-hero-slider'),
                                                )
                                                ), 
                                                'orderby' => 'date', 
                                                'order' => 'ASC'
                                        );
                                        $query = new WP_Query( $args );

                                        while($query->have_posts()){ 
                                            $query->the_post(); 
                                            $image = get_field('mobile_image'); 
                                            $imgUrl; 
                                            if($image['sizes']['medium_large']){
                                                $imgUrl = $image['sizes']['medium_large'];
                                            }
                                            else{
                                                $imgUrl = $image['url'];
                                            }
                                          
                                            ?>
                                            <a class="slide" href="<?php echo  get_field('add_link'); ?>">
                                            <picture > 
                                                    <source media="(min-width:700px)" srcset="<?php echo get_the_post_thumbnail_url(null,"full"); ?>">
                                                    <source media="(min-width:465px)" srcset="<?php echo get_the_post_thumbnail_url(null,"large"); ?>">
                                                    <img   src="<?php echo esc_url($imgUrl);?>" alt="<?php echo get_the_title();?>" loading="lazy">
                                                </picture>   

                                            </a>                       
                                                <?php

                                       
                                        }
                                        wp_reset_postdata();

                                        ?>



        </div>


        <div class="buttons">
            <button id="prev"><i class="fas fa-arrow-left"></i></button>
            <button id="next"><i class="fas fa-arrow-right"></i></button>
        </div>
    </div>


    
</section>

<!-- category section  -->
<div class="category-section off-white-bc margin-row">
    <div class="category-container row-container">
        <h2 class="column-s-font regular">Specials</h2>   
        <h3 class="thin font-s-regular">We add specials every week.</h3>                                 
    </div>

    <div class="products row-container owl-carousel owl-theme">
        <?php 

            $argsCategory = array(
                'post_type' => 'product', 
                'posts_per_page' => 15, 
                'meta_key' => '_sale_price',
                'meta_value' => '0',
                'meta_compare' => '>=',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'product_cat',
                        'field'    => 'slug',
                        'terms'    =>  array('fruits', 'vegetables') 
                    )
                )
            );
            $category = new WP_Query( $argsCategory );

            while($category->have_posts()){ 
                $category->the_post(); 

                $percentage = $product->get_sale_price()/ $product->get_regular_price() *100;
                $percentage = 100 - $percentage;
                ?>
          
                <a class="rm-txt-dec product-card" href="<?php echo get_the_permalink();?>">
                        <img src="<?php echo get_the_post_thumbnail_url(null,"medium")?>" alt="<?php echo get_the_title();?>" loading="lazy">
                        <h3 class="regular font-s-regular"><?php echo wp_trim_words($product->get_name(), 4);?></h3>
                        <p class="paragraph price">
                            <span class="regular-price regular light-grey">$<?php echo round($product->get_regular_price(), 2);?> </span>
                            <span class="sale-price regular dark-red">$<?php if( $product->is_on_sale() ){echo round($product->get_sale_price(), 2);}?></span>
                            <span class="percentage regular dark-red-bc white border-radius-min">-<?php echo round($percentage, 0, PHP_ROUND_HALF_DOWN);?>%</span>
                        </p>
                </a>
                

            
            <?php 

                }
                wp_reset_postdata();
                ?>
    </div>

              

</div>

<!-- category section - All categories  -->
<div class="category-section off-white-bc margin-row">
    <div class="category-container row-container">
        <h2 class="column-s-font regular">Shop By Category </h2>   
        <h3 class="thin font-s-regular">Get fresh product everyday. </h3>                                 
    </div>

    <div class="row-container category-cards flex">
        <?php 

            $argsCategory = array(
                'post_type' => 'category', 
                'posts_per_page' => -1
            );
            $category = new WP_Query( $argsCategory );

            while($category->have_posts()){ 
                $category->the_post(); 

                ?>
          
                <a class="rm-txt-dec category-card" href="<?php echo get_the_permalink();?>">
                        <img loading="lazy" src="<?php echo get_the_post_thumbnail_url(null,"medium_large")?>" alt="<?php echo get_the_title();?>">
                        <div class="button-container">
                            <h3 class="regular column-s-font center-align white margin-elements"><?php echo get_the_title();?></h3>
                            <div class="link center-align white"> Shop Now</div>
                        </div>
                       
                        
                </a>

            <?php 

                }
                wp_reset_postdata();
                ?>
    </div>
</div>

<div class="gallery-section">


    <div class="row-container gallery-cards flex">
        <?php 

            $argsGallery = array(
                'post_type' => 'gallery', 
                'posts_per_page' => -1
            );
            $gallery = new WP_Query( $argsGallery );

            while($gallery->have_posts()){ 
                $gallery->the_post(); 

                ?>
                        
                        <img loading="lazy" src="<?php echo get_the_post_thumbnail_url(null,"medium_large")?>" alt="<?php echo get_the_title();?>">
 
            <?php 

                }
                wp_reset_postdata();
                ?>
    </div>
</div>

<!-- review section -->
<section class="review-section">
    <div class="review-section-card row-container">
        <div class="review-container ">
            <div class="column-s-font center-align white">Customer Reviews </div>   
        </div>
        <div class="review-cards owl-carousel">
                    <?php 

                $argsReview = array(
                    'post_type' => 'reviews', 
                    'posts_per_page' => 1
                );
                $review = new WP_Query( $argsReview );

                while($review->have_posts()){ 
                    $review->the_post(); 

                    ?>
                            <div class="card">
                                <div class="image-container">
                                    <div class="backdrop"></div>
                                    <div class="image">
                                        <img loading="lazy" src="<?php echo get_the_post_thumbnail_url(null,"medium_large")?>" alt="<?php echo get_the_title();?>">
                                        <h6 class="font-s-med ft-wt-med center-align"><?php echo get_the_title();?></h6>
                                    </div>
                                </div>

                                <div class="review white">
                                 <?php echo get_field('review');?>
                                </div>
                                
                            </div>
                            
                            
                <?php 

                    }
                    wp_reset_postdata();
                    ?>
        </div>
    </div>
    
</section>
<script>
    const slides = document.querySelectorAll('.slide');
    const next = document.querySelector('#next');
    const prev = document.querySelector('#prev');
    const auto = true; // Auto scroll
    const intervalTime = 3000;
    let slideInterval;
    slides[0].classList.add('current');

    const nextSlide = () => {
        // Get current class
        const current = document.querySelector('.current');
        // Remove current class
        current.classList.remove('current');
        // Check for next slide
        if (current.nextElementSibling) {
            // Add current to next sibling
            current.nextElementSibling.classList.add('current');
        } else {
            // Add current to start
            slides[0].classList.add('current');
        }
        setTimeout(() => current.classList.remove('current'));
    };

    const prevSlide = () => {
        // Get current class
        const current = document.querySelector('.current');
        // Remove current class
        current.classList.remove('current');
        // Check for prev slide
        if (current.previousElementSibling) {
            // Add current to prev sibling
            current.previousElementSibling.classList.add('current');
        } else {
            // Add current to last
            slides[slides.length - 1].classList.add('current');
        }
        setTimeout(() => current.classList.remove('current'));
    };

    // Button events
    next.addEventListener('click', e => {
        console.log('clicked');
        nextSlide();
        if (auto) {
            clearInterval(slideInterval);
            slideInterval = setInterval(nextSlide, intervalTime);
        }
    });

    prev.addEventListener('click', e => {
        prevSlide();
        if (auto) {
            clearInterval(slideInterval);
            slideInterval = setInterval(nextSlide, intervalTime);
        }
    });

    // Auto slide
    if (auto) {
        // Run next slide at interval time
        slideInterval = setInterval(nextSlide, intervalTime);
    }
</script>
<?php 

get_footer(); 
?>