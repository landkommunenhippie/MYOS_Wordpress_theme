<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet"  href="<?php echo get_stylesheet_directory_uri(); ?>/css/bootstrap/bootstrap.css">
	<link rel="stylesheet"  href="<?php echo get_stylesheet_directory_uri(); ?>/css/style.css">

	<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/smooth_scrolling.js"></script>
	<script src="https://unpkg.com/masonry-layout@4.1/dist/masonry.pkgd.js"></script>
	
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<!-- Dunno what happens here. <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>"> -->
	<?php endif; ?>
	<?php wp_head(); ?>
</head>

<body>
	<div class="container-fluid">
     
<?php
	/*
	GET all SubPageItems With a-Tag
	*/
	$newsPage = get_page_by_title( 'news' );					
	$pages = wp_list_pages(array(
		'echo' => 0, 
		'child_of' => get_option('page_on_front'), 
		'title_li' => null,
		'sort-column' => 'menu_order',
		'exclude' => $newsPage->ID
		)
	);
	$pagesWithoutListTags = strip_tags($pages, '<a>');
	$pageArr = preg_split("/\n/",$pagesWithoutListTags, -1 ,PREG_SPLIT_NO_EMPTY);
	array_push($pageArr,'<a href="#">BOOK NOW</a>');
	
	/*
	Split Nav Items with Meridian
	*/
	$navMedian = ceil(sizeof($pageArr) / 2); 
	$leftSideNavItems = array_slice($pageArr, 0, $navMedian);
	$rightSideNavItems = array_slice($pageArr, $navMedian);
	
	//var_dump($leftSideNavItems);
	//var_dump($rightSideNavItems);

?>
			


		<div class="fixed-nav" id="fixed-nav">
            <div class="navbar navbar-fixed-top bold">
                <div class="collapse navbar-collapse" id="navbar-collapse-1">
                    <div class="navbar-center navbar-brand" href="#">
                    <div class="brand small-brand"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/Logo_MYOS_small.png"></div>
                </div>
                    <ul class="nav navbar-nav navbar-left">
						<?php 
						foreach($leftSideNavItems as $navItem){
							echo "<li>".$navItem.'</li>';
						}
						?>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<?php 
						foreach($rightSideNavItems as $navItem){
							echo "<li>".$navItem.'</li>';
						}
						?>
						<li><a>|</a></li>
						<li><a class="regular-link" href="#">#MYOS</a></li>
						<li><a class="regular-link" href="#">f</a></li>
					</ul>
				 </div>
            </div>
        </div>


			<nav id="main-nav" class="navbar navbar-default  main-nav bold" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="navbar-collapse-1">
					<div class="navbar-center navbar-brand" href="#">
					<div class="brand"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/Logo_MYOS.png"></div>
					</div>
					<ul class="nav navbar-nav navbar-left">
						<?php 
						foreach($leftSideNavItems as $navItem){
							echo "<li>".$navItem.'</li>';
						}
						?>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<?php 
						foreach($rightSideNavItems as $navItem){
							echo "<li>".$navItem.'</li>';
						}
						?>
						<li><a>|</a></li>
						<li><a class="regular-link" href="#">#MYOS</a></li>
						<li><a class="regular-link" href="#">f</a></li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</nav><!-- /main-Nav -->
		