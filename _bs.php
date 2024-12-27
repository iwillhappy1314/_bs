<?php
/**
 * Plugin Name: My WordPress Plugin
 * Description: A WordPress plugin using Vite for asset compilation
 * Version: 1.0.0
 * Author: Your Name
 */

use WenpriseSpaceNameAssets\Assets;

if ( ! defined('ABSPATH')) {
    exit;
}

define('MWP_PLUGIN_PATH', plugin_dir_path(__FILE__));
define('MWP_PLUGIN_URL', plugin_dir_url(__FILE__));
define('MWP_DEV_MODE', true);

require_once MWP_PLUGIN_PATH . 'vendor/autoload.php';

add_action('plugins_loaded', function ()
{
    new Assets();
});