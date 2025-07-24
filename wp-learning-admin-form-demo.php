<?php
/**
 * Plugin Name: WP Learning Plugin – Admin Form Demo
 * Description: A demonstration plugin showcasing secure admin form handling, data storage using the WordPress database, and basic backend UI.
 * Version: 1.0
 * Author: Muhammad Hafee Imran
 * Text Domain: wp-learning-plugin
 * Domain Path: /languages
 */

defined('ABSPATH') || exit; // Prevent direct file access

// --- Admin UI Logic ---
// Loads admin menu, form rendering, and form handling
require_once plugin_dir_path(__FILE__) . 'admin/admin-settings.php';

// --- JS Assets ---
// Enqueues any JavaScript required by the plugin
require_once plugin_dir_path(__FILE__) . 'includes/enqueue-js-file.php';

/**
 * Optional Components (Unused)
 * Uncomment when needed:
 * 
 * - Shortcode frontend form
 * - Filter to modify content
 * - Footer message
 * - CSS enqueueing
 */
// require_once plugin_dir_path(__FILE__) . 'includes/filter-content.php';
// require_once plugin_dir_path(__FILE__) . 'includes/footer-message.php';
// require_once plugin_dir_path(__FILE__) . 'includes/enqueue-css-file.php';

/**
 * Runs on plugin activation to create a custom database table.
 */
register_activation_hook(__FILE__, 'scf_create_custom_table');

function scf_create_custom_table()
{
    global $wpdb;

    $table_name = $wpdb->prefix . 'wpl_admin_form_messages';
    $charset_collate = $wpdb->get_charset_collate(); // Ensures correct charset/collation

    $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        message text NOT NULL,
        created_at datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
        PRIMARY KEY (id)
    ) $charset_collate;";

    // Includes dbDelta to safely create or update the table structure
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}
