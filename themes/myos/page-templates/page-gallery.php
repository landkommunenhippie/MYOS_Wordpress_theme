<?php 
/*
Template Name: gallery
*/
get_header();
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
        
        <div class="btn-myos-center"><a href="<?php echo get_permalink(get_page_by_title("Gallery-Detail", OBJECT)); ?>" class="btn btn-myos-transparent">Load More</a></div>
</div>

