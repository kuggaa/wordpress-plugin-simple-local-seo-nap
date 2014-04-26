<?php

function display_nap_schema() {
	$nap_values= (array)( get_option('nap_values') ); 
	if ($nap_values){
	?>
	 	
	<!--Microdata based on schema.org-->
		<div itemscope itemtype="http://schema.org/LocalBusiness">
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
}


	