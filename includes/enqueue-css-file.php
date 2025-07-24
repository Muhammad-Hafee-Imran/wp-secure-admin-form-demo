<?php

//Hook to enqueue styles on the frontend only
add_action( 'wp_enqueue_scripts', 'enqueue_css_file' );

function enqueue_css_file() {

    //Exit early if this is the admin dashboard (we only want frontend)
    if ( is_admin() ) {
        return;
    }

    //Enqueue the CSS file located in the plugin's /css/ directory
    wp_enqueue_style(
        'secure-contact-form-style',                              // Handle (name)
        plugin_dir_url( __FILE__ ) . '../css/scf-frontend.css',   // File path
        array(),                                                   // Dependencies
        '1.0.0',                                                   // Version
        'all'                                                      // Media
    );
}
