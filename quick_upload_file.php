<?php
if(function_exists( 'wp_enqueue_media' )){
    wp_enqueue_media();
} else {
    wp_enqueue_style('thickbox');
    wp_enqueue_script('media-upload');
    wp_enqueue_script('thickbox');
}
?>
<div class="wrap">
    <div id="poststuff">
        <div id="post-body">
            <div class="tnc-upload-container">
                <h1>Upload any file & get the link below</h1>
                <a href="#" class="tnc_quick_upload button button-primary">Click here to upload file & get url below</a>
                <br />
                <h4 class="">Find the url of the selected file below:</h4>
                <br>
                <input id="fileurl" class="tnc_uploaded_file_url" type="text" name="tnc_quick_upload_file" value="" onclick="this.select();" /><a href="#" onClick="copyInstr()" class="button button-primary copy_btn">Copy</a><br />
                <p id="copy-instruction"></p>
                <img src="<?php echo plugins_url().'/quick-uploader/images/themencode_logo.png'; ?>" alt="ThemeNcode" class="tnc-qu-logo">
            </div>

            <div class="tnc-qu-bottom_container">
                <div class="postbox tnc-qu-ot">
                    <h3>Useful Resources</h3>
                    <div class="inside">
                        <ul>
                            <li><a href="http://shop.themencode.com">ThemeNcode Shop</a></li>
                            <li><a href="http://themencode.com/contact/">Contact/Support</a></li>
                            <li><a href="http://themencode.com/products">Other Products by ThemeNcode</a></li>
                            <li><a href="http://youtube.com/channel/UC0mkhMK6fTx1BCovV6M_E4w">YouTube Channel</a></li>
                            <li><a href="http://l.themencode.com/fr">Request A Feature</a></li>
                        </ul>
                    </div><!--/inside--> 
                </div><!--/.postbox-->

                <div class="postbox tnc-qu-ot">
                    <h3>Latest updates from ThemeNcode</h3>
                    <div class="inside">
                        <iframe src="http://themencode.com/updates/" frameborder="0" width="325" height="350"></iframe>
                    </div><!--/.inside--> 
                </div><!--/.postbox other_plugins -->

                <!-- Subscribe -->
                <div class="postbox tnc-qu-ot">
                    <h3>Stay Updated with Latest Products and News from ThemeNcode</h3>
                    <div class="inside">
                        <div class="newsletter newsletter-subscription">
                            <form method="post" action="http://themencode.com/wp-content/plugins/newsletter/do/subscribe.php" onsubmit="return newsletter_check(this)">
                                <table cellspacing="0" cellpadding="3" border="0">
                                    <!-- first name -->
                                    <tr>
                                        <th>Name</th>
                                        <td>
                                            <input class="newsletter-firstname" type="text" name="nn" size="30"required></td>
                                    </tr>
                                    <!-- email -->
                                    <tr>
                                        <th>Email</th>
                                        <td align="left">
                                            <input class="newsletter-email" type="email" name="ne" size="30" required></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="newsletter-td-submit">
                                            <input class="newsletter-submit button button-primary" type="submit" value="Subscribe"/>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </div><!--/.newsletter--> 
                    </div><!--/.inside --> 
                </div><!-- /.postbox Subscribe End -->
            </div> <!-- tnc-pdf-column-right -->
        </div><!-- postbody -->
    </div><!--poststuff-->
</div>
<!--/.wrap-->
<script type="text/javascript">
function copyInstr() {
    document.getElementById("fileurl").select();
    document.getElementById("copy-instruction").innerHTML = "Please Press ctrl+c (cmd+c on mac) on your keyboard now to copy.";
}
jQuery(document).ready(function(jQuery){
    jQuery('.tnc_quick_upload').click(function(e) {
        e.preventDefault();
        var pdf_uploader = wp.media({
            title: 'Upload File',
            button: {
                text: 'Get Link'
            },
            multiple: false  // Set this to true to allow multiple files to be selected
        })
        .on('select', function() {
            var attachment = pdf_uploader.state().get('selection').first().toJSON();
            jQuery('.tnc_uploaded_file_url').val(attachment.url);
        })
        .open();
    });
});
</script>