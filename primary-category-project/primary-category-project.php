<?php
/*
Plugin Name: Primary Category Project
Description: Many publishers use categories as a means to logically organize their content.  However, manypieces of content have more than one category. Sometimes it’s useful to designate a primarycategory for posts (and custom post types). On the front-end, we need the ability to query forposts (and custom post types) based on their primary categories.
Version: 0.0.1
Author: Siddiq Mansoory
Author URI: https://in.linkedin.com/in/siddiqmansoory
Text Domain: 
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

/* === DEFINE === */
define( 'WPC_VERSION', '0.0.1' );
define( 'WPC_SLUG', 'primary-category-project' );
define( 'WPC_FILE', __FILE__ );
define( 'WPC_PATH', plugin_dir_path(__FILE__) );
define( 'WPC_URL', plugins_url('/', __FILE__ ) );

if(!function_exists('CmsMinds'))
{
	function CmsMinds()
	{
		require_once WPC_PATH . 'includes/class-primarycategory.php';
		CmsMinds::instance();
	}
}

/*
 * Plugin loaded
 */
if(!function_exists('primarycategory_install'))
{
	function primarycategory_install(){
		CmsMinds();
	}
}
add_action('plugins_loaded', 'primarycategory_install');