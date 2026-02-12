<?php
/**
 * Plugin Name: Halı Saha Randevu Sistemi
 * Plugin URI: https://github.com/halilaluc
 * Description: Modern ve kullanıcı dostu halı saha randevu yönetim sistemi
 * Version: 1.0.0
 * Author: Halil Aluc
 * Text Domain: hali-saha-randevu
 * Domain Path: /languages
 */

if (!defined('ABSPATH')) {
    exit;
}

define('HSR_VERSION', '1.0.0');
define('HSR_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('HSR_PLUGIN_URL', plugin_dir_url(__FILE__));

class Hali_Saha_Randevu {
    
    public function __construct() {
        add_action('plugins_loaded', array($this, 'init'));
        register_activation_hook(__FILE__, array($this, 'activate'));
        register_deactivation_hook(__FILE__, array($this, 'deactivate'));
    }
    
    public function init() {
        // Load text domain
        load_plugin_textdomain('hali-saha-randevu', false, dirname(plugin_basename(__FILE__)) . '/languages');
        
        // Includes
        require_once HSR_PLUGIN_DIR . 'includes/class-database.php';
        require_once HSR_PLUGIN_DIR . 'includes/class-appointments.php';
        require_once HSR_PLUGIN_DIR . 'includes/class-shortcodes.php';
        require_once HSR_PLUGIN_DIR . 'includes/class-ajax.php';
        require_once HSR_PLUGIN_DIR . 'includes/class-admin.php';
        require_once HSR_PLUGIN_DIR . 'includes/class-emails.php';
        require_once HSR_PLUGIN_DIR . 'includes/class-gallery.php';
        
        // Init classes
        new HSR_Database();
        new HSR_Appointments();
        new HSR_Shortcodes();
        new HSR_Ajax();
        new HSR_Admin();
        new HSR_Emails();
        
        // Enqueue scripts
        add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts'));
    }
    
    public function enqueue_scripts() {
        wp_enqueue_style('hsr-styles', HSR_PLUGIN_URL . 'assets/css/style.css', array(), HSR_VERSION);
        wp_enqueue_script('hsr-script', HSR_PLUGIN_URL . 'assets/js/script.js', array('jquery'), HSR_VERSION, true);
        
        wp_localize_script('hsr-script', 'hsrAjax', array(
            'ajaxurl' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('hsr-nonce')
        ));
    }
    
    public function activate() {
        require_once HSR_PLUGIN_DIR . 'includes/class-database.php';
        HSR_Database::create_tables();
        flush_rewrite_rules();
    }
    
    public function deactivate() {
        flush_rewrite_rules();
    }
}

// Initialize plugin
new Hali_Saha_Randevu();