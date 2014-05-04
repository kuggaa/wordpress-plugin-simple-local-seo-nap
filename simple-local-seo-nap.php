
<?php
/**
 * The WordPress Plugin Simple Local SEO.
 *
 * Plug in for creating SEO NAP for small local businesses.
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
 * Description:      A very simple and effective plugin to enter small business contact details the SEO way. 
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

require_once( plugin_dir_path( __FILE__ ) . 'public/class-simple-local-seo-nap.php' );
require_once( plugin_dir_path( __FILE__ ) . 'includes/nap_schema_for_shortcode.php');	



/*
 * Register Activation/Deactivation Hooks
 *
 * Register hooks that are fired when the plugin is activated or deactivated.
 * When the plugin is deleted, the uninstall.php file is loaded.
 *
 */
register_activation_hook( __FILE__, array( 'Simple_Local_Seo', 'activate' ) );

register_deactivation_hook( __FILE__, array( 'Simple_Local_Seo', 'deactivate' ) );

add_action( 'plugins_loaded', array( 'Simple_Local_Seo', 'get_instance' ) );

add_shortcode( 'nap_schema', 'display_nap_schema' ); 


/*----------------------------------------------------------------------------*
 * Dashboard and Administrative Functionality
 *----------------------------------------------------------------------------*/

if ( is_admin() && ( ! defined( 'DOING_AJAX' ) || ! DOING_AJAX ) ) {

	require_once( plugin_dir_path( __FILE__ ) . 'admin/class-simple-local-seo-nap-admin.php' );
	
	add_action( 'plugins_loaded', array( 'Simple_Local_Seo_Admin', 'get_instance' ) );
	
}
