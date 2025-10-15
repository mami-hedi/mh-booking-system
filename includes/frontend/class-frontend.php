<?php
/**
 * Classe Frontend principale
 * 
 * @package MH_Booking_System
 */

if (!defined('ABSPATH')) {
    exit;
}

class MH_Booking_Frontend {
    
    public function __construct() {
        add_action('wp_enqueue_scripts', array($this, 'enqueue_frontend_assets'));
    }
    
    /**
     * Charger les assets frontend
     */
    public function enqueue_frontend_assets() {
        wp_enqueue_style(
            'mh-booking-frontend',
            MH_BOOKING_PLUGIN_URL . 'public/css/frontend-style.css',
            array(),
            MH_BOOKING_VERSION
        );
        
        wp_enqueue_script(
            'mh-booking-frontend',
            MH_BOOKING_PLUGIN_URL . 'public/js/booking-form.js',
            array('jquery'),
            MH_BOOKING_VERSION,
            true
        );
    }
}