<?php
/**
 * The WordPress Plugin Simple Local SEO.
 *
 * Plug in for creating SEO websites for small local businesses.
 *
 * @package   simple-local-seo
 * @author    Vaishali Patil <vaishali.Badgujar@gmail.com>
 * @license   GPL-2.0+
 * @link      http://example.com
 * @copyright 2014 Vaishali Patil
 *
 * @wordpress-plugin
 * Plugin Name:       Simple Local SEO
 * Plugin URI:        
 * Description:       Plug in for creating SEO websites for small local businesses.
 * Version:           1.0.0
 * Author:            Vaishali Patil
 * Author URI:        https://github.com/vaishalijp
 * Text Domain:       
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
 * GitHub Plugin URI: https://github.com/vaishalijp/wordpress-pluin-simple-local-seo
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/*----------------------------------------------------------------------------*
 * Public-Facing Functionality
 *----------------------------------------------------------------------------*/



?>
<!DOCTYPE html>
<html>
  <head>
    <title>Place details</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      html, body, #map-canvas {
        height: 100%;
        margin: 0px;
        padding: 0px
      }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
    <script>
function initialize() {
  var map = new google.maps.Map(document.getElementById('map-canvas'), {
    center: new google.maps.LatLng(-33.8665433, 151.1956316),
    zoom: 15
  });

  var request = {
    reference: 'CnRkAAAAGnBVNFDeQoOQHzgdOpOqJNV7K9-c5IQrWFUYD9TNhUmz5-aHhfqyKH0zmAcUlkqVCrpaKcV8ZjGQKzB6GXxtzUYcP-muHafGsmW-1CwjTPBCmK43AZpAwW0FRtQDQADj3H2bzwwHVIXlQAiccm7r4xIQmjt_Oqm2FejWpBxLWs3L_RoUbharABi5FMnKnzmRL2TGju6UA4k'
  };

  var infowindow = new google.maps.InfoWindow();
  var service = new google.maps.places.PlacesService(map);

  service.getDetails(request, function(place, status) {
    if (status == google.maps.places.PlacesServiceStatus.OK) {
      var marker = new google.maps.Marker({
        map: map,
        position: place.geometry.location
      });
      google.maps.event.addListener(marker, 'click', function() {
        infowindow.setContent(place.name);
        infowindow.open(map, this);
      });
    }
  });
}

google.maps.event.addDomListener(window, 'load', initialize);

    </script>
  </head>
  <body>
    <div id="map-canvas"></div>
  </body>
</html>