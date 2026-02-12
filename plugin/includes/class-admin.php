<?php
if (!defined('ABSPATH')) {
    exit;
}

class HSR_Admin {
    
    public function __construct() {
        add_action('admin_menu', array($this, 'add_menu'));
    }
    
    public function add_menu() {
        add_menu_page(
            __('Halı Saha Randevu', 'hali-saha-randevu'),
            __('Randevular', 'hali-saha-randevu'),
            'manage_options',
            'hsr-appointments',
            array($this, 'appointments_page'),
            'dashicons-calendar-alt',
            30
        );
    }
    
    public function appointments_page() {
        $appointments = HSR_Database::get_appointments();
        include HSR_PLUGIN_DIR . 'admin/appointments-page.php';
    }
}