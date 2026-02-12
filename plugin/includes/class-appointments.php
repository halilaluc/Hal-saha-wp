<?php
if (!defined('ABSPATH')) {
    exit;
}

class HSR_Appointments {
    
    public function __construct() {
        add_action('init', array($this, 'init'));
    }
    
    public function init() {
        // Additional initialization if needed
    }
    
    public static function get_time_slots() {
        $slots = array();
        for ($i = 0; $i < 24; $i++) {
            $slots[] = sprintf('%02d:00', $i);
        }
        return $slots;
    }
    
    public static function format_date($date) {
        return date_i18n('d F Y, l', strtotime($date));
    }
}