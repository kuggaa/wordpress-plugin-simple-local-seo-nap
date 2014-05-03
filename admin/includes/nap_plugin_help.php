<?php 
/**
 * Display help for the simple local seo NAP plug in
 *
 * @since    1.0.0
 */
function nap_plugin_help(){
	$screen = get_current_screen();
	$screen->add_help_tab( array(
		'id'      => 'nap-schema-usage-help', // This should be unique for the screen.
		'title'   => 'How To Use',
		'content' => '<br>This is a very simple and effective plugin you can use to enter small business contact details the SEO way.
			<br/>Step1: Enter your address and phone number below and save.
			<br/>Step2:  Use the shortcode <b>nap_schema</b> to insert the SEO NAP schema in a page or post or header or footer 
			or any where on the site.
			<br/>Step3: Add attribute <b>with_google_map=true</b> To display the google map of the entered NAP.
			<br/>Step4: If you wish, use other attributes for changing the settings of google map as below:
			<br/> <b>width</b>, <b>height</b> and <b>zoom</b>. Default values 425, 350 and 15 respectively. 
			<br/>Example: [nap_schema with_google_map=true width=300 height=300 zoom=16]'
		) 
	);
}
