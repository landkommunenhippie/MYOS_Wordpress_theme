<?php 
/*
Template Name: about
*/
?>

<div class="noisey" id="<?php the_title(); ?>">
		
		<div class="heading">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/Headline_about.png" alt="about" />
            </div>
            
		<?php 
			the_content(); 
		?>

		<div class="btn-myos-center"><a href="#" class="btn btn-myos-transparent">Read More</a></div>
</div>


