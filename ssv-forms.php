<?php
/**
 * Plugin Name: SSV Forms
 * Plugin URI: http://moridrin.com/ssv-forms
 * Description: This is a plugin to create forms with ease.
 * Version: 0.1.9
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

require_once 'general/base/base.php';
require_once 'general/forms/forms.php';
