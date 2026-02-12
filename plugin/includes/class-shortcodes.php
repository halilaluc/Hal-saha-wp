<?php
if (!defined('ABSPATH')) {
    exit;
}

class HSR_Shortcodes {
    
    public function __construct() {
        add_shortcode('randevu_formu', array($this, 'booking_form'));
        add_shortcode('randevularim', array($this, 'my_appointments'));
        add_shortcode('admin_randevular', array($this, 'admin_appointments'));
    }
    
    public function booking_form($atts) {
        if (!is_user_logged_in()) {
            return '<p>' . __('Randevu almak için giriş yapmalısınız.', 'hali-saha-randevu') . '</p><a href="' . wp_login_url(get_permalink()) . '" class="hsr-btn">' . __('Giriş Yap', 'hali-saha-randevu') . '</a>';
        }
        
        ob_start();
        include HSR_PLUGIN_DIR . 'templates/booking-form.php';
        return ob_get_clean();
    }
    
    public function my_appointments($atts) {
        if (!is_user_logged_in()) {
            return '<p>' . __('Randevularınızı görmek için giriş yapmalısınız.', 'hali-saha-randevu') . '</p>';
        }
        
        $user_id = get_current_user_id();
        $appointments = HSR_Database::get_appointments($user_id);
        
        ob_start();
        include HSR_PLUGIN_DIR . 'templates/my-appointments.php';
        return ob_get_clean();
    }
    
    public function admin_appointments($atts) {
        if (!current_user_can('manage_options')) {
            return '<p>' . __('Bu sayfaya erişim yetkiniz yok.', 'hali-saha-randevu') . '</p>';
        }
        
        $appointments = HSR_Database::get_appointments();
        
        ob_start();
        include HSR_PLUGIN_DIR . 'templates/admin-appointments.php';
        return ob_get_clean();
    }
}