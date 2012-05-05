<?php
/*
Plugin Name: flickree
Plugin URI: http://bcooling.com.au
Description: Dynamically pull in photos from flickr based on the photoset, group or gallery, a search or a single photo id.
Version: 0.1
Author: Ben Cooling
Author URI: http://bcooling.com.au
License: Copyright Ben Cooling
*/

/**
 * This file bootstraps the flickree plugin
 * Flickree provides 3 methods of retrieving photos from flickr "search", "photo", "photoset"
 * [flickree type="search" ]
 * 
 * @package FLICKREE_plugin
 * @license Copyright Ben Cooling 2012
 * @author Ben Cooling <office@bcooling.com.au>
 * 
 */

session_start();

// Plugin Constants
define('FLICKREE_VERSION', '0.1');
define('FLICKREE_PLUGIN_NAME', 'flickree');
define('FLICKREE_PREFIX', 'Flc');
define('FLICKREE_FILE', __FILE__);
define('FLICKREE_DIR_PATH', plugin_dir_path(__FILE__));
define('FLICKREE_TEMPLATES_DIR', plugin_dir_path(__FILE__) . 'Templates/');
define('FLICKREE_HELPERS_DIR', plugin_dir_path(__FILE__) . 'Helpers/');
define('FLICKREE_LIBRARIES_DIR', plugin_dir_path(__FILE__) . 'Libaries/');

// dependencies
require('inc/User.php');
require('inc/Menu.php');
require('inc/Mustache.php');

require_once('classes/FlickreeApi.class.php');
require_once('classes/FlickreePhoto.class.php');

// Determine context for plugin
if ( is_admin() ) {
  if ( defined('DOING_AJAX') && DOING_AJAX ){
    $file = 'Ajax';
  }
  else {
    $file = 'Admin';
  }
}
else {
  $file = 'Public';
}

// Instantiate required plugin controller
$className = FLICKREE_PREFIX . $file;
if (! class_exists($className) ){
  require( FLICKREE_DIR_PATH . $file . '.php');
}

$myPlugin = new $className();