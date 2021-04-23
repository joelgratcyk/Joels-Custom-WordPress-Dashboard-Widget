**
 * Custom WordPress Dashboard Widget
 */
add_action('wp_dashboard_setup', 'custom_dashboard_widget');
  
function custom_dashboard_widget() {
global $wp_meta_boxes;
 
wp_add_dashboard_widget('custom_help_widget', 'WIDGET TITLE HERE', 'custom_dashboard_help');
}
 
function custom_dashboard_help() {
echo '<p>INSERT CONTENT HERE</p>';
}
