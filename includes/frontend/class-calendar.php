<?php
/**
 * Classe Calendrier
 * 
 * @package MH_Booking_System
 */

if (!defined('ABSPATH')) {
    exit;
}

class MH_Booking_Calendar {
    
    public function __construct() {
        add_shortcode('mh_booking_calendar', array($this, 'render_calendar'));
    }
    
    /**
     * Afficher le calendrier
     */
    public function render_calendar($atts) {
        return '<div class="mh-booking-calendar">Calendrier à venir...</div>';
    }
}