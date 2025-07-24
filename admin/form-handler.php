<?php
/**
 * Handles form submission securely:
 * - Verifies nonce for CSRF protection
 * - Sanitizes user input
 * - Saves data into a custom database table
 */

// (Optional Debugging Snippet)
// This code lists all database tables — useful for verifying if your custom table was created.
// Uncomment only for development/testing purposes.
/*
global $wpdb;
$tables = $wpdb->get_results('SHOW TABLES', ARRAY_N);
echo '<pre>';
print_r($tables);
echo '</pre>';
*/

// Check if the form was submitted (i.e., POST request includes expected input field)
if (isset($_POST['admin_form_message'])) {

    // Validate nonce to ensure the form submission is legitimate
    if (wp_verify_nonce($_POST['_wpnonce'], 'my_nonce_action')) {

        // 1. Get raw user input from the POST request
        $user_message_raw = $_POST['admin_form_message'];

        // 2. Sanitize the input for security (prevents XSS, script injection, etc.)
        $user_message_clean = sanitize_text_field($user_message_raw);

        // 3. Insert the cleaned message into a custom database table
        global $wpdb;
        $table_name = $wpdb->prefix . 'wpl_admin_form_messages';

        $wpdb->insert(
            $table_name,
            array(
                'message' => $user_message_clean,
                'created_at' => current_time('mysql') // Store submission time
            )
        );

        // 4. Display a success notice in the admin panel
        echo '<div class="notice notice-success"><p>Message saved successfully!</p></div>';
    }
}
?>
