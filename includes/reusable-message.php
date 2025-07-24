<?php

// Register shortcode [scf-reusable-message] to output a customizable message.
add_shortcode('scf-reusable-message', 'scf_reusable_message');

/**
 * Callback function for the shortcode.
 * Outputs a message that can be customized via filters or shortcode attribute.
 *
 * Usage example in post/page: [scf-reusable-message color="red"]
 */
function scf_reusable_message($atts) {

    // Default shortcode attribute
    $atts = shortcode_atts(
        array(
            'color' => 'black', // Default text color
        ),
        $atts,
        'scf_reusable_message_shortcode'
    );

    // Default message (can be filtered by theme or another plugin)
    $raw_message = __(' A custom message by the plugin user.', 'secure-contact-form');
    $filtered_message = apply_filters('scf_reusable_message_text', $raw_message);

    // Sanitize output
    $message = esc_html($filtered_message);
    $color = esc_attr($atts['color']);

    // Return styled HTML
    return '<p style="color: ' . $color . ';">' . $message . '</p>';
}
