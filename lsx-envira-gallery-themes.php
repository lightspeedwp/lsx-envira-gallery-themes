<?php
/*
 * Plugin Name:	LSX Envira Gallery Themes
 * Plugin URI:	https://github.com/lightspeeddevelopment/lsx-envira-gallery-themes
 * Description:	A meal and workout plan, with recipes
 * Author:		LightSpeed
 * Version: 	1.0.0
 * Author URI: 	https://www.lsdev.biz/
 * License: 	GPL3
 * Text Domain: lsx-envira-gallery-themes
 * Domain Path: /languages/
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
define( 'LSX_EGT_PATH', plugin_dir_path( __FILE__ ) );
define( 'LSX_EGT_CORE', __FILE__ );
define( 'LSX_EGT_URL', plugin_dir_url( __FILE__ ) );
define( 'LSX_EGT_VER', '1.0.0' );

/* ======================= Below is the Plugin Class init ========================= */
require_once LSX_EGT_PATH . '/classes/class-core.php';

/**
 * Returns the LSX Envira Gallery Themes object.
 *
 * @return \lsx\envira_gallery\themes\classes\Core()
 */
function lsx_health_plan() {
	return \lsx\envira_gallery\themes\classes\Core::get_instance();
}
lsx_health_plan();
