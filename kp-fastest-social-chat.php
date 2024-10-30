<?php
/*
Plugin Name: KP Fastest Social Chat
Description: The fastest way to implement Whastapp chat in your WordPress website.
Version: 1.0.2
Contributors: kreativopro
Author: Kreativo Pro
Author URI: https://www.kreativopro.com/
License: GPLv2 or later
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: kp-fastest-social-chat
Domain Path:  /languages
*/


// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}



// Define KPFC_URL as a PHP Constant
define( 'KPFWC_URL', plugin_dir_url( __FILE__ ) );

// Define KPFC_BASENAME as a PHP Constant
define ( 'KPFWC_BASENAME', plugin_basename( __FILE__ ) );



// Initiate Admin Settings
include( plugin_dir_path( __FILE__ ) . 'includes/kpfwc-admin-settings.php');

// Frontend and Backend CSS
include( plugin_dir_path( __FILE__ ) . 'includes/kpfwc-styles.php');

// Design of Plugin Settings Page
include( plugin_dir_path( __FILE__ ) . 'includes/kpfwc-admin-page.php');

// Setting Sections and Fields
include( plugin_dir_path( __FILE__ ) . 'includes/kpfwc-sections-fields.php');

// Frontend Footer Action Hook Code
include( plugin_dir_path( __FILE__ ) . 'includes/kpfwc-frontend.php');

// Backend Footer Filter Hook Code
include( plugin_dir_path( __FILE__ ) . 'includes/kpfwc-admin-footer.php');

?>