<?php
if (!defined('ABSPATH')) {
    exit;
}

class HSR_Ajax {
    
    public function __construct() {
        add_action('wp_ajax_hsr_get_availability', array($this, 'get_availability'));
        add_action('wp_ajax_hsr_create_appointment', array($this, 'create_appointment'));
        add_action('wp_ajax_hsr_delete_appointment', array($this, 'delete_appointment'));
    }
    
    public function get_availability() {
        check_ajax_referer('hsr-nonce', 'nonce');
        
        $date = sanitize_text_field($_POST['date']);
        $booked_times = HSR_Database::get_booked_times($date);
        
        wp_send_json_success(array(
            'booked_times' => $booked_times
        ));
    }
    
    public function create_appointment() {
        check_ajax_referer('hsr-nonce', 'nonce');
        
        if (!is_user_logged_in()) {
            wp_send_json_error(array('message' => __('Giriş yapmalısınız', 'hali-saha-randevu')));
        }
        
        $user = wp_get_current_user();
        $date = sanitize_text_field($_POST['date']);
        $time = sanitize_text_field($_POST['time']);
        
        $data = array(
            'user_id' => $user->ID,
            'user_name' => $user->display_name,
            'user_email' => $user->user_email,
            'user_phone' => get_user_meta($user->ID, 'phone', true) ?: '',
            'appointment_date' => $date,
            'appointment_time' => $time,
            'status' => 'confirmed'
        );
        
        $result = HSR_Database::create_appointment($data);
        
        if (is_wp_error($result)) {
            wp_send_json_error(array('message' => $result->get_error_message()));
        }
        
        // Send email
        HSR_Emails::send_confirmation($user->user_email, $user->display_name, $date, $time);
        
        wp_send_json_success(array(
            'message' => __('Randevu başarıyla oluşturuldu', 'hali-saha-randevu'),
            'appointment_id' => $result
        ));
    }
    
    public function delete_appointment() {
        check_ajax_referer('hsr-nonce', 'nonce');
        
        if (!is_user_logged_in()) {
            wp_send_json_error(array('message' => __('Giriş yapmalısınız', 'hali-saha-randevu')));
        }
        
        $id = intval($_POST['appointment_id']);
        $user_id = get_current_user_id();
        
        $result = HSR_Database::delete_appointment($id, $user_id);
        
        if ($result) {
            wp_send_json_success(array('message' => __('Randevu iptal edildi', 'hali-saha-randevu')));
        } else {
            wp_send_json_error(array('message' => __('Randevu iptal edilemedi', 'hali-saha-randevu')));
        }
    }
}