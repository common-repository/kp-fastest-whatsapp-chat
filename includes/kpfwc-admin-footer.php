<?php

// Change WordPress Admin Branding on KPFC Plugin Page
function kpfwc_change_admin_footer ( $hooks )
{
	if( 'settings_page_kpfc' == KPFWC_SLUG )
		echo 'Get WordPress Help: <a href="https://www.kreativopro.com/" target="_blank"><b>Kreativo Pro</b></a></p>';
	else
		echo $hooks;
}
add_filter('admin_footer_text', 'kpfwc_change_admin_footer');