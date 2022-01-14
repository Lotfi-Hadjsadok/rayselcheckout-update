<?php

/**
 * Plugin Name: Raysel Checkout
 * Description: Checkout on product Page
 * Author: Lotfi Hadjsadok
 * Plugin URI: https://www.facebook.com/lotfihadjsadok.dev
 * Author URI: https://www.facebook.com/lotfihadjsadok.dev
 * Version: 1.0.0
 * Text Domain: raysel-checkout
 */

use Inc\Includes\Activate;
use Inc\Includes\Deactivate;
use Inc\Init;

if (!defined('ABSPATH')) die;
include_once(ABSPATH . 'wp-admin/includes/plugin.php');
require_once plugin_dir_path(__FILE__) . 'vendor/autoload.php';


// Test if woocommerce is Active    
if (!is_plugin_active('woocommerce/woocommerce.php')) {
    add_action('admin_notices', function () {
        echo '<div class="notice notice-error"><p>Woocommerce must be Activated to use Raysel Checkout</p></div>';
    });
    return;
}

register_activation_hook(__FILE__, array(Activate::class, 'activate'));
register_deactivation_hook(__FILE__, array(Deactivate::class, 'deactivate'));

// Start the plugin
Init::start_services();
