<?php
/**
 * Admin menu and page callback for the WP Learning Plugin – Admin Form Demo
 */

// Hook into WordPress admin menu
add_action('admin_menu', 'scf_admin_menu');

/**
 * Registers a custom top-level admin menu.
 */
function scf_admin_menu() {
    add_menu_page(
        'Admin Form Demo',          // Page title
        'Form Demo',                // Menu title
        'manage_options',           // Capability required
        'admin-form-demo',          // Menu slug
        'scf_settings_page_callback'// Callback function
    );
}

/**
 * Renders the admin page and processes form submissions.
 *
 * Execution flow:
 *  1. Process form submission securely
 *  2. Render the form UI
 *  3. Show stored messages below the form
 */
function scf_settings_page_callback() {
    // 1. Handle POST data (form submission)
    require_once plugin_dir_path(__FILE__) . 'form-handler.php';

    // 2. Display the form HTML
    require_once plugin_dir_path(__FILE__) . 'form-view.php';

    // 3. Show previously submitted messages
    require_once plugin_dir_path(__FILE__) . 'message-list.php';
}
