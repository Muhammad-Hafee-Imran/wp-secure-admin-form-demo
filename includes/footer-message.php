<?php
// Hook into wp_footer to display a footer message on the frontend
add_action('wp_footer', 'scf_footer_message');

/**
 * Outputs a footer message using wp_footer hook.
 * The message is filterable and safely escaped.
 */
function scf_footer_message() {
    $message = apply_filters(
        'scf_footer_message_text',
        __('Something', 'secure-contact-form')
    );

    echo '<p style="color:blue;text-align:center;">' . esc_html($message) . '</p>';
}
