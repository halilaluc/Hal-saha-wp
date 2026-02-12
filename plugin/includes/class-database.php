<?php
if (!defined('ABSPATH')) {
    exit;
}

class HSR_Database {
    
    public static function create_tables() {
        global $wpdb;
        $charset_collate = $wpdb->get_charset_collate();
        
        $table_name = $wpdb->prefix . 'hsr_appointments';
        
        $sql = "CREATE TABLE IF NOT EXISTS $table_name (
            id bigint(20) NOT NULL AUTO_INCREMENT,
            user_id bigint(20) NOT NULL,
            user_name varchar(255) NOT NULL,
            user_email varchar(255) NOT NULL,
            user_phone varchar(50) NOT NULL,
            appointment_date date NOT NULL,
            appointment_time time NOT NULL,
            status varchar(50) DEFAULT 'confirmed',
            created_at datetime DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY  (id),
            KEY user_id (user_id),
            KEY appointment_date (appointment_date)
        ) $charset_collate;";
        
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
    }
    
    public static function get_appointments($user_id = null, $date = null) {
        global $wpdb;
        $table_name = $wpdb->prefix . 'hsr_appointments';
        
        $where = array('1=1');
        
        if ($user_id) {
            $where[] = $wpdb->prepare('user_id = %d', $user_id);
        }
        
        if ($date) {
            $where[] = $wpdb->prepare('appointment_date = %s', $date);
        }
        
        $sql = "SELECT * FROM $table_name WHERE " . implode(' AND ', $where) . " ORDER BY appointment_date ASC, appointment_time ASC";
        
        return $wpdb->get_results($sql);
    }
    
    public static function create_appointment($data) {
        global $wpdb;
        $table_name = $wpdb->prefix . 'hsr_appointments';
        
        // Check if slot is available
        $existing = $wpdb->get_var($wpdb->prepare(
            "SELECT COUNT(*) FROM $table_name WHERE appointment_date = %s AND appointment_time = %s",
            $data['appointment_date'],
            $data['appointment_time']
        ));
        
        if ($existing > 0) {
            return new WP_Error('slot_taken', __('Bu saat zaten dolu', 'hali-saha-randevu'));
        }
        
        $result = $wpdb->insert(
            $table_name,
            $data,
            array('%d', '%s', '%s', '%s', '%s', '%s', '%s')
        );
        
        if ($result) {
            return $wpdb->insert_id;
        }
        
        return new WP_Error('db_error', __('Randevu oluşturulamadı', 'hali-saha-randevu'));
    }
    
    public static function delete_appointment($id, $user_id = null) {
        global $wpdb;
        $table_name = $wpdb->prefix . 'hsr_appointments';
        
        $where = array('id' => $id);
        if ($user_id && !current_user_can('manage_options')) {
            $where['user_id'] = $user_id;
        }
        
        return $wpdb->delete($table_name, $where);
    }
    
    public static function get_booked_times($date) {
        global $wpdb;
        $table_name = $wpdb->prefix . 'hsr_appointments';
        
        $results = $wpdb->get_col($wpdb->prepare(
            "SELECT appointment_time FROM $table_name WHERE appointment_date = %s",
            $date
        ));
        
        return $results;
    }
}