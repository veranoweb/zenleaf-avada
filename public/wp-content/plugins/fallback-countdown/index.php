<?php
/*
 * Plugin Name: Verano Count Down for ZLD
 * Description: Currently using for Fallbacksite
 */

/**
 * Enqueue a script
 */
function enqueue_countdown_scripts() {
    wp_enqueue_style( 'style-countdown', plugin_dir_url( __FILE__ ) . 'css/countdown.css', array(), '0.1.0', 'all');
	wp_enqueue_script(
        'countdown-script',
        plugin_dir_url( __FILE__ ) . 'js/countdown.js',
		array(),
		'1.0.0',
		true
    );
}
add_action( 'wp_enqueue_scripts', 'enqueue_countdown_scripts' );