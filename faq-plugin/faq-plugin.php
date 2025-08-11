<?php
/**
 * Plugin Name: FAQ Plugin
 * Description: A simple FAQ plugin with custom post type, Gutenberg block, settings, and toggle styles.
 * Version: 1.0
 * Author: Your Name
 */

defined('ABSPATH') || exit;

define('FAQ_PLUGIN_PATH', plugin_dir_path(__FILE__));

require_once FAQ_PLUGIN_PATH . 'includes/cpt-faq.php';
require_once FAQ_PLUGIN_PATH . 'includes/faq-settings.php';
require_once FAQ_PLUGIN_PATH . 'includes/faq-shortcode.php';

add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('faq-style', plugin_dir_url(__FILE__) . 'assets/css/style.css');
    wp_enqueue_script('faq-js', plugin_dir_url(__FILE__) . 'assets/js/faq.js', ['jquery'], null, true);
    wp_localize_script('faq-js', 'faq_toggle_style_vars', [
        'style' => get_option('faq_toggle_style', 'slide')
    ]);
});

function faq_register_block()
{
    wp_register_script(
        'faq-block',
        plugin_dir_url(__FILE__) . 'blocks/faq-block.js',
        ['wp-blocks', 'wp-element', 'wp-editor'],
        true
    );

    register_block_type('faq-plugin/faq-block', [
        'editor_script' => 'faq-block',
        'render_callback' => 'faq_shortcode',
    ]);
}
add_action('init', 'faq_register_block');
