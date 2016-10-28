<?php 
/*
Template Name: about
*/
?>

<div class="noisey" id="<?php the_title(); ?>">
		
		<div class="heading">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/Headline_about.png" alt="about" />
        </div>
        
	<h4><?php the_content()?></h4>
            

		<div class="grid myos-profile">
            
		<?php 
			
			$args = array(
            'post_type' => 'about_myos_page'
			);
			
			$loop = new WP_Query( $args );
			if( $loop->have_posts() ){
				while( $loop->have_posts() ): $loop->the_post(); global $post; 

					$child_pages = types_child_posts("myos-profile");
					foreach ($child_pages as $myos_profile) {
						//var_dump($myos_profile->fields);
						$imageIsLeft = filter_var($myos_profile->fields['picture-is-left'], FILTER_VALIDATE_BOOLEAN);
						$profileName = $myos_profile->fields['about-name'];
						$profileImageLoc = $myos_profile->fields['about-profile-picture'];
						$instagramURL = $myos_profile->fields['instagram-url'];
					?>

			     <div class="row">
				 	
                    
				 <?php if($imageIsLeft){?>
					<div class="col-sm-6 upright">
                         <img class="profile-picture " src="<?php echo $profileImageLoc; ?>" alt="Profile of Ryslee" />
					</div>
					 <div class="profile-description right col-sm-6">
                        <div class="profile-heading semi-bold"><?php echo $profileName ?></div>
                        <p class="semi-bold"><?php echo $myos_profile->post_content; ?></p>
                        <p class="instagram"><a href="<?php echo $instagramURL ?>" target="_blank">Instagram</a></p>
                    </div>
                    
                 
				<?php } else{ ?>
				 
				     <div class="profile-description left col-sm-6">
                        <div class="profile-heading semi-bold"><?php echo $profileName ?></div>
                        <p class="semi-bold"><?php echo $myos_profile->post_content; ?></p>
                        <p class="instagram"><a href="<?php echo $instagramURL ?>" target="_blank">Instagram</a></p>
                    </div>
					<div class="col-sm-6 upright">
                         <img class="profile-picture " src="<?php echo $profileImageLoc; ?>" alt="Profile of Ryslee" />
                    </div>
                
                    
                 
				<?php }?>
				 </div>
                 
                    
					<?php
					}
				
				endwhile;
			}
		?>
		</div>


		<div class="btn-myos-center"><a href="<?php echo get_permalink(get_page_by_title("About-Detail", OBJECT)); ?>" class="btn btn-myos-transparent">Read More</a></div>
</div>


