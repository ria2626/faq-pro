<?php
/**
 * Plugin Name: FAQ Pro
 * Description: A simple FAQ plugin with shortcode and Gutenberg block.
 * Version: 1.0
 * Author: Ria Sharma
 * Text Domain: faq-pro
 */

if (!defined('ABSPATH')) {
  exit;
}

require_once plugin_dir_path(__FILE__) . 'includes/class-faq-pro.php';

// Initialize plugin
function faq_pro_run() {
  $plugin = new FAQ_Pro();
  $plugin->run();
}
faq_pro_run();
