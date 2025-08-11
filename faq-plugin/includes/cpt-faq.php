<?php
function faq_register_post_type()
{
    register_post_type('faq', [
        'label' => 'FAQs',
        'public' => true,
        'menu_icon' => 'dashicons-editor-help',
        'supports' => ['title', 'editor'],
        'has_archive' => true,
    ]);
}
add_action('init', 'faq_register_post_type');
