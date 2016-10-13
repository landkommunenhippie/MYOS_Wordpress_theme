<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package lkh
 * @subpackage myos
 * @since myos 1.0
 */
get_header(); ?>
	
	

	<?php
	// Start the loop.
	while ( have_posts() ) : the_post();

		/*
		 * Include the Post-Format-specific template for the content.
		 * If you want to override this in a child theme, then include a file
		 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
		 */
	?>
		 
		<?php 
		    $dir_arr = explode('/', get_page_template());
			$template_dir = $dir_arr[sizeof($dir_arr) - 2]."/".$dir_arr[sizeof($dir_arr)-1];
			
			if (locate_template($template_dir,true, true) == '') {
				// nope, load the content
				echo("No Template exists assigned site " . the_title());
				the_content();
			} 
			
			//the_content(); 
			//echo get_post_format();// get_template_part( 'content', get_post_format() );
		?>

		
	<?php
	// End the loop.
	endwhile; ?>

<?php get_footer(); ?>
