<?php 
/**
 * Display help for the simple local seo plug in
 *
 * @since    1.0.0
 */
function nap_plugin_help(){
	$screen = get_current_screen();
	$screen->add_help_tab( array(
		'id'      => 'nap-schema-usage-help', // This should be unique for the screen.
		'title'   => 'How To Use',
		'content' => '<br>Enter your address and phone number and save.
			<br>The contact we will automatically generate well formatted schema.
			<br> To insert the NAP contact schema in a page or header or footer 
			or any where on the site, just use the shortcode "nap_schema".'
		) 
	);

 $screen->add_help_tab( array(
	'id'      => 'new_plugin-usage-help', // This should be unique for the screen.
	'title'   => 'Shortcode for NAP schema',
	'content' => '<br>The shortcode is <b>"nap_schema"</b>.'
		) 
	);
}
