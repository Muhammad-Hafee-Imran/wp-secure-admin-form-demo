<?php

/**
 * Appends a customizable "thank you" message at the end of each single blog post.
 *
 * This function uses WordPress's `the_content` filter, runs only on single blog posts,
 * and includes filterable content so other developers can modify the message.
 */
add_filter('the_content', 'scf_append_thank_you');

function scf_append_thank_you($content) {

    // Ensure we're only affecting individual blog posts
    if (is_single() && get_post_type() === 'post') {

        // Default message (can be translated and filtered externally)
        $raw_message = __('📝 Thank you for reading this post!', 'secure-contact-form');

        // Allow other plugins/themes to override this message via 'scf_thank_you_message' filter
        $filtered_message = apply_filters('scf_thank_you_message', $raw_message);

        // Sanitize message for safe output
        $message = wp_kses_post($filtered_message);

        // Append to the original content
        $content .= '<p>' . $message . '</p>';
    }

    return $content;
}
