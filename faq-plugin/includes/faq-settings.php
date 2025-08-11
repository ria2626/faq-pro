<?php
function faq_register_settings_page()
{
    add_options_page('FAQ Settings', 'FAQ Settings', 'manage_options', 'faq-settings', 'faq_render_settings_page');
}
add_action('admin_menu', 'faq_register_settings_page');

function faq_render_settings_page()
{
    ?>
    <div class="wrap">
        <h1>FAQ Settings</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('faq-settings-group');
            do_settings_sections('faq-settings');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

function faq_register_settings()
{
    register_setting('faq-settings-group', 'faq_toggle_style');

    add_settings_section('faq_main', 'Main Settings', null, 'faq-settings');

    add_settings_field(
        'faq_toggle_style',
        'Toggle Animation Style',
        function () {
            $value = get_option('faq_toggle_style', 'slide');
            ?>
            <select name="faq_toggle_style">
                <option value="slide" <?= selected($value, 'slide') ?>>Slide</option>
                <option value="fade" <?= selected($value, 'fade') ?>>Fade</option>
            </select>
            <?php
        },
        'faq-settings',
        'faq_main'
    );
}
add_action('admin_init', 'faq_register_settings');
