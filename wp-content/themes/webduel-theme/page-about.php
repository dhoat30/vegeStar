<?php 
/* Template Name: Places * Template Post Type: post*/ /*The template for displaying full width single posts. */
get_header(); 

?>




<!-- USP  -->
<div class="usp-section about-us">
    <div class="usp-container row-container">
        <div class="lg-font-sz center-align title-underline">About Us </div>                                    
    </div>

    <div class="flex row-container">
        <?php 

           
            while(have_posts()){ 
                the_post(); 
                $firstImage = get_field('first_image');
                $secondImage = get_field('second_image');
                
                ?>
            <div class="cards">
                <div class="img-container">
                    <img src="<?php  print_r($firstImage['sizes']['large']);?>" alt="<?php echo get_the_title();?>">
                        
                </div>
                <div class="content-container">
                    <div class="section-ft-size "><?php echo get_field('first_subtitle');?></div>
                    <p class="paragraph"> <?php echo get_field('first_content'); ?></p> 
                </div>
            </div>
            <div class="cards">
                <div class="img-container">
                    <img src="<?php  print_r($secondImage['sizes']['large']);?>" alt="<?php echo get_the_title();?>">
                        
                </div>
                <div class="content-container">
                    <div class="section-ft-size "><?php echo get_field('second_subtitle');?></div>
                    <p class="paragraph"> <?php echo get_field('second_content'); ?></p> 
                </div>
            </div>
            <?php 

                }
                ?>
    </div>

              

</div>


<!-- about us -->


<?php 

get_footer(); 
?>