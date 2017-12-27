<?php
/**
 * Plugin Name: SSV Forms
 * Plugin URI: http://moridrin.com/ssv-forms
 * Description: This is a plugin to create forms with ease.
 * Version: 0.1.1
 * Author: Jeroen Berkvens
 * Author URI: http://nl.linkedin.com/in/jberkvens/
 * License: WTFPL
 * License URI: http://www.wtfpl.net/txt/copying/
 */

if (!defined('ABSPATH')) {
    exit;
}
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/** @var wpdb $wpdb */
define('SSV_FORMS_PATH', plugin_dir_path(__FILE__));
define('SSV_FORMS_URL', plugins_url() . '/ssv-forms/');
require_once 'general/base/SSV_Base.php';

if (!in_array(realpath(SSV_FORMS_PATH . 'general/forms/SSV_Forms.php'), get_included_files())) {
    require_once 'general/forms/SSV_Forms.php';
}
