<?php
/**
 * Plugin Name: _b
 * Plugin URI:  http://www.wpzhiku.com/
 * Description: A WordPress plugin using Vite for asset compilation
 * Version: 1.0.0
 * Author: WordPress智库
 */

use WenpriseSpaceName\Assets;

if ( ! defined('ABSPATH')) {
    exit;
}

const SPACENAME_PLUGIN_SLUG = '_b';
const SPACENAME_VERSION = '1.0.0';
const SPACENAME_DEBUG = true;
const SPACENAME_MAIN_FILE = __FILE__;
define('SPACENAME_PATH', plugin_dir_path(__FILE__));
define('SPACENAME_URL', plugin_dir_url(__FILE__));

define('MWP_DEV_MODE', true);

require_once SPACENAME_PATH . 'vendor/autoload.php';

add_action('plugins_loaded', function ()
{
    new Assets();
});

add_action('init', function ()
{
    load_plugin_textdomain('_b-', false, dirname(plugin_basename(__FILE__)) . '/languages/');
});
