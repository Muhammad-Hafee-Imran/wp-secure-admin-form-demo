<?php
// Access the global $wpdb object for interacting with the database
global $wpdb;

// Define the custom table name with WordPress prefix
$table_name = $wpdb->prefix . 'wpl_admin_form_messages';

// 🔄 Retrieve all messages from the table newones first
$results = $wpdb->get_results(
    "SELECT message, created_at FROM $table_name ORDER BY id DESC"
);

// ✅ Display the results, if any
if ( $results ) {
    echo '<h2>Submitted Messages</h2>';
    echo '<ul>';

    foreach ( $results as $row ) {
        // Escape output for security
        echo '<li><strong>' . esc_html( $row->created_at ) . ':</strong> ' . esc_html( $row->message ) . '</li>';
    }

    echo '</ul>';
} else {
    // Show a default message if no entries exist
    echo '<p>No messages found yet.</p>';
}
?>
