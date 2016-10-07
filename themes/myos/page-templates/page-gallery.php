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
                //the_content(); 

                $args = array(
                'post_type' => 'gallery-page'
                );
                
                $loop = new WP_Query( $args );
                if( $loop->have_posts() ){
                    while( $loop->have_posts() ): $loop->the_post(); global $post; 

                        $child_pages = types_child_posts("gallery-page-item");
                        foreach ($child_pages as $myos_gallery_item) {
            ?>
            <div class="gallery-item"><img src="<?php echo $myos_gallery_item->fields['image1'] ?>" alt="" class="img-responsive"></div>
            <div class="gallery-item gallery-item--width2"><img src="<?php echo $myos_gallery_item->fields['image2'] ?>" alt="" class="img-responsive"></div>
            <div class="gallery-item"><img src="<?php echo $myos_gallery_item->fields['image3'] ?>" alt="" class="img-responsive"></div>
            <div class="gallery-item"><img src="<?php echo $myos_gallery_item->fields['image4'] ?>" alt="" class="img-responsive"></div>
            <div class="gallery-item"><img src="<?php echo $myos_gallery_item->fields['image5'] ?>" alt="" class="img-responsive"></div>
            <div class="gallery-item"><img src="<?php echo $myos_gallery_item->fields['image6'] ?>" alt="" class="img-responsive"></div>
            <?php
                        }
                    endwhile;
                }
                
            ?>
        </div>
        
        <div class="btn-myos-center"><a href="#" class="btn btn-myos-transparent">Load More</a></div>
</div>

