<?php 
/* Template Name: Places * Template Post Type: post*/ /*The template for displaying full width single posts. */
get_header(); 

?>

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
                                                    <img   src="<?php echo esc_url($imgUrl);?>" alt="<?php echo get_the_title();?>">
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
<div class="category-section off-white-bc">
    <div class="category-container row-container">
        <div class="lg-font-sz center-align title-underline">Shop By Category</div>                                    
    </div>

    <div class="flex">
        <?php 

            $argsCategory = array(
                'post_type' => 'category', 
                'posts_per_page' => -1
            );
            $category = new WP_Query( $argsCategory );

            while($category->have_posts()){ 
                $category->the_post(); 
                ?>
            <div class="cards">
                <a class="rm-txt-dec" href="<?php echo get_the_permalink();?>">
                        <img src="<?php echo get_the_post_thumbnail_url(null,"medium")?>" alt="<?php echo get_the_title();?>">
                        <h3 class="center-align regular"><?php echo  get_the_title();?></h3>
                        <button  class="rm-txt-dec button btn-dk-red thin">Browse</button>
                </a>

            </div>
            <?php 

                }
                wp_reset_postdata();
                ?>
    </div>

              

</div>


<!-- USP  -->
<div class="usp-section">
    <div class="usp-container row-container">
        <div class="lg-font-sz center-align title-underline">What Do We Do Better? </div>                                    
    </div>

    <div class="flex row-container">
        <?php 

            $argsUSP = array(
                'post_type' => 'usp', 
                'posts_per_page' => -1
            );
            $usp = new WP_Query( $argsUSP );

            while($usp->have_posts()){ 
                $usp->the_post(); 
                ?>
            <div class="cards">
                <div class="img-container">
                    <img src="<?php echo get_the_post_thumbnail_url(null,"large")?>" alt="<?php echo get_the_title();?>">
                        
                </div>
                <div class="content-container">
                    <div class="section-ft-size "><?php echo get_the_title();?></div>
                    <?php the_content();?>
                </div>
                        
                

            </div>
            <?php 

                }
                wp_reset_postdata();
                ?>
    </div>

              

</div>


<!-- about us -->

<section class="about-section">
    <div class="flex row-container">

    <?php 

            $brandLogo = array(
                'pagename' => 'never-settling-for-good-enough',
                'posts_per_page'=> -1
            );
            $brandLogoQuery = new WP_Query( $brandLogo );

            while($brandLogoQuery->have_posts()){ 
                $brandLogoQuery->the_post(); 

                ?>
        <div class="content">
            <div class="section-ft-size "><?php echo get_the_title();?></div>
            <p class="paragraph"><?php echo get_the_content();?></p>
            <a class="button rm-txt-dec btn-dk-red" href="<?php echo get_field('about_us_page_link');?>">About Us</a>
        </div>
        <div class="img-container">
            <img loading="lazy" src="<?php echo get_the_post_thumbnail_url(null,"large"); ?>" alt="<?php echo get_the_title();?>">

        </div>
       

    <?php 
            }
            wp_reset_postdata();

    ?>

    </div>
</section>

<!-- brand  -->
<section class="brand-stripe">
    <div class="row-container">
        <div class="lg-font-sz center-align title-underline ">Our Range </div>                                    
    </div>
    <div class="flex row-container">

    <?php 

            $brandLogo = array(
                'post_type' => 'brand',
                'posts_per_page'=> -1
            );
            $brandLogoQuery = new WP_Query( $brandLogo );

            while($brandLogoQuery->have_posts()){ 
                $brandLogoQuery->the_post(); 

                ?>
        
        <img loading="lazy" src="<?php echo get_the_post_thumbnail_url(null,"medium"); ?>" alt="<?php echo get_the_title();?>">
       

    <?php 
            }
            wp_reset_postdata();

    ?>

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