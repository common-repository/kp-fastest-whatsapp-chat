<?php


// Add Links to plugins.php Page and Rearrange Settings Links
function kpfwc_setting_links( $actions, $plugin_file ) 
{
	static $plugin;

	if (!isset($plugin))
		$plugin = KPFWC_BASENAME;
	
	if ($plugin == $plugin_file)
	{
		$settings = array('settings' => '<a href="options-general.php?page=kpfwc">' . __('Settings', 'General') . '</a>');
		$site_link = array('support' => '<a href="https://www.kreativopro.com/" target="_blank">Get WordPress Support</a>');
		
    	$actions = array_merge($settings, $actions);
		$actions = array_merge($site_link, $actions);
	}
		
	return $actions;
}
add_filter( 'plugin_action_links', 'kpfwc_setting_links', 10, 2 );



// Register kpfwc Chat Page Settings in WordPress General Settings Page
function kpfwc_register_options_page()
{
  add_options_page('KP Fastest Social Chat', 'KP Fastest Social Chat', 'manage_options', 'kpfwc', 'kpfwc_options_page');
}
add_action('admin_menu', 'kpfwc_register_options_page');



// Add Settings If Plugin Has Been Activated For the First Time
function kpfwc_first_install()
{
	$options = [];
	$options['enable']	= 1;
	$options['number']	= '917785426355';
	$options['message']	= 'Hi, I\'m interested in your service.';
	$options['image']	= KPFWC_URL.'assets/images/whatsapp-a.png';
	$options['position']	= KPFWC_URL.'assets/images/bottom-right.jpg';
  
	if( !get_option( 'kpfwc_settings' ) )
		update_option( 'kpfwc_settings', $options );
}