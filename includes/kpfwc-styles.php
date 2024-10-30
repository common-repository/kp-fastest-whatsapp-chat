<?php

// Load This CSS on the WordPress Frontend
function kpfwc_frontend_style()
{
	wp_register_style( 'kpfwc-frontend', KPFWC_URL . 'assets/css/kpfwc-frontend.css' );
	
	$options = get_option( 'kpfwc_settings' );
	
	if (isset($options['enable']))
	{
		wp_enqueue_style( 'kpfwc-frontend' );
	}
}
add_action( 'wp_enqueue_scripts', 'kpfwc_frontend_style' );



// Load This CSS on Our Plugin Setting Page
function kpfwc_admin_style( $hook )
{	
	// Define KPFWC_SLUG as a PHP Constant
	define ( 'KPFWC_SLUG', $hook );
	
	wp_register_style( 'kpfwc-admin', KPFWC_URL . 'assets/css/kpfwc-backend.css' );
	
	if( 'settings_page_kpfwc' == KPFWC_SLUG )
		wp_enqueue_style( 'kpfwc-admin' );
}
add_action( 'admin_enqueue_scripts', 'kpfwc_admin_style' );