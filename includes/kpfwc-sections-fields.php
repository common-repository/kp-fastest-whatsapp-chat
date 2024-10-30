<?php


// Add Settings Sections and Fields in kpfwc Settings Page
function kpfwc_settings()
{
	
	// If Plugin Settings Don't Exist, Then Create Them
	kpfwc_first_install();
  
	
	// Find kpfwc Setting Section Hook and Add a Section There
	add_settings_section( 'kpfwc_settings_section', __( '', 'kpfwc' ), 'kpfwc_settings_description_callback', 'kpfwc' );
	
	
	// Add Chat Enable Field in kpfwc Setting Page
	add_settings_field( 'kpfwc_settings_enable', __( 'Enable', 'kpfwc'), 'kpfwc_settings_enable_callback', 'kpfwc', 'kpfwc_settings_section' );
	
	
	//Add Radio Selector Settings Field in kpfwc Setting Page
	add_settings_field( 'kpfwc_settings_image', __( 'Whatsapp Logo Style', 'kpfwc'), 'kpfwc_settings_image_callback', 'kpfwc', 'kpfwc_settings_section',
	[
	'option_one' => KPFWC_URL.'assets/images/whatsapp-a.png',
	'option_two' => KPFWC_URL.'assets/images/whatsapp-b.svg',
	'option_three' => KPFWC_URL.'assets/images/whatsapp-c.svg',
	'option_four' => KPFWC_URL.'assets/images/whatsapp-d.svg',
	'option_five' => KPFWC_URL.'assets/images/whatsapp-e.png'
	] );

	
	// Add Chat Link Field in kpfwc Setting Page
	add_settings_field( 'kpfwc_settings_number', __( 'Your Phone Number', 'kpfwc'), 'kpfwc_settings_number_callback', 'kpfwc', 'kpfwc_settings_section' );
	
	
	// Add Chat Link Field in kpfwc Setting Page
	add_settings_field( 'kpfwc_settings_message', __( 'Whatsapp Message', 'kpfwc'), 'kpfwc_settings_message_callback', 'kpfwc', 'kpfwc_settings_section' );
	
	
	//Add Radio Selector Settings Field in kpfwc Setting Page
	add_settings_field( 'kpfwc_settings_position', __( 'Button Position', 'kpfwc'), 'kpfwc_settings_position_callback', 'kpfwc', 'kpfwc_settings_section',
	[
	'option_one' => KPFWC_URL.'assets/images/bottom-right.jpg',
	'option_two' => KPFWC_URL.'assets/images/bottom-left.jpg',
	'option_three' => KPFWC_URL.'assets/images/top-right.jpg',
	'option_four' => KPFWC_URL.'assets/images/top-left.jpg'
	] );
	
	
	// Register Our Settings and Save Them
	register_setting( 'kpfwc_settings', 'kpfwc_settings' );
	
}
add_action( 'admin_init', 'kpfwc_settings' );



// Setting Section Description Function
function kpfwc_settings_description_callback()
{
	echo '<div class="kpfwc-desc"><b>Kreativo Pro Fastest Social Chat</b> is the fastest Whatsapp chat plugin for WordPress. This Whatsapp chat plugin will not slow down your site speed. It also loads very fast in Mobile and Tablets. Plugin Created by <a href="https://www.kreativopro.com/" target="_blank">Kreativo Pro</a>.</p></div>';
}



// Build Layout For Chat Enable Field
function kpfwc_settings_enable_callback()
{
	$options = get_option( 'kpfwc_settings' );
	$custom_text = '';
	
	if( isset( $options[ 'enable' ] ) ) {
		$custom_text = $options['enable'];
	}
	
	if ($custom_text == 1)
	{
		echo '<input type="checkbox" id="kpfwc_custom_enable" name="kpfwc_settings[enable]" checked value="1" />';
	}
	else
	{
		echo '<input type="checkbox" id="kpfwc_custom_enable" name="kpfwc_settings[enable]" value="1" />';
	}
	
}



// Build Radio Layout For Chat Image Field
function kpfwc_settings_image_callback( $args ) {

  $options = get_option( 'kpfwc_settings' );

  $radio = '';
	if( isset( $options[ 'image' ] ) ) {
		$radio = esc_html( $options['image'] );
	}

	$html = '<input type="radio" id="kpfwc_settings_image_one" name="kpfwc_settings[image]" value="'. $args['option_one'] .'"' . checked( $args['option_one'], $radio, false ) . '/>';
	$html .= ' <label for="kpfwc_settings_image_one"> <img src="'. $args['option_one'] .'" class="image-radio"></label> &nbsp;';
	
	$html .= '<input type="radio" id="kpfwc_settings_image_two" name="kpfwc_settings[image]" value="'. $args['option_two'] .'"' . checked( $args['option_two'], $radio, false ) . '/>';
	$html .= ' <label for="kpfwc_settings_image_two"> <img src="'. $args['option_two'] .'" class="image-radio"></label>';

	$html .= '<input type="radio" id="kpfwc_settings_image_three" name="kpfwc_settings[image]" value="'. $args['option_three'] .'"' . checked( $args['option_three'], $radio, false ) . '/>';
	$html .= ' <label for="kpfwc_settings_image_three"> <img src="'. $args['option_three'] .'" class="image-radio"></label>';

	$html .= '<input type="radio" id="kpfwc_settings_image_four" name="kpfwc_settings[image]" value="'. $args['option_four'] .'"' . checked( $args['option_four'], $radio, false ) . '/>';
	$html .= ' <label for="kpfwc_settings_image_four"> <img src="'. $args['option_four'] .'" class="image-radio"></label>';

	$html .= '<input type="radio" id="kpfwc_settings_image_five" name="kpfwc_settings[image]" value="'. $args['option_five'] .'"' . checked( $args['option_five'], $radio, false ) . '/>';
	$html .= ' <label for="kpfwc_settings_image_five"> <img src="'. $args['option_five'] .'" class="image-radio"></label>';

	
	echo $html;

}



// Build Layout For Chat Number Field
function kpfwc_settings_number_callback()
{
	$options = get_option( 'kpfwc_settings' );
	$custom_text = '';
	
	if( isset( $options[ 'number' ] ) ) {
		$custom_text = esc_html( $options['number'] );
	}

	echo '<input type="text" id="kpfwc_custom_number" name="kpfwc_settings[number]" value="' . $custom_text . '" style="width:842px;" /><br><small><i>Please combine <b>Country Code</b> with your <b>Phone Number</b>. Example: +91 is country code of <b>India</b> and 7785426355 is <b>Phone Number</b>. Then please use <b>917785426355</b>.</i></small>';
}



// Build Layout For Chat Message Field
function kpfwc_settings_message_callback()
{
	$options = get_option( 'kpfwc_settings' );
	$custom_text = '';
	
	if( isset( $options[ 'message' ] ) ) {
		$custom_text = esc_html( $options['message'] );
	}

	echo '<input type="text" id="kpfwc_custom_message" name="kpfwc_settings[message]" value="' . $custom_text . '" style="width:842px;" /><br><small><i>Please keep message <b>Short</b> and <b>Sweet</b>. Message longer than <b>50 Words</b> might be stripped by Whatsapp.</i></small>';
}



// Build Radio Layout For Chat Image Field
function kpfwc_settings_position_callback( $args ) {

  $options = get_option( 'kpfwc_settings' );

  $radio = '';
	if( isset( $options[ 'position' ] ) ) {
		$radio = esc_html( $options['position'] );
	}

	$html = '<input type="radio" id="kpfwc_settings_position_one" name="kpfwc_settings[position]" value="'. $args['option_one'] .'"' . checked( $args['option_one'], $radio, false ) . '/>';
	$html .= ' <label for="kpfwc_settings_position_one"> <img src="'. $args['option_one'] .'" class="position-radio"></label> &nbsp;';
	
	$html .= '<input type="radio" id="kpfwc_settings_position_two" name="kpfwc_settings[position]" value="'. $args['option_two'] .'"' . checked( $args['option_two'], $radio, false ) . '/>';
	$html .= ' <label for="kpfwc_settings_position_two"> <img src="'. $args['option_two'] .'" class="position-radio"></label>';

	$html .= '<input type="radio" id="kpfwc_settings_position_three" name="kpfwc_settings[position]" value="'. $args['option_three'] .'"' . checked( $args['option_three'], $radio, false ) . '/>';
	$html .= ' <label for="kpfwc_settings_position_three"> <img src="'. $args['option_three'] .'" class="position-radio"></label>';

	$html .= '<input type="radio" id="kpfwc_settings_position_four" name="kpfwc_settings[position]" value="'. $args['option_four'] .'"' . checked( $args['option_four'], $radio, false ) . '/>';
	$html .= ' <label for="kpfwc_settings_position_four"> <img src="'. $args['option_four'] .'" class="position-radio"></label>';

	
	echo $html;

}