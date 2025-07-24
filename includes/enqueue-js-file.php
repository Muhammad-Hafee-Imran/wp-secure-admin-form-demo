<?php

// Hook into admin_enqueue_scripts to load scripts specifically in the admin dashboard
add_action('admin_enqueue_scripts', 'scf_enqueue_admin_assets');

/**
 * Enqueues the admin JavaScript file, but only on the plugin's custom admin page.
 *
 * $hook The current admin page hook suffix.
 */
function scf_enqueue_admin_assets($hook) {

    // Only load on our custom admin page (avoid loading globally across admin)
    if ($hook !== 'toplevel_page_test-menu') {
        return;
    }

    wp_enqueue_script(
        'secure-contact-form-javascript',                         // Handle (name)
        plugin_dir_url(__FILE__) . '../js/scf-admin.js',          // Path to script
        array(),                                                  // Dependencies
        '1.0.0',                                                  // Version
        true                                                      // Load in footer
    );
}
