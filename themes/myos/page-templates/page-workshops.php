<?php 
/*
Template Name: workshops
*/
get_header();
?>

<div class="ws" id="workshops">
             
    <div class="heading">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/Headline_Workshops.png" alt="workshops" />
    </div>     
    <?php the_content();?>
    
    <div class="grid"> 
        <?php 
			$args = array(
            'post_type' => 'myos-workshop-page'
			);
			
			$loop = new WP_Query( $args );
			if( $loop->have_posts() ){
				while( $loop->have_posts() ): $loop->the_post(); global $post; 
                    
                    $child_pages = types_child_posts("myos-workshop");
					foreach ($child_pages as $index => $myos_workshop) {
                        $wsTitle = $myos_workshop->fields['workshop-title'];   
                        $itemSurface = $myos_workshop->fields['item-surface'];
                        $wsDuration = $myos_workshop->fields['workshop-duration'];
                        $wsShortDesctiption = $myos_workshop->fields['workshop-short-desctiption'];
                    ?>
                         <div class="row">
                            
                            <?php if($index % 2 != 0) {?>
                            <div class="ws-offer-divider"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/divider.png" alt="next offer" /> </div>
                            <div class="col-sm-6 ws-description">
                                <?php echo $myos_workshop->post_content; ?>
                            </div>     
                            <?php }?>
                            
                            <div class="col-sm-6 offer">
                                <h3 class="semi-bold"><?php echo $wsTitle ?></h3>
                                <div class="hardfacts">
                                    <p class="surface"><?php echo $itemSurface ?></p>
                                    <p class="time semi-bold">hrs <span class="number"><?php echo $wsDuration ?></span></p>
                                </div>

                                <div class="offer-description semi-bold">
                                    <?php echo $wsShortDesctiption ?>
                                </div>
                                
                                <a href="#contact" class="btn btn-myos-black">Book Now</a>

                            </div>
                            
                            <?php if($index % 2 == 0) {?>
                            
                            <div class="col-sm-6 ws-description">
                                <?php echo $myos_workshop->post_content; ?>
                            </div>
                            <?php }?>
                            
                        </div>
        <?php       
                    }
                endwhile;
            }
		?>
    </div>
    
</div>
