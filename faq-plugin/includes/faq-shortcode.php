<?php
function faq_shortcode()
{
    ob_start();
    $args = ['post_type' => 'faq', 'posts_per_page' => -1];
    $faqs = new WP_Query($args);

    if ($faqs->have_posts()) {
        echo '<div class="faq-container">';
        while ($faqs->have_posts()) {
            $faqs->the_post();
            ?>
            <div class="faq-item">
                <h3 class="faq-question"><?= get_the_title(); ?></h3>
                <div class="faq-answer"><?= get_the_content(); ?></div>
            </div>
            <?php
        }
        echo '</div>';
    }
    wp_reset_postdata();
    return ob_get_clean();
}
add_shortcode('faq', 'faq_shortcode');
