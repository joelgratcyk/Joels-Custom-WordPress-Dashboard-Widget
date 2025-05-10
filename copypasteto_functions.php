<?php
/**
 * Plugin Name: Custom Dashboard Widget
 * Description: Adds a custom widget to the WordPress dashboard with configurable content.
 * Version: 1.32
 * Author: Joel Gratcyk
 * Author URI: https://joel.gr
 */

// Add the custom dashboard widget
function custom_dashboard_widget() {
    wp_add_dashboard_widget(
        'custom_help_widget',
        'Custom Help Widget',
        'custom_dashboard_help'
    );
}
add_action('wp_dashboard_setup', 'custom_dashboard_widget');

// Display the widget content
function custom_dashboard_help() {
    $widget_content = get_option('custom_dashboard_widget_content', 'INSERT CONTENT HERE');
    echo '<p>' . esc_html($widget_content) . '</p>';
}

// Add a settings link to the plugin page
function custom_dashboard_widget_settings_link($links) {
    $settings_link = '<a href="options-general.php?page=custom-dashboard-widget">Settings</a>';
    array_unshift($links, $settings_link);
    return $links;
}
add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'custom_dashboard_widget_settings_link');

// Add a settings page for the widget
function custom_dashboard_widget_settings_page() {
    add_options_page(
        'Custom Dashboard Widget Settings',
        'Custom Dashboard Widget',
        'manage_options',
        'custom-dashboard-widget',
        'custom_dashboard_widget_settings_page_html'
    );
}
add_action('admin_menu', 'custom_dashboard_widget_settings_page');

// HTML for the settings page
function custom_dashboard_widget_settings_page_html() {
    if (!current_user_can('manage_options')) {
        return;
    }

    if (isset($_POST['custom_dashboard_widget_content'])) {
        update_option('custom_dashboard_widget_content', sanitize_textarea_field($_POST['custom_dashboard_widget_content']));
    }

    $widget_content = get_option('custom_dashboard_widget_content', 'INSERT CONTENT HERE');
    ?>
    <div class="wrap">
        <h1>Custom Dashboard Widget Settings</h1>
        <form method="post" action="">
            <label for="custom_dashboard_widget_content">Widget Content:</label><br>
            <textarea id="custom_dashboard_widget_content" name="custom_dashboard_widget_content" rows="10" cols="50"><?php echo esc_textarea($widget_content); ?></textarea><br>
            <input type="submit" value="Save Changes" class="button button-primary">
        </form>
    </div>
    <?php
}

