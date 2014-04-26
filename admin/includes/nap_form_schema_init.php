<?php

function plugin_admin_init(){
	register_setting( 'nap_values', 'nap_values', 'nap_values_validate' );
	add_settings_section('plugin_main', 'Main Settings', 
		'plugin_section_text', 'nap_plugin');
	add_settings_field('streetAddress', 'Street Address', 'plugin_streetAddress', 
		'nap_plugin', 'plugin_main');
	add_settings_field('addressLocality', 'Locality / City', 'plugin_addressLocality', 
		'nap_plugin', 'plugin_main');
	add_settings_field('addressRegion', 'Region / State', 'plugin_addressRegion', 
		'nap_plugin', 'plugin_main');
	add_settings_field('postalCode', 'Postal Code', 'plugin_postalCode', 
		'nap_plugin', 'plugin_main');
	add_settings_field('phone', 'Phone', 'plugin_telephone', 
		'nap_plugin', 'plugin_main');
}

/**
 * 	Define the plugin section text
 *	 
 * 	@return nothing.
 *	------------------------------------------------------------------
 */
function plugin_section_text() {
	echo '<p>Enter the below NAP details to be displayed in standard schema.</p>';
}

/**
 * 	Define the street address input field
 *	 
 * 	@return nothing.
 *	------------------------------------------------------------------
 */
 
function plugin_streetAddress() {
$options = get_option('nap_values');
echo "<input id='address' name='nap_values[streetAddress]' size='40' 
	type='text' value='{$options['streetAddress']}' />";
}

/**
 * 	Define the locality address input field
 *	 
 * 	@return nothing.
 *	------------------------------------------------------------------
 */
 
function plugin_addressLocality() {
$options = get_option('nap_values');
echo "<input id='address' name='nap_values[addressLocality]' size='40' 
	type='text' value='{$options['addressLocality']}' />";
}

/**
 * 	Define the region address input field
 *	 
 * 	@return nothing.
 *	------------------------------------------------------------------
 */
 
function plugin_addressRegion() {
$options = get_option('nap_values');
echo "<input id='address' name='nap_values[addressRegion]' size='40' 
	type='text' value='{$options['addressRegion']}' />";
}

/**
 * 	Define the postal code input field
 *	 
 * 	@return nothing.
 *	------------------------------------------------------------------
 */
 
function plugin_postalCode() {
$options = get_option('nap_values');
echo "<input id='address' name='nap_values[postalCode]' size='40' 
	type='text' value='{$options['postalCode']}' />";
}


/**
 * 	Define the phone input field
 *	 
 * 	@return nothing.
 *	------------------------------------------------------------------
 */
function plugin_telephone() {
$options = get_option('nap_values');
echo "<input id='phone' name='nap_values[telephone]' size='40' type='text' 
	value='{$options['telephone']}' />";
}

/**
 * 	Validate the plugin options
 *	 
 * 	@return nothing.
 *	------------------------------------------------------------------
 */
function nap_values_validate($input) {
	
	$options = get_option('nap_values');
	//$options['streetAddress'] = trim($input['streetAddress']);
	//$options['addressLocality'] = trim($input['addressLocality']);
	//$options['addressRegion'] = trim($input['addressRegion']);
	//$options['postalCode'] = trim($input['postalCode']);
	//$options['telephone'] = trim($input['telephone']);
	if (!preg_match("#^[a-zA-Z0-9_',; /t//]*$#",trim($input['streetAddress']))) {
        add_settings_error(
                'streetAddress',                     		// Setting title
                'streetAddress_texterror',            		// Error ID
                'Please enter a valid street address',     	// Error message
                'error'                         			// Type of message
        );
		
    }else {
		$options['streetAddress'] = trim($input['streetAddress']);
	}
	if (!preg_match("#^[a-zA-Z0-9_,; /t//]*$#",trim($input['addressLocality']))) {
        add_settings_error(
                'addressLocality',                     		// Setting title
                'streetAddress_texterror',            		// Error ID
				'Please enter a valid locality / city', 	// Error message
                'error'                         			// Type of message
        );
    }
	else {
		$options['addressLocality'] = trim($input['addressLocality']);
	}
	if (!preg_match("#^[a-zA-Z0-9_,; /t//]*$#",trim($input['addressRegion']))) {
        add_settings_error(
                'addressRegion',                     		// Setting title
                'streetAddress_texterror',            		// Error ID
				'Please enter a valid region / state',   		// Error message
                'error'                         			// Type of message
        );
	}
	else {
		$options['addressRegion'] = trim($input['addressRegion']);
	}
	if (!preg_match('#^[0-9 /t//-]*$#',trim($input['postalCode']))) {
        add_settings_error(
                'postalCode',                     			// Setting title
                'streetAddress_texterror',            		// Error ID
                'Please enter a valid postal code',	     	// Error message
                'error'                         			// Type of message
        );
	}
	else {
		$options['postalCode'] = trim($input['postalCode']);
	}
    
	if ((!preg_match('#^[0-9 -]*$#',trim($input['telephone'])))
	||(strlen(preg_replace('/(?<!^)\+|[^\d+]+/','',trim($input['telephone'])))!=10)) {
        add_settings_error(											
                'telephone',                     			// Setting title
                'streetAddress_texterror',            		// Error ID
                'Please enter a valid telephone',	    	// Error message
                'error'                         			// Type of message
        );
	}
	else {
		$options['telephone'] = trim($input['telephone']);
	}
	return $options;
}