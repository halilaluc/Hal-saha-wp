<?php
if (!defined('ABSPATH')) {
    exit;
}

class HSR_Emails {
    
    public static function send_confirmation($to, $name, $date, $time) {
        $subject = __('Randevu Onayı', 'hali-saha-randevu');
        
        $formatted_date = date_i18n('d F Y, l', strtotime($date));
        
        $message = '<html><body style="font-family: Arial, sans-serif;">';
        $message .= '<div style="max-width: 600px; margin: 0 auto; padding: 20px; background-color: #f8fafc;">';
        $message .= '<div style="background-color: #10B981; padding: 30px; text-align: center; border-radius: 10px 10px 0 0;">';
        $message .= '<h1 style="color: white; margin: 0;">✓ Randevunuz Onaylandı</h1>';
        $message .= '</div>';
        $message .= '<div style="background-color: white; padding: 30px; border-radius: 0 0 10px 10px;">';
        $message .= '<p>Merhaba <strong>' . esc_html($name) . '</strong>,</p>';
        $message .= '<p>Halı saha randevunuz başarıyla oluşturuldu.</p>';
        $message .= '<div style="background-color: #f1f5f9; padding: 20px; border-radius: 10px; margin: 20px 0;">';
        $message .= '<p style="margin: 5px 0;">📅 <strong>Tarih:</strong> ' . $formatted_date . '</p>';
        $message .= '<p style="margin: 5px 0;">🕐 <strong>Saat:</strong> ' . $time . '</p>';
        $message .= '</div>';
        $message .= '<p style="font-size: 13px; color: #64748b;"><em>Lütfen randevu saatinizden 10 dakika önce sahada olunuz.</em></p>';
        $message .= '<p style="text-align: center; margin-top: 30px; color: #94a3b8; font-size: 12px;">';
        $message .= '© 2024 Halı Saha Randevu. Tüm hakları saklıdır.';
        $message .= '</p>';
        $message .= '</div></div></body></html>';
        
        $headers = array('Content-Type: text/html; charset=UTF-8');
        
        return wp_mail($to, $subject, $message, $headers);
    }
}