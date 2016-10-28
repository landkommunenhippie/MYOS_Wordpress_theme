<?php 
/*
Template Name: Blue BG Single Column News
*/
get_header(); 
?>

	<div class="noisey" role="main">
		
        <div class="detail-content blue single-news semi-bold">
		
        <?php
		// Start the loop.
		while ( have_posts() ) : the_post();
			the_content();
		endwhile
			
		?>
		</div>
	</div><!-- .site-main -->

<?php 


	$post = get_page_by_title("contact", OBJECT);
  	
	$dir_arr = explode('/', get_page_template());
	$template_dir = $dir_arr[sizeof($dir_arr) - 2]."/".$dir_arr[sizeof($dir_arr)-1];
	
	$args = array(
            'page_id' => $post->ID
			);
		
	$loop = new WP_Query( $args );
	
	if( $loop->have_posts() ){
		while( $loop->have_posts() ): $loop->the_post(); global $post; 
			if (locate_template($template_dir,true, true) == '') {
				// nope, load the content
				echo("No Template exists assigned site " . the_title());
				//the_content();
			} 
			?>

<?php
	endwhile; 
}
?>


<?php get_footer(); ?>