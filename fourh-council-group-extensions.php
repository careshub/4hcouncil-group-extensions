<?php
/**
 *
 * @package   FourH_Council_Group_Extensions
 * @author    dcavins
 * @license   GPL-2.0+
 * @link      https://engagementnetwork.org
 * @copyright 2018 CARES Network
 *
 * @wordpress-plugin
 * Plugin Name:       4H Council Group Extensions
 * Plugin URI:        @TODO
 * Description:       Adds functionality and management to the 4H sites' groups.
 * Version:           1.0.0
 * Author:            barbarom
 * Text Domain:       fourh-group-extension
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/*----------------------------------------------------------------------------*
 * Public-Facing Functionality
 *----------------------------------------------------------------------------*/

function fourh_group_ext_init() {

	$base_path = plugin_dir_path( __FILE__ );

	// BP Group Extensions
	require_once( $base_path . 'group-extensions/class-fourh-action-plan.php' );

}
add_action( 'bp_init', 'fourh_group_ext_init' );

/*
 * Helper function.
 * @return Fully-qualified URI to the root of the plugin.
 */
function fourh_group_ext_get_plugin_base_uri(){
	return plugin_dir_url( __FILE__ );
}

/*
 * Helper function.
 * @TODO: Update this when you update the plugin's version above.
 *
 * @return string Current version of plugin.
 */
function fourh_group_ext_get_plugin_version(){
	return '1.0.0';
}

