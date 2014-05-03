<?php
function display_nap_schema($g_map, $content = null) {
	//Display NAP schema
	$nap_values= (array)( get_option('nap_values') ); 
	if ($nap_values){
?>
	<!--Microdata based on schema.org-->
		<div itemprop="description" itemtype="http://schema.org/LocalBusiness">
			<h1><span itemprop="name"><?php echo get_bloginfo('name');?></span></h1>
			<span itemprop="description"><?php echo get_bloginfo('description');?></span>
			 <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
				<span itemprop="streetAddress"><?php echo $nap_values['streetAddress'];?></span>
				<span itemprop="addressLocality"><?php echo $nap_values['addressLocality'];?></span>,
				<span itemprop="addressRegion"><?php echo $nap_values['addressRegion'];?></span> 
				<span itemprop="postalCode"><?php echo $nap_values['postalCode'];?></span>
			</div>
			Phone: <span itemprop="telephone"><?php echo $nap_values['telephone'];?></span>
		</div> 
<?php
	}
	// Display Google Map if the 'with_google_map' attribute is set to true 
	$args = shortcode_atts( array(
        'with_google_map' => 'false',
		'width' => '425',
		'height' => '350',
		'zoom' => '15',
    ), $g_map, 'nap_schema' );
	$args['with_google_map'] = filter_var( $args['with_google_map'], FILTER_VALIDATE_BOOLEAN );
	
	if($args['with_google_map']){
		$address=	$nap_values['streetAddress'].$nap_values['addressLocality'].$nap_values['addressRegion'].$nap_values['postalCode'] ;
		$address=urlencode($address);
		$frame='<iframe width="%1$s" height="%2$s" frameborder="0" scrolling="no" width="100%" marginheight="0" marginwidth="0" 			src="https://maps.google.com/maps?&amp;q=%3$s&amp;z=%4$s&amp;output=embed"></iframe>';
		$fWidth =  $args['width']; 
		$fHeight =  $args['height'];
		$zoom = $args['zoom'];
		printf($frame, $fWidth ,$fHeight, $address, $zoom);
	}
}


	