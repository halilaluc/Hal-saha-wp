<?php
if (!defined('ABSPATH')) {
    exit;
}

class HSR_Gallery {
    
    public function __construct() {
        add_action('init', array($this, 'register_post_type'));
        add_action('rest_api_init', array($this, 'register_rest_routes'));
    }
    
    public function register_post_type() {
        register_post_type('hsr_gallery', array(
            'labels' => array(
                'name' => __('Galeri', 'hali-saha-randevu'),
                'singular_name' => __('Fotoğraf', 'hali-saha-randevu'),
            ),
            'public' => true,
            'show_in_rest' => true,
            'supports' => array('title', 'thumbnail', 'editor'),
            'menu_icon' => 'dashicons-camera',
            'has_archive' => true,
        ));
    }
    
    public function register_rest_routes() {
        register_rest_route('hsr/v1', '/gallery', array(
            'methods' => 'GET',
            'callback' => array($this, 'get_gallery_images'),
            'permission_callback' => '__return_true'
        ));
    }
    
    public function get_gallery_images() {
        $args = array(
            'post_type' => 'hsr_gallery',
            'posts_per_page' => -1,
            'orderby' => 'date',
            'order' => 'DESC'
        );
        
        $query = new WP_Query($args);
        $images = array();
        
        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                $post_id = get_the_ID();
                $thumbnail_id = get_post_thumbnail_id($post_id);
                
                if ($thumbnail_id) {
                    $image_url = wp_get_attachment_image_url($thumbnail_id, 'large');
                    $thumb_url = wp_get_attachment_image_url($thumbnail_id, 'medium');
                    
                    $images[] = array(
                        'id' => $post_id,
                        'title' => get_the_title(),
                        'description' => get_the_content(),
                        'image_url' => $image_url,
                        'thumbnail_url' => $thumb_url,
                        'date' => get_the_date('c')
                    );
                }
            }
            wp_reset_postdata();
        }
        
        return rest_ensure_response($images);
    }
}

new HSR_Gallery();
