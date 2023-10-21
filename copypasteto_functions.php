<?php
/**
 * Plugin Name: Custom Dashboard Widget
 * Description: Adds a custom widget to the WordPress dashboard.
 * Version: 1.31
 * Author: Fried Egg Burger
 * Author URI: https://friedeggburger.com
 */

// Custom WordPress Dashboard Widget
function custom_dashboard_widget() {
    global $wp_meta_boxes;

wp_add_dashboard_widget('custom_help_widget', 'WIDGET TITLE HERE', 'custom_dashboard_help');
}

function custom_dashboard_help() {
echo '<p>INSERT CONTENT HERE</p>';
}
