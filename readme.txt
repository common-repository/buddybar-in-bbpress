=== Plugin Name ===
Contributors: johnjamesjacoby, r-a-y
Tags: wpmu, buddypress, bbpress, buddybar, integration, deep, bundle
Requires at least: 2.7.1
Tested up to: 2.8.1 trunk
Stable tag: 1.0.3
 
BuddyBar for bbPress adds the BuddyPress "BuddyBar" to a bbPress1.0.1 installation (Requires deep integration)

== Description ==

BuddyBar for bbPress adds the BuddyPress "BuddyBar" to a bbPress1.0.1 installation (Requires deep integration)

== Installation ==

BuddyBar for bbPress requires WordPressMU, BuddyPress, and bbPress.

It also requires "deep integration" which can be achieved by adding the code below to the top of your bb-config.php file.

`if ( !defined( 'ABSPATH' ) & !defined( 'XMLRPC_REQUEST' )) {
	define( 'WP_USE_THEMES', false );
	//
	//  You will need to get the ABSOLUTE path to this file |
	//                                                     \|/
	include_once( '/your/absolute/path/to/wordpress/wp-blog-header.php' );
	header( "HTTP/1.1 200 OK" );
	header( "Status: 200 All rosy" );
}`

Use the included abs.php tool to assist you in getting the absolute path. Using http://domain.com/wp-blog-header.php will not work here.

--- Plugins: ---

1. Upload bp-buddybar.php into the "/my-plugins/" directory of your bbPress installation.
2. Activate BuddyBar for bbPress in the "Plugins" admin panel using the "Activate" link.

--- Themes: ---

This plugin will use the existing BuddyPress CSS, so no additional theme files are necessary.

--- Upgrading from an earlier version: ---

1. Overwrite the /my-plugins/bp-buddybar.php file with the latest version.
2. This plugin does not require any changes to your database.

== Notes ==

Included is a file to assist you in getting the absolute path to your webroot. Place the included 'abs.php' file in the root of your WordPressMU installation, and navigate to it manually in any web browser. 

Remember to delete it when you're done!

== Frequently Asked Questions ==

= Will this work on standard WordPress? =

No, this will only work on WordPressMU for the time being.

= Do I need to use deep integration for this to work? =

Yes.

= Where can I get support? =

http://buddypress.org/forums/topic/buddybar-for-bbpress

= Where can I find documentation? =

http://buddypress.org/forums/topic/buddybar-for-bbpress

= Where can I report a bug? =

http://buddypress.org/forums/topic/buddybar-for-bbpress

== Changelog ==

1.0 - Initial Release

1.0.1 - Bump to match new bbPress version

1.0.2 - Add JavaScript for menu mouse-overs; Check for deep integration; Add absolute path tool.

1.0.3 - Add check to make sure BuddyBar isn't hidden by BuddyPress or WordPressMU