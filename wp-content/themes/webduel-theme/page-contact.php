<?php 
/* Template Name: Places * Template Post Type: post*/ /*The template for displaying full width single posts. */
get_header(); 

?>


<!-- category section  -->
<div class="contact off-white-bc margin-row">
    <div class="category-container row-container">
        <h2 class="column-s-font regular center-align">Contact </h2>   
        <h3 class="thin font-s-regular center-align">
            We will get back to you in 4-12 hours.
        </h3>                                 
    </div>

    <div class="products row-container">
        <?php 

           
            while(have_posts()){ 
                the_post(); 
                echo the_content();
                ?>
          
                
                

            
            <?php 

                }
                ?>
    </div>

              

</div>

<?php 

get_footer(); 
?>