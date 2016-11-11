<?php 
/*
Template Name: contact
*/
get_header();
?>

<div class="spacey" id="contact">
    <div class="contact-box">
        <div class="contact-badge"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/Badge_BOOKNOW.png" /></div>
        <div class="semi-bold heading-text">
            <h2>Contact Us</h2>
        </div>
<!--        <form class="contact-form">
            <div class="form-group form-inline ">
                <input type="text" class="form-control bordered bottom-bordered" placeholder="Name" id="contact-form-input-name" />
                <input type="email" class="form-control bordered bottom-bordered" placeholder="Mail-Address" id="contact-form-input-email" />
            </div>
            <div class="form-group">
                <textarea class="form-control bordered whole-bordered" rows="4" placeholder="Write a Message"></textarea>
            </div>
            <a href="#" class="btn btn-myos-black">Send</a>
        </form>-->
        <?php        

        $content = get_the_content();
        $content = apply_filters( 'the_content', $content );
        $content = str_replace('<br />','',$content);
        echo $content;
        ?> 

    </div>
    <?php 
        $args = array(
            'post_type' => 'myos-contact-page'
			);
			
			$loop = new WP_Query( $args );
			
            if( $loop->have_posts() ){
                while( $loop->have_posts() ): $loop->the_post(); global $post; 
                    $child_pages = types_child_posts("myos-contact-address");
					foreach ($child_pages as $index => $myos_address) {
                    
                    
                        $adressTitle = $myos_address->fields['myos-address-title'];
                        $adressAddress = $myos_address->fields['myos-address-address'];
                        $adressMail = $myos_address->fields['contact-mail'];
    ?>
    <div class="address semi-bold">
    
        <p><?php echo $adressTitle ?></p>
        <p><?php echo $adressAddress  ?></p>
        <p><a href="mailto:<?php echo $adressMail  ?>"><?php echo $adressMail  ?></a></p>
    </div>

    <?php 
                
                    }
                endwhile;
            }
    ?>

    
            