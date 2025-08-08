<?php

class FAQ_Pro {
  public function run() {
    add_action('init', [$this, 'register_faq_cpt']);
    add_shortcode('faq_pro', [$this, 'render_faq_shortcode']);
    add_action('wp_enqueue_scripts', [$this, 'enqueue_assets']);
  }

  public function register_faq_cpt() {
    register_post_type('faq', [
      'labels' => [
        'name' => __('FAQs', 'faq-pro'),
        'singular_name' => __('FAQ', 'faq-pro'),
      ],
      'public' => true,
      'has_archive' => true,
      'supports' => ['title', 'editor'],
      'menu_icon' => 'dashicons-editor-help',
    ]);
  }

  public function render_faq_shortcode($atts) {
    $args = [
      'post_type' => 'faq',
      'posts_per_page' => -1,
    ];
    $faqs = new WP_Query($args);
    ob_start();

    if ($faqs->have_posts()) {
      echo '<div class="faq-pro">';
      while ($faqs->have_posts()) {
        $faqs->the_post();
        echo '<div class="faq-item">';
        echo '<h3 class="faq-question">' . get_the_title() . '</h3>';
        echo '<div class="faq-answer">' . get_the_content() . '</div>';
        echo '</div>';
      }
      echo '</div>';
      wp_reset_postdata();
    }

    return ob_get_clean();
  }

  public function enqueue_assets() {
    wp_enqueue_style('faq-pro-style', plugin_dir_url(__FILE__) . '../assets/css/faq-pro.css');
    wp_enqueue_script('faq-pro-js', plugin_dir_url(__FILE__) . '../assets/js/faq-pro.js', ['jquery'], null, true);
  }
}
