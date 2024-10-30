<?php /*
Plugin Name: blog-fbcomment
Plugin URI: http://thegoogleguy.com
Description: Add Facebook Commenting for blog post or page : Copy this short code and paste in the page or post <strong>[fb-comment][/fb-comment]</strong> . Using this plugin any user can comment on you post after login to their facebook account.
Author: Thegoogleguy
Author URI: http://thegoogleguy.com
Text Domain: Facebook Comment, fb commenting, Blog Fbcomment, facebook, comment, post comment
Version: 1.0
*/



function fb_commenting_functionID_872293( $atts, $caption ) {

	$a = shortcode_atts( array(
	
		'class' => $caption,
		
	), 	$atts);

wp_register_style( 'facebook-comment-CSS', plugins_url( 'style.css' , __FILE__ ) ); 
wp_enqueue_style('facebook-comment-CSS');
	
$data='<div id="fb-root"></div>

		<script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script>
		
		<fb:comments href="'.the_permalink().'" class="commenting"></fb:comments>';

return '<div class="fb-comment">'.$data.'</div>';

}

add_shortcode( 'fb-comment', 'fb_commenting_functionID_872293' );

add_action( 'admin_menu', 'fb_commenting_menu' );

function fb_commenting_menu() {
    add_options_page(
        'Facebook Comment',
        'Facebook Comment',
        'manage_options',
        'Facebook Comment',
        'fb_commenting_page'
    );
}
function fb_commenting_page() {

    echo '<div class="wrap">
        <h2>Facebook Comment : Options</h2>
<b>This plugin will allow user comment on your post using facebook login.</b>
<br><br>
To use this plugin please follow the below steps.
<br>
Copy The short code <b style="color:#09c">[fb-comment][/fb-comment]</b> and paste it in your post or page.
<br><br>
Great you are done...<br>
Now if you access your newly created page it will show you facebook commenting option for post, <br>comments will be based on the post so each page will display its own comment. 
    </div>
    
 <div style="margin: 20px; padding: 50px; padding-top: 30px; background-color: #f5f5f5; width:400px; border: 1px dashed #c5c5c5;">
<p><big><b>Make a Donation to Facebook Comment</b></big><br />
Please help our development to grow more.</p>
 
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
 
    <input type="hidden" name="cmd" value="_xclick">
    <input type="hidden" name="business" value="sylpho4u@gmail.com">
    <strong>Donation / Contribution? </strong><br />
    <input type="hidden" name="item_name" value="Facebook Comment Plugin">
    <input type="hidden" name="item_number" value="1">
    <strong>How much do you want to donate?</strong><br />
    $ <input type="text" name="amount">
 
    <input type="hidden" name="no_shipping" value="0">
    <input type="hidden" name="no_note" value="1">
    <input type="hidden" name="currency_code" value="USD">
    <input type="hidden" name="bn" value="PP-BuyNowBF">
    <br /><br />
    <input type="submit" value="Pay with PayPal!" style="background:#09c; color:#fff; border:none; border-radius:5px; cursor:pointer; width:173px;">
 
</form>
</div>
    
    ';
   }







