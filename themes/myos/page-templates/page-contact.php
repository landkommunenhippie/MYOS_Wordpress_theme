<?php 
/*
Template Name: contact
*/
?>

<div class="spacey" id="contact">
    <div class="contact-box">
        <div class="contact-badge"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/Badge_BOOKNOW.png" /></div>
        <div class="semi-bold heading-text">
            <h2>Contact Us</h2>
        </div>
        <form class="contact-form">
            <div class="form-group form-inline ">
                <input type="text" class="form-control bordered bottom-bordered" placeholder="Name" id="contact-form-input-name" />
                <input type="email" class="form-control bordered bottom-bordered" placeholder="Mail-Address" id="contact-form-input-email" />
            </div>
            <div class="form-group">
                <textarea class="form-control bordered whole-bordered" rows="4" placeholder="Write a Message"></textarea>
            </div>
            <a href="#" class="btn btn-myos-black">Send</a>
        </form>
    </div>

<?php 
the_content(); 
?>
  
            