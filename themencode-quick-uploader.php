<?php
/*
 * Plugin Name: Quick Uploader
 * Plugin URI: http://themencode.com/quick-file-uploader-wp-plugin/
 * Description: Simplify the file upload process of your WordPress Site. Simple CLick, Upload & get the link to media file instantly with this plugin.
 * Version: 1.0
 * Author: ThemeNcode
 * Author URI: http://themencode.com
*/

define('TNC_QU_PLUGIN_NAME','Quick Uploader');

define('TNC_QU_PLUGIN_DIR', 'quick-uploader');

add_action( 'admin_menu', 'tnc_quick_uploader_menu' );

function tnc_quick_uploader_menu() {

	add_submenu_page('upload.php', 'Quick Uploader', 'Quick Uploader', 'upload_files', 'tnc-quick-uploader', 'tnc_quick_uploader_page');

}

function tnc_quick_uploader_page() {

    if ( !current_user_can( 'upload_files' ) )  {

        wp_die( __( 'You do not have sufficient permissions to access this page.', 'tncqu' ) );

    }

    include dirname(__FILE__)."/quick_upload_file.php";

}

function tnc_qu_admin_style() {
        wp_register_style( 'tnc_qu_admin_css', plugins_url() . '/'. TNC_QU_PLUGIN_DIR . '/css/qu-style.css', false, '1.0.0' );
        wp_enqueue_style( 'tnc_qu_admin_css' );
}
add_action( 'admin_enqueue_scripts', 'tnc_qu_admin_style' );
?>