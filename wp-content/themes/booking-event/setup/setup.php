<?php

/**
 * Proper way to enqueue scripts and styles.
 */
function wpdocs_theme_name_scripts() {
    // wp_enqueue_style( 'style-name', get_stylesheet_uri() );
    wp_enqueue_script( 'main', get_template_directory_uri() . '/app/main.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts' );