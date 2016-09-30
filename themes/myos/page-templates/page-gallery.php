<?php 
/*
Template Name: gallery
*/

?>

<div class="noisey" id="<?php the_title(); ?>">
		
		<div class="heading">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/Headline_Gallery.png" alt="about" />
        </div>
         
         <div class="gallery-grid">
            <?php 
                the_content(); 
            ?>
        </div>
        
        <div class="btn-myos-center"><a href="#" class="btn btn-myos-transparent">Load More</a></div>
</div>

