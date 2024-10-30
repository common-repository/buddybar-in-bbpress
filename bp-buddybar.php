<?php
/*
Plugin Name: BuddyBar in bbPress
Plugin URI: http://buddypress.org/forums/topic/buddybar-for-bbpress
Description: Adds the BuddyPress "BuddyBar" to a bbPress1.0.1 installation (Requires deep integration)
Author: johnjamesjacoby, r-a-y
Version: 1.0.3
Author URI: http://www.johnjamesjacoby.com
*/
/*
 * If you skipped the readme.txt, you MUST add this to the TOP of your
 * bb-config.php to use this plugin. There's no way yet to automate this
 * via a plugin so this manual edit MUST be applied.
 */
/*
if ( !defined( 'ABSPATH' ) & !defined( 'XMLRPC_REQUEST' )) {
	define( 'WP_USE_THEMES', false );
	//
	//  You will need to get the ABSOLUTE path to this file |
	//                                                     \|/
	include_once( '/the/absolute/path/to/your/wp-blog-header.php' );
	header( "HTTP/1.1 200 OK" );
	header( "Status: 200 All rosy" );
}
*/

// Activate Interlock
/* 
 * The main function that builds the BuddyBar in bbPress
 * It basically recreates all of the filters that bbPress destroys
 */
	function bp_buddybar_for_bbpress() {
		add_action( 'bp_adminbar_logo', 'bp_adminbar_logo' );
		add_action( 'bp_adminbar_menus', 'bp_adminbar_login_menu', 2 );
		add_action( 'bp_adminbar_menus', 'bp_adminbar_account_menu', 4 );
		add_action( 'bp_adminbar_menus', 'bp_adminbar_blogs_menu', 6 );
		add_action( 'bp_adminbar_menus', 'bp_adminbar_notifications_menu', 8 );
		add_action( 'bp_adminbar_menus', 'bp_adminbar_authors_menu', 12 );
		add_action( 'bp_adminbar_menus', 'bp_adminbar_random_menu', 100 );

		add_action( 'bb_head', 'bp_core_admin_bar_css', 1 );
		add_action( 'bb_head', 'bp_core_add_js', 1 );
		add_action( 'bb_admin_head', 'bp_core_admin_bar_css', 1 );
		add_action( 'bb_admin_head', 'bp_core_add_js', 1);
		add_action( 'bb_foot', 'bp_core_admin_bar', 8 );
		add_action( 'bb_admin_footer', 'bp_core_admin_bar' );
	}

// Dynatherms Connected
/* 
 * Check for BP existance 
 */
	function bp_buddybar_load_buddypress() {
		if ( function_exists( 'bp_core_setup_globals' ) )
			return true;

		/* Get the list of active sitewide plugins */
		$active_sitewide_plugins = maybe_unserialize( get_site_option( 'active_sitewide_plugins' ) );

		if ( !isset( $active_sidewide_plugins['buddypress/bp-loader.php'] ) )
			return false;

		if ( isset( $active_sidewide_plugins['buddypress/bp-loader.php'] ) && !function_exists( 'bp_core_setup_globals' ) ) {
			require_once( WP_PLUGIN_DIR . '/buddypress/bp-loader.php' );
			return true;
		}

		return false;
	}

// Infracells up
/* 
 * Check for MU deep integration existance 
 */
	function bp_buddybar_check_for_mu () {
		if ( function_exists( 'get_site_option' ) )
			return true;
	}

// Megathrusters are go	
/* 
 * Make sure BuddyBar isn't hidden
 */
	function bp_buddybar_check_visibility() {
		if ( ( (int)get_site_option( 'hide-loggedout-adminbar' ) && !is_user_logged_in() ) || defined('BP_DISABLE_ADMIN_BAR') || defined('NOADMINBAR') ) {
			return false;
		}
		return true;
	}

/*
 * Do the dance!
 * If it's good...
 * GO VOLTRON FORCE!
 */
// Is WordPressMU active and loaded?
$check_mu = bp_buddybar_check_for_mu();
if ( $check_mu == true ) {

	// Is BuddyPress active and loaded?
	$check_bp = bp_buddybar_load_buddypress();
	if ( $check_bp == true) {
	
		// Is the BuddyBar hidden by another setting?
		$check_vis = bp_buddybar_check_visibility();
		if ( $check_vis == true ) {
			bp_buddybar_for_bbpress();
		}
	}
}

?>