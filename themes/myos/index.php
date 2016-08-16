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

	<div id="content" class="site-content">
	
	<?php echo get_bloginfo('template_url'); ?>/style.css
	
	<?php
	// Start the loop.
	while ( have_posts() ) : the_post();

		/*
		 * Include the Post-Format-specific template for the content.
		 * If you want to override this in a child theme, then include a file
		 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
		 */
	?>
		 
		<h2><?php the_title(); ?></h2>
		<?php 
			the_content(); 
			echo get_post_format();// get_template_part( 'content', get_post_format() );
	
		?>
	
	<?php
	// End the loop.
	endwhile; ?>

	</div>
<?php get_footer(); ?>
