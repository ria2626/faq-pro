<?php
$faqs = new WP_Query(['post_type' => 'faq']);
if ($faqs->have_posts()) {
    while ($faqs->have_posts()) {
        $faqs->the_post(); ?>
        <div class="faq-item">
            <h3><?= get_the_title(); ?></h3>
            <div><?= get_the_content(); ?></div>
        </div>
    <?php }
}
?>
