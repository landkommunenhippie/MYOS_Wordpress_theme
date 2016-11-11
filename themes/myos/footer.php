<?php
$faq = get_page_by_title("FAQ", OBJECT);
$imprint = get_page_by_title("imprint", OBJECT);

?>
		    
			
		<div class="footer grid semi-bold">
			<div class="row">
				
				<div class="col-sm-7">&#169; 2016 MYOS Workshops</div>
				<div class="col-sm-1"><a href="<?php echo get_post_permalink($faq->ID) ?>">FAQ</a></div>
				<div class="col-sm-1"><a href="<?php echo get_post_permalink($imprint->ID) ?>">Imprint</a></div>
				<div class="col-sm-1"><a href="<?php echo get_post_permalink($imprint->ID) ?>">Privacy</a></div>
				<div class="col-sm-1"><a target="_blank" href="https://www.facebook.com/MakeYourOwnSign/">Facebook</a></div>
				<div class="col-sm-1"><a href="#">#MYOS</a></div>
			</div>
		</div>
	</div> <!-- /.spacey-contact end -->
   
</div><!-- .container-fluid -->

<?php wp_footer(); ?>
</body>
</html>
