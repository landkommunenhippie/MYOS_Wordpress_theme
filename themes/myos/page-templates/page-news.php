<?php 
/*
Template Name: news-slider
*/
get_header();
?>

<div class="slider-wrapper">
    <div class="image-slider">
        <div id="myos-carousel" class="carousel slide">
        <!-- Indicators -->
        
        <!-- Wrapper for Slides -->
        <div class="carousel-inner">
                        


<?php 
			$nrOfSlides = 0;
			$args = array(
            'post_type' => 'news-item'
			);

            	$loop = new WP_Query( $args );
			if( $loop->have_posts() ){
				
                while( $loop->have_posts() ): $loop->the_post(); global $post; 
                    $imageUrl = get_post_custom_values('wpcf-news-image')[0];
                    $newsItemCaption = get_post_custom_values('wpcf-news-item-caption')[0];
                    $hasTarget = get_post_custom_values('wpcf-news-item-button-target')[0];
                    $target = get_post_custom_values('wpcf-news-item-button-target')[0];
                    $btnCaption = get_post_custom_values('wpcf-news-item-button-caption')[0];
                
                
            ?>  
                <div class="item <?php if($nrOfSlides == 0) { echo "active";}?> ">
                    <!-- Set the first background image using inline CSS below. -->
                    <div class="fill" style="background-image:url('<?php echo $imageUrl; ?>');"></div>
                    <div class="carousel-caption">
                        <div class="slider-heading semi-bold"><?php echo $newsItemCaption; ?></div>
                        <?php if($hasTarget){ ?>
                        <p><a href="<?php echo $target; ?>" class="btn btn-myos-black message-1"><?php echo $btnCaption; ?></a></p>
                        <?php } ?>
                    </div>
                </div>
        
            <?php
                $nrOfSlides++;                
                endwhile;
            }
			
?>

        </div>    
                       
        
        <ol class="carousel-indicators semi-bold">
            <?php for($i = 0; $i < $nrOfSlides; $i++){ ?>
            <li data-target="#myos-carousel" data-slide-to="<?php echo $i ?>" class="<?php if($i == 0) { echo "active";}?>">
                    <div class="caption"><?php echo '0'.$i ?></div>
            </li>
            <?php } ?>
            
        </ol>

                    <!-- Controls 
                    <a class="left carousel-control" href="#my-carousel" data-slide="prev">
                        <span class="icon-prev"></span>
                    </a>
                    <a class="right carousel-control" href="#my-carousel" data-slide="next">
                        <span class="icon-next"></span>
                    </a>
                    -->

                </div>
            </div>
        </div>