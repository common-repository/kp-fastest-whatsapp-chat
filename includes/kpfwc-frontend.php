<?php

//Print This Code Just Before </body> in footer.php File of Any Theme.
function kp_fastest_whatsapp_chat()
{
	$options = get_option( 'kpfwc_settings' );
	
	if (isset($options['enable']))
	{
	
		$kp_poss = "";
		$kp_poss_img = $options['position'];

		//Determine Button Position
		if ($kp_poss_img == KPFWC_URL.'assets/images/bottom-right.jpg')
		{
			$kp_poss = "kpfwc-br";
		}
		if ($kp_poss_img == KPFWC_URL.'assets/images/bottom-left.jpg')
		{
			$kp_poss = "kpfwc-bl";
		}
		if ($kp_poss_img == KPFWC_URL.'assets/images/top-right.jpg')
		{
			$kp_poss = "kpfwc-tr";
		}
		if ($kp_poss_img == KPFWC_URL.'assets/images/top-left.jpg')
		{
			$kp_poss = "kpfwc-tl";
		}
	
?>

	<a href="https://web.whatsapp.com/send?phone=<?php echo $options['number']; ?>&text=<?php echo $options['message']; ?>" target="_blank"><img src="<?php  echo $options['image']; ?>" class="<?php echo $kp_poss; ?>"></a>

<?php
	}
}
add_action('wp_footer', 'kp_fastest_whatsapp_chat');