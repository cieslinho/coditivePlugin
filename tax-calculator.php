<?php
/* Plugin Name: Tax Calculator
Description: Wtyczka WP - zadanie rekrutacyjne dla firmy Coditive (Final)
Version: 1.0
Author: Cieśla Szymon
*/

// load must used php files

require_once plugin_dir_path(__FILE__) . 'includes/cpt.php';
require_once plugin_dir_path(__FILE__) . 'includes/functions.php';
require_once plugin_dir_path(__FILE__) . 'includes/shortcode.php';

// load css and js

function plugin_assets_enqueue(){
    wp_enqueue_style('plugin-styles', plugin_dir_url(__FILE__) . 'assets/css/main.css' );
    wp_enqueue_script('plugin-scripts', plugin_dir_url(__FILE__) . 'assets/js/script-min.js', array(), null, true );
}


add_action('wp_enqueue_scripts', 'plugin_assets_enqueue');

