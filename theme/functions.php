<?php
/*
Theme Name: Halı Saha Randevu Teması
Theme URI: https://github.com/halilaluc
Author: Halil Aluc
Author URI: https://github.com/halilaluc
Description: Halı saha randevu sistemi için modern ve minimal tema
Version: 1.0.0
License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Text Domain: halisaha
*/

if (!defined('ABSPATH')) {
    exit;
}

// Theme setup
function halisaha_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    
    register_nav_menus(array(
        'primary' => __('Ana Menü', 'halisaha'),
    ));
}
add_action('after_setup_theme', 'halisaha_setup');

// Enqueue styles and scripts
function halisaha_scripts() {
    wp_enqueue_style('halisaha-style', get_stylesheet_uri(), array(), '1.0.0');
    wp_enqueue_script('halisaha-script', get_template_directory_uri() . '/js/script.js', array('jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'halisaha_scripts');

// Register widget areas
function halisaha_widgets_init() {
    register_sidebar(array(
        'name'          => __('Footer', 'halisaha'),
        'id'            => 'footer-1',
        'before_widget' => '<div class="widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'halisaha_widgets_init');